<?php

namespace App\Controllers;

use App\Models\Employee_model;
use App\Models\EmployeeID_model;
use App\Models\Employee_details_model;
use App\Models\Employee_contacts_model;
use App\Models\Employee_education_model;
use App\Models\Employee_eligibility_model;
use App\Models\Employee_membership_model;
use App\Models\Master_salarygrade_model;
use App\Models\Master_province_model;
use App\Models\Master_citymunicipal_model;
use App\Models\Master_department_model;
use App\Models\Master_position_model;
use App\Models\Master_profession_model;

use App\Models\Service_record_model;

class Employee extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
	    
    $department = esc(session()->get('department'));
    if ($department == '0') {
    	    
//-- Model --/
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
    		
//-- Data --/
		$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "employee_list";
		$data['pagesub'] = "";
    
//-- Header --/
		echo view('templates/header', $data);
    
//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);
    
//-- Page --/
		echo view('employee/employee', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
    		
//-- Footer --/
		echo view('templates/footer');
    		
        } else {

// 2. Redirect User (Department is NOT '0')
        return redirect()->to('employee/ldh');
        }
	}
	
	public function profile()
	{
//-- Model --/
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Employee Profile"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "employee_profile";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employee_profile', $data);	
		echo view('employee/employee_profile_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function attendance()
	{
//-- Model --/
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Employee Attendance"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "employee_attendance";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employee_attendance', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function service_record()
	{
//-- Model --/
		$model1 = new Employee_model();
		// $model2 = new Service_record_model();
		
//-- Data --/
		$data['title'] = ucfirst("Employee Profile"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['page'] = "service_record";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employee_service_record', $data);	
		echo view('employee/employee_service_record_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function leave_application()
	{
//-- Model --/
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Employee Profile"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "leave_application";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employee_leave_application', $data);	
		echo view('employee/employee_leave_application_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function salary_adjustment()
	{
//-- Model --/
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Employee Profile"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "salary_adjustment";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employee_salary_adjustment', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}

	public function id()
	{
		$model1 = new EmployeeID_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$data['title'] = ucfirst("Employee ID List"); // Capitalize the first letter
		$data['emp_id'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['page'] = "Employeeid";
		$data['pagesub'] = "";

		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employeeid', $data);	
		echo view('employee/employeeid_add', $data);	
		echo view('employee/employeeid_script', $data);	
		echo view('templates/footer');
	}
	
	public function id_list()
	{
		$model1 = new Employee_model();
		$data['title'] = ucfirst("PGB ID # List"); // Capitalize the first letter
		$data['employee'] = $model1->getPGBID();
		$data['page'] = "pgbid_list";
		$data['pagesub'] = "";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('employee/pgbid_list', $data);	
		echo view('employee/employeeid_script', $data);	
		echo view('templates/footer');
	}
	
	public function getLastID()
	{
		$model1 = new Employee_model();
		$lastID = $model1->getLastID();
		echo json_encode($lastID);
	}
	
	public function getIDNO()
	{
		$pgbid = $this->request->getVar('pgbid_txt');

		$model1 = new Employee_model();
		$count = $model1->getIDNO($pgbid);
		echo json_encode($count);
	}
	
	public function checkDuplicateID()
	{
		$pgbid = $this->request->getVar('pgbid');

		$model1 = new Employee_model();
		$count = $model1->checkDuplicateID($pgbid);
		echo json_encode($count);
	}

	public function checkDuplicateName()
	{
		$lastname = $this->request->getVar('lastname');
		$firstname = $this->request->getVar('firstname');
		$middlename = $this->request->getVar('middlename');

		$model1 = new Employee_model();
		$count = $model1->checkDuplicateName($lastname,$firstname,$middlename);
		echo json_encode($count);
	}

	public function checkDuplicateName_view()
	{
		$lastname = $this->request->getVar('v_lastname');
		$firstname = $this->request->getVar('v_firstname');
		$middlename = $this->request->getVar('v_middlename');

		$model1 = new Employee_model();
		$count = $model1->checkDuplicateName($lastname,$firstname,$middlename);
		echo json_encode($count);
	}

	public function add()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		$validation = \Config\Services::validation();
		$validation->setRules([
			'lastname' => 'required|string',
			'firstname' => 'required|string',
			'middlename' => 'required|string',
			'initial' => 'required|string',
		]);
		$res = $validation->withRequest($this->request)->run();
		if (!$res) {
			$session->setFlashdata('validation', 'true');
			$this->index();
		} else {
			try {
				$model1 = new Employee_model();
				$model2 = new Employee_membership_model();
				$model3 = new Employee_details_model();
				$model4 = new Employee_contacts_model();
				$model1->set($posts);
				$model1->insert();
				$id = $model1->getInsertID();

				$model2->set('id_', $id);
				$model2->set('gsis', $this->request->getVar('gsis'));
				$model2->set('philhealth', $this->request->getVar('philhealth'));
				$model2->set('pagibig', $this->request->getVar('pagibig'));
				$model2->set('sss', $this->request->getVar('sss'));
				$model2->set('tin', $this->request->getVar('tin'));
				$model2->insert();
				
				$model3->set('id_', $id);
				$model3->set('sg_code', $this->request->getVar('sg_code'));
				$model3->set('dept_code', $this->request->getVar('dept_code'));
				$model3->set('pos_code', $this->request->getVar('pos_code'));
				$model3->set('status', $this->request->getVar('status'));
				$model3->insert();
				
				$model4->set('id_', $id);
				$model4->set('e_lastname', $this->request->getVar('e_lastname'));
				$model4->set('e_firstname', $this->request->getVar('e_firstname'));
				$model4->set('e_middlename', $this->request->getVar('e_middlename'));
				$model4->set('e_relation', $this->request->getVar('e_relation'));
				$model4->set('e_extname', $this->request->getVar('e_extname'));
				$model4->set('e_contact', $this->request->getVar('e_contact'));
				$model4->set('r_lot', $this->request->getVar('r_lot'));
				$model4->set('r_street', $this->request->getVar('r_street'));
				$model4->set('r_village', $this->request->getVar('r_village'));
				$model4->set('r_barangay', $this->request->getVar('r_barangay'));
				$model4->set('r_citymunicipal', $this->request->getVar('r_citymunicipal'));
				$model4->set('r_province', $this->request->getVar('r_province'));
				$model4->set('p_lot', $this->request->getVar('p_lot'));
				$model4->set('p_street', $this->request->getVar('p_street'));
				$model4->set('p_village', $this->request->getVar('p_village'));
				$model4->set('p_barangay', $this->request->getVar('p_barangay'));
				$model4->set('p_citymunicipal', $this->request->getVar('p_citymunicipal'));
				$model4->set('p_province', $this->request->getVar('p_province'));
				$model4->insert();

				$session->setFlashdata('success', "Successfully Added New Employee");
			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}

			echo json_encode($id);
		}
	}

	public function update()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		$validation = \Config\Services::validation();
		$validation->setRules([
			'v_lastname' => 'required|string',
			'v_firstname' => 'required|string',
			'v_middlename' => 'required|string',
			'v_initial' => 'required|string',
		]);
		$res = $validation->withRequest($this->request)->run();
		if (!$res) {
			$session->setFlashdata('validation', 'true');
			$this->index();
		} else {
			try {
				$id = $this->request->getVar('v_id');

				$model1 = new Employee_model();
				$model2 = new Employee_membership_model();
				$model3 = new Employee_details_model();
				$model4 = new Employee_contacts_model();
				$model1->set('lastname', $this->request->getVar('v_lastname'));
				$model1->set('firstname', $this->request->getVar('v_firstname'));
				$model1->set('middlename', $this->request->getVar('v_middlename'));
				$model1->set('initial', $this->request->getVar('v_initial'));
				$model1->set('nickname', $this->request->getVar('v_nickname'));
				$model1->set('prof_code', $this->request->getVar('v_prof_code'));
				$model1->set('pgbid', $this->request->getVar('v_pgbid'));
				$model1->set('exname', $this->request->getVar('v_exname'));
				$model1->set('height', $this->request->getVar('v_height'));
				$model1->set('weight', $this->request->getVar('v_weight'));
				$model1->set('birthdate', $this->request->getVar('v_birthdate'));
				$model1->set('birthplace', $this->request->getVar('v_birthplace'));
				$model1->set('gender', $this->request->getVar('v_gender'));
				$model1->set('civilstatus', $this->request->getVar('v_civilstatus'));
				$model1->set('bloodtype', $this->request->getVar('v_bloodtype'));
				$model1->set('gender', $this->request->getVar('v_gender'));
				$model1->set('email', $this->request->getVar('v_email'));
				$model1->set('contact', $this->request->getVar('v_contact'));
				$model1->where('id',$id);
				$model1->update();

				$model2->set('id_', $id);
				$model2->set('gsis', $this->request->getVar('v_gsis'));
				$model2->set('philhealth', $this->request->getVar('v_philhealth'));
				$model2->set('pagibig', $this->request->getVar('v_pagibig'));
				$model2->set('sss', $this->request->getVar('v_sss'));
				$model2->set('tin', $this->request->getVar('v_tin'));
				$model2->where('id_',$id);
				$model2->update();
				
				$model3->set('id_', $id);
				$model3->set('sg_code', $this->request->getVar('v_sg_code'));
				$model3->set('dept_code', $this->request->getVar('v_dept_code'));
				$model3->set('pos_code', $this->request->getVar('v_pos_code'));
				$model3->set('status', $this->request->getVar('v_status'));
				$model3->where('id_',$id);
				$model3->update();
				
				$model4->set('id_', $id);
				$model4->set('e_lastname', $this->request->getVar('v_e_lastname'));
				$model4->set('e_firstname', $this->request->getVar('v_e_firstname'));
				$model4->set('e_middlename', $this->request->getVar('v_e_middlename'));
				$model4->set('e_relation', $this->request->getVar('v_e_relation'));
				$model4->set('e_extname', $this->request->getVar('v_e_extname'));
				$model4->set('e_contact', $this->request->getVar('v_e_contact'));
				$model4->set('r_lot', $this->request->getVar('v_r_lot'));
				$model4->set('r_street', $this->request->getVar('v_r_street'));
				$model4->set('r_village', $this->request->getVar('v_r_village'));
				$model4->set('r_barangay', $this->request->getVar('v_r_barangay'));
				$model4->set('r_citymunicipal', $this->request->getVar('v_r_citymunicipal'));
				$model4->set('r_province', $this->request->getVar('v_r_province'));
				$model4->set('p_lot', $this->request->getVar('v_p_lot'));
				$model4->set('p_street', $this->request->getVar('v_p_street'));
				$model4->set('p_village', $this->request->getVar('v_p_village'));
				$model4->set('p_barangay', $this->request->getVar('v_p_barangay'));
				$model4->set('p_citymunicipal', $this->request->getVar('v_p_citymunicipal'));
				$model4->set('p_province', $this->request->getVar('v_p_province'));
				$model4->where('id_',$id);
				$model4->update();

				$session->setFlashdata('success', "Successfully Updated Employee");

			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}	

			echo $id;		
		}
	}

	public function addEducation()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		try {
			$model1 = new Employee_education_model();
			$model1->set($posts);
			$model1->insert();			
		} catch (\Exception $e) {
			$status = $e;
			$session->setFlashdata('error', $e);
		}

		echo json_encode($status);
	}

	public function updateEducation()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		try {
			$model1 = new Employee_education_model();

			$model1->set($posts);
			$model1->insert();		
			
			$status = "success";	
		} catch (\Exception $e) {
			$status = $e;
			$session->setFlashdata('error', $e);
		}
	}

	public function deleteEducation()
	{
		$id = $this->request->getVar('tempID');

		$session = \Config\Services::session();
		try {
			$model1 = new Employee_education_model();
			$model1->where('id_', $id);
			$model1->delete();		
		} catch (\Exception $e) {
			$status = $e;
			$session->setFlashdata('error', $e);
		}
	}

	public function addEligibility()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		try {
			$model1 = new Employee_eligibility_model();
			$model1->set($posts);
			$model1->insert();			
		} catch (\Exception $e) {
			$status = $e;
			$session->setFlashdata('error', $e);
		}

		echo json_encode($status);
	}

	public function updateEligibility()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		try {
			$model1 = new Employee_eligibility_model();

			$model1->set($posts);
			$model1->insert();		

			$status = "updated eligibility";	
		} catch (\Exception $e) {
			$status = $e;
			$session->setFlashdata('error', $e);
		}

		echo json_encode($status);
	}

	public function deleteEligibility()
	{
		$id = $this->request->getVar('tempID');

		$session = \Config\Services::session();
		try {
			$model1 = new Employee_eligibility_model();
			$model1->where('id_', $id);
			$model1->delete();	

			$status = "deleted eligibility";	
		} catch (\Exception $e) {
			$status = $e;
			$session->setFlashdata('error', $e);
		}
		echo json_encode($status);
	}

	
    //--- Save Employee Detail to ID database
	public function save() 
    {
        $session = \Config\Services::session();
        
        // Validation for physical files only
        $validation = \Config\Services::validation();
        $validation->setRules([
            'file_picture'   => 'ext_in[file_picture,png,jpg,jpeg]|max_size[file_picture,2048]',
            'file_signature' => 'ext_in[file_signature,png,jpg,jpeg]|max_size[file_signature,2048]',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            $session->setFlashdata('error', 'Invalid file format or size.');
            return redirect()->to(base_url('employee/id'));
        }
    
        try {
            $deptCode = $this->request->getVar('dept_code');
            $path = 'public/assets/img/' . $deptCode;
            $directory = FCPATH . $path;
    
            // Create directory if it doesn't exist
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
    
            $lastName  = str_replace(' ', '', $this->request->getVar('lastname'));
            $firstName = str_replace(' ', '', $this->request->getVar('firstname'));
            $baseName  = $lastName . $firstName;
    
            // 1. Handle Picture
            $file_picture = "";
            $imgPic = $this->request->getFile('file_picture');
            if ($imgPic && $imgPic->isValid() && !$imgPic->hasMoved()) {
                $newName = $baseName . '-picture.png';
                $imgPic->move($directory, $newName, true);
                $file_picture = "/" . $path . "/" . $newName;
            }
    
            // 2. Handle Signature
            $file_signature = "";
            $imgSig = $this->request->getFile('file_signature');
            if ($imgSig && $imgSig->isValid() && !$imgSig->hasMoved()) {
                $newName = $baseName . '-signature.png';
                $imgSig->move($directory, $newName, true);
                $file_signature = "/" . $path . "/" . $newName;
            }
    
            // 3. Handle QR Code (Captured from Browser)
            $file_qrcode = "";
            $qrBase64 = $this->request->getVar('qr_code_data');
    
            if (!empty($qrBase64)) {
                $newName = $baseName . '-qrcode.png';
                // Remove 'data:image/png;base64,' prefix
                $data = explode(',', $qrBase64);
                if (isset($data[1])) {
                    $decoded = base64_decode($data[1]);
                    file_put_contents($directory . '/' . $newName, $decoded);
                    $file_qrcode = "/" . $path . "/" . $newName;
                }
            }
    
            // 4. Save to Database
            $model = new EmployeeID_model();
            $saveData = [
                'pgbid'          => $this->request->getVar('pgbid2'),
                'unique_id'      => $this->request->getVar('unique_id'),
                'file_picture'   => $file_picture,
                'file_signature' => $file_signature,
                'file_qrcode'    => $file_qrcode,
            ];
            
            $model->insert($saveData);
            $session->setFlashdata('success', 'New ID and QR Code uploaded successfully.');
    
        } catch (\Exception $e) {
            $session->setFlashdata('error', 'Error: ' . $e->getMessage());
        }
    
        return redirect()->to(base_url('employee/id'));
    }


	public function addServiceRecord() {
				
		$posts = $this->request->getVar();
		$now = date('Ymd_His');
		
		$path = 'public/uploaded/serviceRecord/';
		$directory = FCPATH . $path;
		if ("" != $this->request->getFile('uploadFile')) {
			$newName = $now.'.pdf';
			$newName = str_replace(' ','', $newName);
			$file = $this->request->getFile('uploadFile')->move($directory, $newName);
		}
		try {

			// Save to database
			$serviceRecordModel = new Service_record_model();
			
			$serviceRecordModel->set($posts);
			$serviceRecordModel->set('filename', $newName);
			$query = $serviceRecordModel->insert();
			// $query = $incomingModel->save($posts);
			
			// Notification for success and fail
			if (!$query) {
				return redirect()->back()->with('fail', 'Saving Service Record failed');
			}
			else
			{
				return redirect()->back()->with('success', 'Service Record addred successfully');
			}

		} catch (\Exception $e) {
			$session->setFlashdata('error', $e);
		}
    }
	
	public function department()
	{
	    
    $department = esc(session()->get('department'));
        
//-- Model --/
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
		$data['employee'] = $model1->searchByDept($department);
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "employee_list";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		// echo view('menu/document_tracking', $data);
		// echo view('menu/employee_menu', $data);	
		// echo view('menu/accounting_menu', $data);	
		// echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('employee/employee_dept', $data);	
		echo view('employee/employee_dept_add', $data);	
		echo view('employee/employee_dept_view', $data);	
		echo view('employee/employee_dept_function', $data);	
		echo view('employee/employee_dept_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
}