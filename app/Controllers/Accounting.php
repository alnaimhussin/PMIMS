<?php

namespace App\Controllers;

use App\Models\Accounting_model;
use App\Models\BankAccount_model;

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

class Accounting extends BaseController
{
	public function __construct()
	{
	}
	
	public function chartaccount()
	{
//-- Model --/
		$Accounting_model = new Accounting_model();
		
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Chart of Account"); // Capitalize the first letter
		$data['chart_account'] = $Accounting_model->getAll();
		$data['account_title'] = $Accounting_model->getAccountTitle();
		$data['account_type'] = $Accounting_model->getAccountType();

		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "GeneralLedger";
		$data['pagesub'] = "ChartAccount";

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
		echo view('accounting/chartaccount/chartaccount', $data);	
		echo view('accounting/chartaccount/chartaccount_add', $data);	
		echo view('accounting/chartaccount/chartaccount_view', $data);	
		echo view('accounting/chartaccount/chartaccount_function', $data);	
		echo view('accounting/chartaccount/chartaccount_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function journalentries()
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
		$data['title'] = ucfirst("Journal Entries"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "GeneralLedger";
		$data['pagesub'] = "JournalEntries";

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
		echo view('accounting/journalentries/journalentries', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function funds()
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
		$data['title'] = ucfirst("Journal Entries"); // Capitalize the first letter
		$data['employee'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['position'] = $model3->getAll();
		$data['profession'] = $model4->getAll();
		$data['salarygrade'] = $model5->getAll();
		$data['province'] = $model6->getAll();
		$data['citymunicipal'] = $model7->getAll();
		$data['page'] = "GeneralLedger";
		$data['pagesub'] = "Funds";

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
		echo view('accounting/funds/funds', $data);	
		echo view('employee/employee_add', $data);	
		echo view('employee/employee_view', $data);	
		echo view('employee/employee_function', $data);	
		echo view('employee/employee_script', $data);		
		
//-- Footer --/
		echo view('templates/footer');
	}
	
	public function bankaccounts()
	{
//-- Model --/
		$BankAccount_model = new BankAccount_model();

		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new Master_position_model();
		$model4 = new Master_profession_model();
		$model5 = new Master_salarygrade_model();
		$model6 = new Master_province_model();
		$model7 = new Master_citymunicipal_model();
		
//-- Data --/
		$data['title'] = ucfirst("Journal Entries"); // Capitalize the first letter
		$data['bankaccount'] = $BankAccount_model->getAll();
		
		$data['page'] = "GeneralLedger";
		$data['pagesub'] = "BankAccounts";

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
		echo view('accounting/bankaccounts/bankaccounts', $data);	
		echo view('accounting/bankaccounts/bankaccounts_add', $data);	
		echo view('accounting/bankaccounts/bankaccounts_script', $data);	
		// echo view('accounting/chartaccount/chartaccount_script', $data);	
		
//-- Footer --/
		echo view('templates/footer');
	}

	public function checkDuplicateAccountCode()
	{
		$account_code = $this->request->getVar('account_code');

		$Accounting_model = new Accounting_model();
		$count = $Accounting_model->checkDuplicateAccountCode($account_code);
		echo json_encode($count);
	}

	public function checkDuplicateBankCode()
	{
		$bank_code = $this->request->getVar('bank_code');

		$BankAccount_model = new BankAccount_model();
		$count = $BankAccount_model->checkDuplicateBankCode($bank_code);
		echo json_encode($count);
	}

	public function addAccount()
	{
		$posts = $this->request->getVar();
		$datenow = date("Y-m-d H:i:s");

		$session = \Config\Services::session();

		try {
			$Accounting_model = new Accounting_model();
			$Accounting_model->set($posts);
			$Accounting_model->set('date_created', $datenow);
			$Accounting_model->insert();
			
			$session->setFlashdata('success', "Successfully Added New Account");
		} catch (\Exception $e) {
			$session->setFlashdata('error', $e);
		}

		echo json_encode($id);
	}

	public function addBankAccount()
	{
		$posts = $this->request->getVar();
		$datenow = date("Y-m-d H:i:s");

		$session = \Config\Services::session();

		try {
			$BankAccount_model = new BankAccount_model();
			$BankAccount_model->set($posts);
			$BankAccount_model->set('date_created', $datenow);
			$BankAccount_model->insert();
			
			$session->setFlashdata('success', "Successfully Added New Bank Account");
		} catch (\Exception $e) {
			$session->setFlashdata('error', $e);
		}

		echo json_encode($id);
	}

}