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

class Document extends BaseController
{
	public function __construct()
	{
	}
	
	public function incoming()
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
		$data['title'] = ucfirst("Incoming List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "Incoming";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		echo view('menu/accounting_menu', $data);	
		echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		echo view('menu/voucher_menu', $data);	
		echo view('menu/request_menu', $data);
		echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('document/incoming', $data);	
		echo view('document/incoming_receive', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function outgoing()
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
		$data['title'] = ucfirst("Outgoing List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "Outgoing";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		echo view('menu/accounting_menu', $data);	
		echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		echo view('menu/voucher_menu', $data);	
		echo view('menu/request_menu', $data);
		echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('document/outgoing', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function voucher()
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
		$data['title'] = ucfirst("Voucher List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "Voucher";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		echo view('menu/accounting_menu', $data);	
		echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		echo view('menu/voucher_menu', $data);	
		echo view('menu/request_menu', $data);
		echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('document/voucher', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}

	
	public function disbursement_voucher()
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
		$data['title'] = ucfirst("DV List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "DeptVoucher";
		$data['pagesub'] = "DisbursementVoucher";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		echo view('menu/accounting_menu', $data);	
		echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		echo view('menu/voucher_menu', $data);	
		echo view('menu/request_menu', $data);
		echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('document/disbursement_voucher', $data);	
		echo view('document/disbursement_voucher_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('document/disbursement_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}

	public function documents()
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
		$data['title'] = ucfirst("Documents List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "Documents";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		echo view('menu/accounting_menu', $data);	
		echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		echo view('menu/voucher_menu', $data);	
		echo view('menu/request_menu', $data);
		echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('document/documents', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}

	public function request()
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
		$data['title'] = ucfirst("Documents List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "Request";
		$data['pagesub'] = "";

//-- Header --/
		echo view('templates/header', $data);

//-- Sidebar --/
		echo view('menu/menu_top', $data);
		echo view('menu/menu_account', $data);
		echo view('menu/dashboard_menu', $data);
		echo view('menu/document_tracking', $data);
		echo view('menu/employee_menu', $data);	
		echo view('menu/accounting_menu', $data);	
		echo view('menu/treasurer_menu', $data);	
		echo view('menu/payroll_menu', $data);	
		echo view('menu/voucher_menu', $data);	
		echo view('menu/request_menu', $data);
		echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('document/request', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}

}