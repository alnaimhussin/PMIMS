<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

use App\Models\Employee_model;
use App\Models\EmployeeID_model;
use App\Models\Master_department_model;
 
class Dashboard extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
	
    public function index()
    {
		$model1 = new Employee_model();
		$model2 = new Master_department_model();
		$model3 = new EmployeeID_model();
		$data['title'] = ucfirst("Dashb0oard");
		$data['countAll'] = $model1->getCount();
		$data['countAllID'] = $model3->getCount();
		$data['countDuplicateID'] = $model1->getCountDuplicateID();
		$data['countMale'] = $model1->getMale();
		$data['countFemale'] = $model1->getFemale();
		$data['department'] = $model2->getAll();
		$data['deptID'] = $model1->getCountDeptID();
		$data['alldept'] = $model1->getCountByDept();
		$data['permanent'] = $model1->getCountPermanent();
		$data['casual'] = $model1->getCountCasual();
		$data['joborder'] = $model1->getCountJobOrder();
		$data['page'] = "dashboard";
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
		echo view('dashboard/dashboard', $data);
		echo view('dashboard/dashboard_script', $data);		
    		
//-- Footer --/
		echo view('templates/footer');
    		
    }
}