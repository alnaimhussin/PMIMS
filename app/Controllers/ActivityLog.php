<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Activitylog_model;

class ActivityLog extends BaseController
{
	public function __construct()
	{
	}
	
	public function index()
	{
	}

	public function list()
	{
		$model = new Activitylog_model();
		$data['title']   = ucfirst("Activity Log");
		$data['posts'] = $model->getAll();
		$data['page'] = "activitylog_list";
		$data['pagesub'] = "activitylog_list";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('activitylog/activitylog_list');
		echo view('templates/footer', $data);
	}

	public function loggedMe($username, $message)
	{	
			if($username == "") {
				return false;
			}
		
			$data['message'] = $message;
			$data['username'] = $username;
			$data['timestamp'] = date('Y-m-d H:i:s');
			$this->db->insert($data);
		// $session = \Config\Services::session();
		// try {
		// 	$db = \Config\Database::connect();
		// 	$builder = $db->table('activitylog');
		// 	$builder->set('username',$session->get('username'));
		// 	$builder->set('activity',$session->get('activity'));
		// 	$builder->set('description',$session->get('description'));
		// 	$builder->insert();
		// } catch (\Exception $e) {
		// 	$session->setFlashdata('error', 'Something went wrong.');
		// }
		// return;
	}
}