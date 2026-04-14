<?php

namespace App\Controllers;

use App\Models\Employee_model;
use App\Models\Master_department_model;
use App\Models\Master_acct_year_model;

class Payroll extends BaseController
{
	public function __construct()
	{
	}

	public function index()
	{
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_acct_year_model();
		$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['acct_year'] = $model3->getAll();
		$data['page'] = "payroll";
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
		echo view('payroll/payroll', $data);	
		echo view('payroll/payroll_script', $data);		
		
//-- Footer --/	
		echo view('templates/footer');
	}
	
	public function deduction()
	{
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_acct_year_model();
		$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['acct_year'] = $model3->getAll();
		$data['page'] = "payroll_deduction";
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
		echo view('payroll/payroll_deduction', $data);	
		echo view('payroll/payroll_deduction_script', $data);		
		
//-- Footer --/	
		echo view('templates/footer');
	}
	
	
	public function ssl_matrix()
	{
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_acct_year_model();
		$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['acct_year'] = $model3->getAll();
		$data['page'] = "payroll_ssl_matrix";
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
		echo view('payroll/payroll_ssl_matrix', $data);	
		echo view('payroll/payroll_script', $data);		
		
//-- Footer --/	
		echo view('templates/footer');
	}
}