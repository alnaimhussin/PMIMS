<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use App\Models\DailyTimeRecordModel;
use CodeIgniter\RESTful\ResourceController;

class Attendance extends BaseController
{
    protected $attendanceModel;
    protected $dtrModel;
    
    public function __construct()
    {
        $this->attendanceModel = new AttendanceModel();
        $this->dtrModel = new DailyTimeRecordModel();
    }
    
    /**
     * Get employee attendance summary for the registry
     */
    public function get_employee_attendance()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }
        
        $department = $this->request->getPost('department');
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');
        $search = $this->request->getPost('search');
        
        // Status filters
        $showRegular = $this->request->getPost('show_regular');
        $showProbationary = $this->request->getPost('show_probationary');
        $showContractual = $this->request->getPost('show_contractual');
        $showJO = $this->request->getPost('show_jo');
        
        try {
            
            $data = $this->attendanceModel->getEmployeeAttendanceSummary(
                $department,
                $month,
                $year,
                $search,
                [
                    'regular' => $showRegular,
                    'probationary' => $showProbationary,
                    'contractual' => $showContractual,
                    'jo' => $showJO
                ]
            );
            
            // Pass the string back to AJAX
            return $this->response->setJSON([
                'success' => true,
                'message' => $message, // This passes your string
                'status'  => 'Processing'
            ]);
            
            // return $this->response->setJSON([
            //     'success' => true,
            //     'data' => $data
            // ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Error in get_employee_attendance: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Database error occurred'
            ]);
        }
    }
    
    /**
     * Get detailed DTR records for CS Form 48
     */
    public function get_dtr_records()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }
        
        $personId = $this->request->getPost('person_id');
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');
        
        if (empty($personId) || empty($month) || empty($year)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing required parameters'
            ]);
        }
        
        try {
            $records = $this->dtrModel->getDTRRecords($personId, $month, $year);
            
            return $this->response->setJSON([
                'success' => true,
                'data' => $records
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Error in get_dtr_records: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Database error occurred'
            ]);
        }
    }
}