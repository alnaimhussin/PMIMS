<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_attendance_model extends Model
{
    protected $table = 'daily_time_records';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'person_id',
        'person_name',
        'department',
        'record_date',
        'clock_in_am',
        'clock_out_am',
        'clock_in_pm',
        'clock_out_pm',
        'actual_working_hours',
        'late_minutes',
        'undertime_minutes',
        'remarks',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get DTR records for specific employee
     */
    public function getEmployeeDTR($person_id, $month, $year)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('daily_time_records');
        $builder->where('person_id', $person_id);
        $builder->where('MONTH(record_date)', $month);
        $builder->where('YEAR(record_date)', $year);
        $builder->orderBy('record_date', 'ASC');
        return $builder->get();
    }

    /**
     * Get all DTR records for department
     */
    public function getDepartmentDTR($dept_code, $month, $year)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('daily_time_records');
        $builder->where('department', $dept_code);
        $builder->where('MONTH(record_date)', $month);
        $builder->where('YEAR(record_date)', $year);
        $builder->orderBy('person_name', 'ASC');
        $builder->orderBy('record_date', 'ASC');
        return $builder->get();
    }

    /**
     * Get employee attendance summary (individual details)
     */
    public function getEmployeeAttendanceSummary($dept_code = null, $month, $year, $search = null)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records dtr');
        $builder->select('
            dtr.person_id,
            dtr.person_name,
            dtr.department as dept_code,
            dept.department as department_name,
            emp_pos.position as position,
            emp_dets.status as employment_status,
            COUNT(DISTINCT dtr.record_date) as working_days,
            SUM(CASE WHEN dtr.actual_working_hours > 0 THEN 1 ELSE 0 END) as days_present,
            SUM(CASE WHEN dtr.actual_working_hours = 0 AND DAYOFWEEK(dtr.record_date) NOT IN (1,7) THEN 1 ELSE 0 END) as days_absent,
            SUM(CASE WHEN dtr.late_minutes > 0 THEN 1 ELSE 0 END) as late_count,
            SUM(dtr.late_minutes) as total_late_minutes,
            SUM(dtr.undertime_minutes) as total_undertime_minutes,
            SUM(dtr.actual_working_hours) as total_hours,
            AVG(dtr.actual_working_hours) as avg_hours_per_day,
            (SUM(CASE WHEN dtr.actual_working_hours > 0 THEN 1 ELSE 0 END) / NULLIF(COUNT(DISTINCT CASE WHEN DAYOFWEEK(dtr.record_date) NOT IN (1,7) THEN dtr.record_date END), 0) * 100) as attendance_rate
        ');
        
        // Join with employee tables to get position and status
        $builder->join('employee', 'employee.pgbid = dtr.person_id', 'left');
        $builder->join('employee_details emp_dets', 'employee.id = emp_dets.id_', 'left');
        $builder->join('department dept', 'dept.id_ = emp_dets.dept_code', 'left');
        $builder->join('position emp_pos', 'emp_dets.pos_code = emp_pos.id', 'left');
        
        $builder->where('MONTH(dtr.record_date)', $month);
        $builder->where('YEAR(dtr.record_date)', $year);
        
        // Exclude terminated employees
        $builder->where('emp_dets.status !=', 'CONTRACT END');
        $builder->where('emp_dets.status !=', 'RETIRED');
        $builder->where('emp_dets.status !=', 'DISEASE');
        
        if ($dept_code) {
            $builder->where('dtr.department', $dept_code);
        }
        
        if ($search) {
            $builder->group_start();
            $builder->like('dtr.person_name', $search, 'both');
            $builder->or_like('dtr.person_id', $search, 'both');
            $builder->group_end();
        }
        
        $builder->groupBy('dtr.person_id');
        $builder->orderBy('dept.department', 'ASC');
        $builder->orderBy('dtr.person_name', 'ASC');
        
        return $builder->get();
    }

    /**
     * Get department summary (aggregated data)
     */
    public function getDepartmentSummary($month, $year)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records dtr');
        $builder->select('
            dept.id_ as dept_id,
            dept.department as dept_name,
            COUNT(DISTINCT dtr.person_id) as total_employees,
            COUNT(DISTINCT dtr.record_date) as working_days,
            SUM(CASE WHEN dtr.actual_working_hours > 0 THEN 1 ELSE 0 END) as total_present_days,
            SUM(CASE WHEN dtr.actual_working_hours = 0 AND DAYOFWEEK(dtr.record_date) NOT IN (1,7) THEN 1 ELSE 0 END) as total_absences,
            SUM(CASE WHEN dtr.late_minutes > 0 THEN 1 ELSE 0 END) as total_late_count,
            SUM(dtr.late_minutes) as total_late_minutes,
            SUM(dtr.actual_working_hours) as total_department_hours,
            AVG(dtr.actual_working_hours) as avg_hours_per_employee
        ');
        
        $builder->join('department dept', 'dept.id_ = dtr.department');
        $builder->where('MONTH(dtr.record_date)', $month);
        $builder->where('YEAR(dtr.record_date)', $year);
        $builder->groupBy('dept.id_');
        $builder->orderBy('dept.department', 'ASC');
        
        return $builder->get();
    }

    /**
     * Get single employee detailed summary
     */
    public function getSingleEmployeeSummary($person_id, $month, $year)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records dtr');
        $builder->select('
            dtr.person_id,
            dtr.person_name,
            dept.department,
            emp_pos.position,
            emp_dets.status as employment_status,
            COUNT(DISTINCT dtr.record_date) as working_days,
            SUM(CASE WHEN dtr.actual_working_hours > 0 THEN 1 ELSE 0 END) as days_present,
            SUM(CASE WHEN dtr.actual_working_hours = 0 AND DAYOFWEEK(dtr.record_date) NOT IN (1,7) THEN 1 ELSE 0 END) as days_absent,
            SUM(CASE WHEN dtr.late_minutes > 0 THEN 1 ELSE 0 END) as late_instances,
            SUM(dtr.late_minutes) as total_late_minutes,
            SUM(CASE WHEN dtr.undertime_minutes > 0 THEN 1 ELSE 0 END) as undertime_count,
            SUM(dtr.undertime_minutes) as total_undertime_minutes,
            SUM(dtr.actual_working_hours) as total_hours,
            AVG(dtr.actual_working_hours) as avg_hours_per_day
        ');
        
        $builder->join('employee', 'employee.pgbid = dtr.person_id', 'left');
        $builder->join('employee_details emp_dets', 'employee.id = emp_dets.id_', 'left');
        $builder->join('department dept', 'dept.id_ = emp_dets.dept_code', 'left');
        $builder->join('position emp_pos', 'emp_dets.pos_code = emp_pos.id', 'left');
        
        $builder->where('dtr.person_id', $person_id);
        $builder->where('MONTH(dtr.record_date)', $month);
        $builder->where('YEAR(dtr.record_date)', $year);
        
        return $builder->get()->getRow();
    }

    /**
     * Check if DTR record exists
     */
    public function checkDTRExists($person_id, $date)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('daily_time_records');
        $builder->where('person_id', $person_id);
        $builder->where('record_date', $date);
        return $builder->countAllResults();
    }

    /**
     * Insert or update DTR record
     */
    public function saveDTRRecord($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('daily_time_records');
        
        $exists = $this->checkDTRExists($data['person_id'], $data['record_date']);
        
        if ($exists > 0) {
            // Update existing
            $builder->where('person_id', $data['person_id']);
            $builder->where('record_date', $data['record_date']);
            return $builder->update($data);
        } else {
            // Insert new
            return $builder->insert($data);
        }
    }

    /**
     * Delete DTR record
     */
    public function deleteDTRRecord($person_id, $date)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('daily_time_records');
        $builder->where('person_id', $person_id);
        $builder->where('record_date', $date);
        return $builder->delete();
    }

    /**
     * Get attendance statistics for dashboard
     */
    public function getDashboardStats($month, $year)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records');
        $builder->select('
            COUNT(DISTINCT person_id) as total_employees,
            SUM(CASE WHEN actual_working_hours > 0 THEN 1 ELSE 0 END) as total_present,
            SUM(CASE WHEN actual_working_hours = 0 AND DAYOFWEEK(record_date) NOT IN (1,7) THEN 1 ELSE 0 END) as total_absent,
            SUM(CASE WHEN late_minutes > 0 THEN 1 ELSE 0 END) as total_late,
            SUM(late_minutes) as total_late_minutes,
            AVG(actual_working_hours) as avg_working_hours
        ');
        $builder->where('MONTH(record_date)', $month);
        $builder->where('YEAR(record_date)', $year);
        
        return $builder->get()->getRow();
    }

    /**
     * Get employees with perfect attendance
     */
    public function getPerfectAttendance($month, $year, $dept_code = null)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records dtr');
        $builder->select('
            dtr.person_id,
            dtr.person_name,
            dept.department,
            COUNT(DISTINCT dtr.record_date) as days_present,
            SUM(dtr.actual_working_hours) as total_hours
        ');
        
        $builder->join('department dept', 'dept.id_ = dtr.department', 'left');
        $builder->where('MONTH(dtr.record_date)', $month);
        $builder->where('YEAR(dtr.record_date)', $year);
        $builder->where('dtr.late_minutes', 0);
        $builder->where('dtr.undertime_minutes', 0);
        $builder->having('days_present >= 20'); // Adjust based on working days
        
        if ($dept_code) {
            $builder->where('dtr.department', $dept_code);
        }
        
        $builder->groupBy('dtr.person_id');
        $builder->orderBy('dept.department', 'ASC');
        $builder->orderBy('dtr.person_name', 'ASC');
        
        return $builder->get();
    }

    /**
     * Get employees with attendance issues (absences or frequent lates)
     */
    public function getAttendanceIssues($month, $year, $dept_code = null)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records dtr');
        $builder->select('
            dtr.person_id,
            dtr.person_name,
            dept.department,
            SUM(CASE WHEN dtr.actual_working_hours = 0 AND DAYOFWEEK(dtr.record_date) NOT IN (1,7) THEN 1 ELSE 0 END) as absences,
            SUM(CASE WHEN dtr.late_minutes > 0 THEN 1 ELSE 0 END) as late_count,
            SUM(dtr.late_minutes) as total_late_minutes
        ');
        
        $builder->join('department dept', 'dept.id_ = dtr.department', 'left');
        $builder->where('MONTH(dtr.record_date)', $month);
        $builder->where('YEAR(dtr.record_date)', $year);
        $builder->groupStart();
        $builder->where('dtr.actual_working_hours', 0);
        $builder->orWhere('dtr.late_minutes >', 0);
        $builder->groupEnd();
        
        if ($dept_code) {
            $builder->where('dtr.department', $dept_code);
        }
        
        $builder->groupBy('dtr.person_id');
        $builder->having('absences > 0 OR late_count > 2');
        $builder->orderBy('absences', 'DESC');
        $builder->orderBy('late_count', 'DESC');
        
        return $builder->get();
    }

    /**
     * Bulk insert DTR records
     */
    public function bulkInsertDTR($dataArray)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('daily_time_records');
        return $builder->insertBatch($dataArray);
    }

    /**
     * Get monthly report for payroll processing
     */
    public function getPayrollReport($month, $year, $dept_code = null)
    {
        $db = \Config\Database::connect();
        
        $builder = $db->table('daily_time_records dtr');
        $builder->select('
            dtr.person_id,
            dtr.person_name,
            dept.department,
            emp_dets.salary_grade,
            emp_dets.step_increment,
            SUM(dtr.actual_working_hours) as total_hours_worked,
            SUM(CASE WHEN dtr.actual_working_hours > 0 THEN 1 ELSE 0 END) as days_worked,
            SUM(CASE WHEN dtr.actual_working_hours = 0 AND DAYOFWEEK(dtr.record_date) NOT IN (1,7) THEN 1 ELSE 0 END) as days_absent,
            SUM(dtr.late_minutes) as total_late_minutes,
            SUM(dtr.undertime_minutes) as total_undertime_minutes
        ');
        
        $builder->join('employee', 'employee.pgbid = dtr.person_id', 'left');
        $builder->join('employee_details emp_dets', 'employee.id = emp_dets.id_', 'left');
        $builder->join('department dept', 'dept.id_ = emp_dets.dept_code', 'left');
        
        $builder->where('MONTH(dtr.record_date)', $month);
        $builder->where('YEAR(dtr.record_date)', $year);
        
        if ($dept_code) {
            $builder->where('dtr.department', $dept_code);
        }
        
        $builder->groupBy('dtr.person_id');
        $builder->orderBy('dept.department', 'ASC');
        $builder->orderBy('dtr.person_name', 'ASC');
        
        return $builder->get();
    }

    /**
     * Calculate working hours from clock times
     */
    public function calculateWorkingHours($clock_in_am, $clock_out_am, $clock_in_pm, $clock_out_pm)
    {
        $total_hours = 0;
        
        // Morning session (8:00 AM - 12:00 PM = 4 hours)
        if ($clock_in_am && $clock_out_am) {
            $am_start = strtotime($clock_in_am);
            $am_end = strtotime($clock_out_am);
            $am_diff = ($am_end - $am_start) / 3600;
            $total_hours += max(0, $am_diff);
        }
        
        // Afternoon session (1:00 PM - 5:00 PM = 4 hours)
        if ($clock_in_pm && $clock_out_pm) {
            $pm_start = strtotime($clock_in_pm);
            $pm_end = strtotime($clock_out_pm);
            $pm_diff = ($pm_end - $pm_start) / 3600;
            $total_hours += max(0, $pm_diff);
        }
        
        return round($total_hours, 2);
    }

    /**
     * Calculate late minutes
     */
    public function calculateLateMinutes($clock_in_am, $official_start = '08:00:00')
    {
        if (!$clock_in_am) return 0;
        
        $actual_time = strtotime($clock_in_am);
        $official_time = strtotime($official_start);
        
        if ($actual_time > $official_time) {
            return round(($actual_time - $official_time) / 60);
        }
        
        return 0;
    }

    /**
     * Calculate undertime minutes
     */
    public function calculateUndertimeMinutes($clock_out_pm, $official_end = '17:00:00')
    {
        if (!$clock_out_pm) return 0;
        
        $actual_time = strtotime($clock_out_pm);
        $official_time = strtotime($official_end);
        
        if ($actual_time < $official_time) {
            return round(($official_time - $actual_time) / 60);
        }
        
        return 0;
    }
}