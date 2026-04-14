<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_Model;
use App\Models\Master_department_model;
use App\Libraries\Hash;

class Users extends BaseController
{
	public function __construct()
	{
	}
	
	public function index()
	{
		$model = new User_Model();
		$data['title']   = ucfirst("User List");
		$data['posts'] = $model->getAll();
		$data['page'] = "user_list";
		$data['pagesub'] = "user_list";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('user/user_list');
		echo view('templates/footer', $data);
	}

	public function users_list()
	{
//-- Model --/
		$model1 = new User_Model();
		$model2 = new Master_department_model();
		
//-- Data --/
		$data['title'] = ucfirst("Users List"); // Capitalize the first letter
		$data['users'] = $model1->getAll();
		$data['department'] = $model2->getAll();
		$data['page'] = "users_list";
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
		// echo view('menu/payroll_menu', $data);	
		// echo view('menu/voucher_menu', $data);	
		// echo view('menu/request_menu', $data);
		// echo view('menu/report_menu', $data);	
		echo view('menu/settings_menu', $data);	
		// echo view('menu/support_menu', $data);	
		echo view('menu/menu_bottom', $data);
		echo view('menu/menu_script', $data);

//-- Page --/
		echo view('user/users', $data);	
		echo view('user/users_add', $data);	
		echo view('user/users_script', $data);	
		
//-- Footer --/
		echo view('templates/footer');
	}

	public function doRegister()
	{
		$password = $this->request->getPost('password');
		$hashed = password_hash($password, PASSWORD_DEFAULT);
		return $hashed;
		// // Debug output
		// echo "Original: $password <br>";
		// echo "Hashed: $hashed <br>";
		// echo "Verify: " . (password_verify($password, $hashed) ? 'true' : 'false');
		// die();
		
		// // ... rest of your code
	}
	
	public function add()
	{

		$posts = $this->request->getVar();

		$session = \Config\Services::session();
		$validation = \Config\Services::validation();
		$validation->setRules([
			'lastname' => 'required|string',
			'firstname' => 'required|string',
			'username' => 'required|string',
			'password' => 'required|min_length[8]',
		]);

		$res = $validation->withRequest($this->request)->run();
		if (!$res) {
			$session->setFlashdata('validation', 'true');
			$this->index();
		} else {
			try {

				// Storing data

				$userModel = new User_Model();
				$query = $userModel->save($posts);
				
				// Notification for success and fail

				if (!$query) {
					return redirect()->back()->with('fail', 'Saving user failed');
				}
				else
				{
					return redirect()->back()->with('success', 'User added successfully');
				}

			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}

		}
	}

	public function list()
	{
	}

}