<?php

namespace App\Models;

use CodeIgniter\Model;

class DailyTimeRecordModel extends Model
{
    protected $table = 'daily_time_records';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'person_id',
        'fullname',
        'department',
        'date_in',
        'clock_in_am',
        'clock_out_am',
        'clock_in_pm',
        'clock_out_pm',
        'actual_work',
        'late',
        'undertime'
    ];
    
    /**
     * Get DTR records for a specific employee and month
     */
    public function getDTRRecords($personId, $month, $year)
    {
        $builder = $this->builder();
        
        $builder->where('person_id', $personId);
        $builder->where('MONTH(date_in)', $month);
        $builder->where('YEAR(date_in)', $year);
        $builder->orderBy('date_in', 'ASC');
        
        return $builder->get()->getResultArray();
    }
    
    /**
     * Get DTR records by department
     */
    public function getDTRByDepartment($department, $month, $year)
    {
        $builder = $this->builder();
        
        $builder->where('department', $department);
        $builder->where('MONTH(date_in)', $month);
        $builder->where('YEAR(date_in)', $year);
        $builder->orderBy('fullname', 'ASC');
        $builder->orderBy('date_in', 'ASC');
        
        return $builder->get()->getResultArray();
    }
}