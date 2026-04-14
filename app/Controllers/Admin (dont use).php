<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Employee_model;
use App\Models\EmployeeID_model;
use App\Models\Master_department_model;

class Admin extends Controller
{
	public function index()
	{
		$validation =  \Config\Services::validation();
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
		$data['page'] = "admin";
		$data['pagesub'] = "admin";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('dashboard/dashboard', $data);
		echo view('templates/footer', $data);
    }

	function login()
	{
		echo view('login/login');
	}

	//--------------------------------------------------------------------

}
