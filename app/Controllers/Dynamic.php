<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Employee_model;
use App\Models\Service_record_model;
use App\Models\EmployeeID_model;
use App\Models\Master_department_model;
use App\Models\Master_position_model;
use App\Models\Master_profession_model;

class Dynamic extends BaseController
{
 
 public function __construct()
 {
 }

 function search_pgbid($pgbid)
 {
    $model = new Employee_model();
    $data = $model->searchEmployee($pgbid)->getResult();
    echo json_encode($data);
 }

 function search_name($lastname,$firstname)
 {
    $model = new Employee_model();
    $data = $model->searchEmployeeName($lastname,$firstname)->getResult();
    echo json_encode($data);
 }

 function refreshPos() {
   $model = new Master_position_model();
   $data = $model->getAll()->getResult();
   echo json_encode($data);
 }

 function refreshProf() {
   $model = new Master_profession_model();
   $data = $model->getAll()->getResult();
   echo json_encode($data);
 }

 function searchDeptHead($id_)
 {
    $model = new Master_department_model();
    $data = $model->getDept($id_)->getResult();
    echo json_encode($data);
 }

 function searchByDeptPos($dept_code, $pos_code)
 {
    $model = new Employee_model();
    $data = $model->searchByDeptPos($dept_code, $pos_code)->getResult();
    echo json_encode($data);
 }

 function searchByDept($dept_code)
 {
    $model = new Employee_model();
    $data = $model->searchByDept($dept_code)->getResult();
    echo json_encode($data);
 }

 function searchByDept2($dept_code)
 {
    $model = new EmployeeID_model();
    $data = $model->searchByDept($dept_code)->getResult();
    echo json_encode($data);
 }
 
 function searchByPos($pos_code)
 {
    $model = new Employee_model();
    $data = $model->searchByPos($pos_code)->getResult();
    echo json_encode($data);
 }
 
 function searchAll()
 {
    $model = new Employee_model();
    $data = $model->searchAll()->getResult();
    echo json_encode($data);
 }
 
 function searchAll2()
 {
    $model = new EmployeeID_model();
    $data = $model->searchAll()->getResult();
    echo json_encode($data);
 }

 function getDetail($id)
 {
    $model = new Employee_model();
    $data = $model->getDetail($id)->getResult();
    echo json_encode($data);
 }

 // function viewDetail($id) used for employee profile page, getDetail used for employee list page
 function viewDetail($id)
 {
   $model = new Employee_model();
    
   // 1. Get the data from the model
   $data = $model->viewDetail($id);

   // 2. Check if data exists
   if (empty($data)) {
      return $this->response->setStatusCode(404)
                            ->setJSON(['message' => 'Employee record not found.']);
   }

   // 3. Return successful JSON response
   return $this->response->setJSON($data);
 }

 function viewDetailEducation($id)
 {
    $model = new Employee_model();
    $data = $model->viewDetailEducation($id)->getResult();
    echo json_encode($data);
 }

 function viewDetailEligibility($id)
 {
    $model = new Employee_model();
    $data = $model->viewDetailEligibility($id)->getResult();
    echo json_encode($data);
 }

 function viewPosition($id)
 {
    $model = new Master_position_model();
    $data = $model->viewPosition($id)->getResult();
    echo json_encode($data);
 }

 function viewLeaveCredit($id)
 {
    $model = new Employee_model();
    $data = $model->viewLeaveCredit($id)->getResult();
    echo json_encode($data);
 }
 
 function searchServiceRecord($id)
 {
    $model = new Service_record_model();
    $data = $model->searchServiceRecord($id)->getResult();
    echo json_encode($data);
 }
 
  
}
