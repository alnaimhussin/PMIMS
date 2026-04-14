<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Department_model;
use App\Models\Division_model;
use App\Models\Master_department_model;

class Department extends BaseController
{
	public function index()
	{
		$data['title'] = ucfirst("Department List"); // Capitalize the first letter
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "department";
		$data['pagesub'] = "";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('department/department_list');
		echo view('templates/footer', $data);
	}	
	
	public function add()
	{
		$data['title'] = ucfirst("Department List"); // Capitalize the first letter
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "department";
		$data['pagesub'] = "department_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('department/department_add');
		echo view('templates/footer', $data);
	}	
	
	public function addDivision()
	{
		$model = new Department_model();
		$data['title'] = ucfirst("Department Division List"); // Capitalize the first letter
		$data['posts'] = $model->findAll();
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "division";
		$data['pagesub'] = "department_addDivision";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('department/department_addDivision');
		echo view('templates/footer', $data);
	}	

	public function save(){
		$data = $this->request->getVar();
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'department' => 'required|string',
			// 'firstname' => 'required|integer|greater_than[0]',
			// 'email' => 'required|valid_email'
		]);
		$res = $validation->withRequest($this->request)
			->run();
		if(!$res){
		
			$data['title'] = ucfirst("Department List"); // Capitalize the first letter
			$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
			$data['page'] = "department";
			$data['pagesub'] = "department_add";
	
			echo view('templates/header', $data, ['validation' => $validation]);
			echo view('menu/sidebar', $data);
			echo view('department/department_add');
			echo view('templates/footer', $data);
		}
		else{
			$session = \Config\Services::session();
			try{
				$model = new Department_model();
				$employee=$model->insert($data);
				$session->setFlashdata('success', 'Department Added Successfully.');
			}
			catch(\Exception $e){
				$session->setFlashdata('error', 'Something went wrong.');
			}			
			return redirect()->to( base_url('department/list') );
		}
	}

	public function saveDivision(){
		$data = $this->request->getVar();
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'division' => 'required|string',
			'department' => 'required|string',
			// 'firstname' => 'required|integer|greater_than[0]',
			// 'email' => 'required|valid_email'
		]);
		$res = $validation->withRequest($this->request)
			->run();
		if(!$res){
			$model = new Department_model();
			$data['title'] = ucfirst("Department Division List"); // Capitalize the first letter
			$data['posts'] = $model->findAll();
			$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
			$data['page'] = "division";
			$data['pagesub'] = "department_addDivision";
	
			echo view('templates/header', $data);
			echo view('menu/sidebar', $data);
			echo view('department/department_addDivision');
			echo view('templates/footer', $data);
		}
		else{
			$session = \Config\Services::session();
			try{
				$model = new Division_model();
				$employee=$model->insert($data);
				$session->setFlashdata('success', 'Division Added Successfully.');
			}
			catch(\Exception $e){
				$session->setFlashdata('error', 'Something went wrong.');
			}			
			return redirect()->to( base_url('department/listDivision') );
		}
	}	
	
	public function list()
	{
		$model = new Master_department_model();
		$data['title'] = ucfirst("Department List"); // Capitalize the first letter
		$data['posts'] = $model->findAll();
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "department";
		$data['pagesub'] = "department_list";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('department/department_list');
		echo view('templates/footer', $data);
	}	
	
	public function listDivision()
	{
		$model = new Division_model();
		$data['title'] = ucfirst("Department List"); // Capitalize the first letter
		$data['posts'] = $model->findAll();
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "division";
		$data['pagesub'] = "department_listDivision";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('department/department_listDivision');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
