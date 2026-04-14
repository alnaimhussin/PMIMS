<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'daily_time_records';
    protected $primaryKey = 'id';
    
    /**
     * Get employee attendance summary with aggregated data
     */
    public function getEmployeeAttendanceSummary($department = 0, $month, $year, $search = '', $statusFilters = [])
    {
        
        $builder = $this->db->table('daily_time_records dtr');
        
        // Select aggregated data
        $builder->select([
            'dtr.person_id',
            'dtr.fullname',
            'dtr.department'
            // 'emp.position',
            // 'emp.employment_status',
            // 'COUNT(DISTINCT dtr.date_in) as days_present',
            // 'SUM(CASE WHEN dtr.late > 0 THEN dtr.late ELSE 0 END) as late_minutes',
            // 'SUM(CASE WHEN dtr.undertime > 0 THEN 1 ELSE 0 END) as undertime_count',
            // 'SUM(dtr.actual_work) as total_hours',
            // 'AVG(dtr.actual_work) as avg_hours_per_day'
        ]);
        
        // // Join with employees table for additional info
        // $builder->join('employees emp', 'emp.person_id = dtr.person_id', 'left');
        
        // 1. Convert dd/mm/yyyy to a MySQL Date object on the fly
        $dateConverted = "STR_TO_DATE(date_in, '%d/%m/%Y')";
        
        // 2. Filter by Month and Year
        $builder->where("MONTH($dateConverted)", $month);
        $builder->where("YEAR($dateConverted)", $year);
        
        // Department filter
        // if ($department != 0) {
        //     $builder->where('dtr.department', $department);
        // }
        
        // Search filter
        // if (!empty($search)) {
        //     $builder->groupStart()
        //         ->like('dtr.fullname', $search)
        //         ->orLike('dtr.person_id', $search)
        //         ->groupEnd();
        // }
        
        // Status filters
        // $statusConditions = [];
        // if ($statusFilters['regular']) $statusConditions[] = 'Regular';
        // if ($statusFilters['probationary']) $statusConditions[] = 'Probationary';
        // if ($statusFilters['contractual']) $statusConditions[] = 'Contractual';
        // if ($statusFilters['jo']) $statusConditions[] = 'Job Order';
        
        // if (!empty($statusConditions)) {
        //     $builder->whereIn('emp.employment_status', $statusConditions);
        // }
        
        // $builder->groupBy('dtr.person_id, dtr.fullname, dtr.department, emp.position, emp.employment_status');
        
        // $query = $builder->get();
        // $results = $query->getResultArray();
        
        // // Calculate working days and attendance rate
        // $workingDays = $this->calculateWorkingDays($month, $year);
        
        // $data = [];
        // foreach ($results as $row) {
        //     $daysPresent = (int)$row['days_present'];
        //     $daysAbsent = $workingDays - $daysPresent;
        //     $attendanceRate = $workingDays > 0 ? ($daysPresent / $workingDays) * 100 : 0;
            
        //     $data[] = [
        //         'person_id' => $row['person_id'],
        //         'fullname' => $row['fullname'],
        //         'department' => $row['department'],
        //         'position' => $row['position'] ?? 'N/A',
        //         'employment_status' => $row['employment_status'] ?? 'Regular',
        //         'working_days' => $workingDays,
        //         'days_present' => $daysPresent,
        //         'days_absent' => $daysAbsent,
        //         'late_minutes' => (int)$row['late_minutes'],
        //         'undertime_count' => (int)$row['undertime_count'],
        //         'total_hours' => (float)$row['total_hours'],
        //         'avg_hours_per_day' => (float)$row['avg_hours_per_day'],
        //         'attendance_rate' => round($attendanceRate, 2)
        //     ];
        // }
        
        // return $search;// You can return a simple string
        return "Fetching data for Employee ID: " . $search;
    }
    
    /**
     * Calculate working days in a month (excluding weekends)
     */
    private function calculateWorkingDays($month, $year)
    {
        $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $workingDays = 0;
        
        for ($day = 1; $day <= $totalDays; $day++) {
            $date = "$year-$month-$day";
            $dayOfWeek = date('N', strtotime($date));
            // 6 = Saturday, 7 = Sunday
            if ($dayOfWeek < 6) {
                $workingDays++;
            }
        }
        
        return $workingDays;
    }
}