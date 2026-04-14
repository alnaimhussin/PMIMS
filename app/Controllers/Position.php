<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Position_model;

class Position extends BaseController
{
	public function index()
	{
		$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "position";
		$data['pagesub'] = "";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('position/position_list');
		echo view('templates/footer', $data);
	}	
	
	public function add()
	{
		$data['page'] = "position";
		$data['pagesub'] = "position_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('position/position_add');
		echo view('templates/footer', $data);
	}	
	
	public function edit()
	{
		$data['page'] = "position";
		$data['pagesub'] = "position_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('position/position_add');
		echo view('templates/footer', $data);
	}	

	public function save(){
		$data = $this->request->getVar();
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'position' => 'required|string',
			// 'firstname' => 'required|integer|greater_than[0]',
			// 'email' => 'required|valid_email'
		]);
		$res = $validation->withRequest($this->request)
			->run();
		if(!$res){
		
			$data['title'] = ucfirst("Employee List"); // Capitalize the first letter
			$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
			$data['page'] = "position";
			$data['pagesub'] = "position_add";
	
			echo view('templates/header', $data, ['validation' => $validation]);
			echo view('menu/sidebar', $data);
			echo view('position/position_add');
			echo view('templates/footer', $data);
		}
		else{
			$session = \Config\Services::session();
			try{
				$model = new Position_model();
				$employee=$model->insert($data);
				$session->setFlashdata('success', 'Position Added Successfully.');
			}
			catch(\Exception $e){
				$session->setFlashdata('error', 'Something went wrong.');
			}			
			return redirect()->to( base_url('position/list') );
		}
	}
	
	
	public function list()
	{
		$model = new Position_model();
		$data['title'] = ucfirst("Position List"); // Capitalize the first letter
		$data['posts'] = $model->findAll();
		$data['poweredby'] = ucfirst("CodeIgniter"); // Capitalize the first letter
		$data['page'] = "position";
		$data['pagesub'] = "position_list";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('position/position_list');
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
