<?php

namespace App\Controllers;

use App\Models\Employee_details_model;
use App\Models\Master_department_model;
use App\Models\Master_position_model;
use App\Models\Master_profession_model;

class Master extends BaseController
{
	public function __construct()
	{
	}
	
	public function department()
	{
		$model1 = new Master_department_model();
		$data['title']   = ucfirst("Department Master");
		$data['department'] = $model1->getAll();
		$data['page'] = "master";
		$data['pagesub'] = "department";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('master/department', $data);		
		echo view('templates/footer', $data);
	}

	public function position()
	{
		$model1 = new Master_position_model();
		$data['title']   = ucfirst("Position Master");
		$data['position'] = $model1->getAll();
		$data['page'] = "master";
		$data['pagesub'] = "position";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('master/position');		
		echo view('master/position_add');
		echo view('master/position_view');
		echo view('master/position_script');		
		echo view('templates/footer', $data);
	}

	public function profession()
	{
		$model1 = new Master_profession_model();
		$data['title']   = ucfirst("Title / Profession Master");
		$data['profession'] = $model1->getAll();
		$data['page'] = "master";
		$data['pagesub'] = "profession";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('master/profession');		
		echo view('templates/footer', $data);
	}

	public function list()
	{
	}
	
	public function addDepartment()
	{
		$posts = $this->request->getVar();	
		$session = \Config\Services::session();	
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'dept_code' => 'is_unique[pgb_department.dept_code]',
			'department' => 'required|string',
			'description' => 'required|string'
		]);
		$res = $validation->withRequest($this->request)->run();	
		
		if (!$res) {			
			$this->department();
		} else {
			try {
				$model = new Master_department_model();
				$model->set($posts);
				$model->insert();
			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}
			$session->setFlashdata('success', 'New Department Added Successfully.');			
			return redirect()->to(base_url('master/department'));
		}
	}
	
	public function addPosition()
	{
		$posts = $this->request->getVar();	
		$session = \Config\Services::session();	
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'pos_code' => 'is_unique[pgb_position.pos_code]',
			'position' => 'required|string',
		]);
		$res = $validation->withRequest($this->request)->run();	

		if (!$res) {	
			if ($this->request->getVar('caller') != "employee") {
				$this->position();
			}			
		} else {
			try {
				$model = new Master_position_model();
				$model->set($posts);
				$model->insert();
			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}
			if ($this->request->getVar('caller') == "employee") {
				echo json_encode('New Position Added Successfully.');
			} else {
				$session->setFlashdata('success', 'New Position Added Successfully.');
				return redirect()->to(base_url('master/position'));
			}
		}
	}
	public function updatePosition()
	{
		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		try {
			$id = $this->request->getVar('v_id');

			$model1 = new Master_position_model();
			$model1->set('position', $this->request->getVar('v_position'));
			$model1->set('description', $this->request->getVar('v_description'));
			$model1->set('pos_code', $this->request->getVar('v_pos_code'));
			$model1->where('id',$id);
			$model1->update();

			$session->setFlashdata('success', "Successfully Updated Position");

		} catch (\Exception $e) {
			$session->setFlashdata('error', $e);
		}	
	}
	
	public function addProfession()
	{
		$posts = $this->request->getVar();	
		$session = \Config\Services::session();	
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'prof_code' => 'is_unique[pgb_profession.prof_code]',
			'profession' => 'required|string',
			'description' => 'required|string'
		]);
		$res = $validation->withRequest($this->request)->run();	
		
		if (!$res) {			
			if ($this->request->getVar('caller') != "profession") {
				$this->profession();
			}			
		} else {
			try {
				$model = new Master_profession_model();
				$model->set($posts);
				$model->insert();
			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}
			if ($this->request->getVar('caller') == "employee") {
				echo json_encode('New Profession Added Successfully.');
			} else {
				$session->setFlashdata('success', 'New Profession Added Successfully.');
				return redirect()->to(base_url('master/profession'));
			}
		}
	}

	
}