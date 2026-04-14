<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Inbound_model;
use App\Models\Notice_model;
use App\Models\Province_model;
use App\Models\Citymun_model;
use App\Models\Lgu_model;

class Notice extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
		$model = new Notice_model();
		$data['posts'] = $model->getAll();
		$data['page'] = "notice";
		$data['pagesub'] = "";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_list');
		echo view('templates/footer', $data);
	}

	public function list()
	{
		$model = new Notice_model();
		$data['posts'] = $model->getAll();
		$data['page'] = "notice";
		$data['pagesub'] = "notice_list";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_list');
		echo view('templates/footer', $data);
	}

	public function list_release()
	{
		$model = new Notice_model();
		$data['posts'] = $model->getAll();
		$data['page'] = "notice";
		$data['pagesub'] = "notice_list";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_list_release');
		echo view('templates/footer', $data);
	}

	public function list_validated()
	{
		$model = new Notice_model();
		$data['posts'] = $model->getValidated();
		$data['page'] = "notice";
		$data['pagesub'] = "notice_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_list');
		echo view('templates/footer', $data);
	}

	public function add()
	{
		$model = new Inbound_model();
		$model2 = new Notice_model();
		$data['posts'] = $model->getValidated();
		$data['lastNumber'] = $model2->getLastNumber();
		$data['page'] = "notice";
		$data['pagesub'] = "notice_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_add');
		echo view('templates/footer', $data);
	}

	public function view($id = "")
	{
		$model = new Notice_model();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$data['posts'] = $model->getDetail($id);
		$data['page'] = "notice";
		$data['pagesub'] = "notice_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_view');
		echo view('templates/footer', $data);
	}

	public function edit($id = "")
	{
		$model = new Notice_model();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$data['posts'] = $model->getDetail($id);
		$data['page'] = "notice";
		$data['pagesub'] = "notice_add";

		echo view('templates/header', $data);
		echo view('menu/sidebar', $data);
		echo view('notice/notice_upd');
		echo view('templates/footer', $data);
	}

	public function save()
	{
		$posts = $this->request->getVar();			
		try {
			$model = new Notice_model();
			$model->set($posts);
			$model->insert();
		} catch (\Exception $e) {
			$session->setFlashdata('error', $e);
		}
		$session = \Config\Services::session();
		$session->setFlashdata('success', 'Notice of Coordination Added Successfully.');
		
		echo $session->getFlashdata('error');
		// return redirect()->to(base_url('Notice/add'));
	}

	public function update($id = "")
	{
		$posts = $this->request->getVar();
		$model = new Notice_model();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'lastname' => 'required|string',
			'firstname' => 'required|string',
			'middlename' => 'required|string',
			'mobile' => 'required|string',
			'category' => 'required|string',
			'province' => 'required|string',
			'citymun' => 'required|string',
			'lgu' => 'required|string',
			'barangay' => 'required|string',
			'transportation' => 'required|string'
		]);
		$res = $validation->withRequest($this->request)
			->run();
		if (!$res) {
			$this->edit($id);
		} else {
			$session = \Config\Services::session();
			try {
				$model = new Notice_model();
				$Notice = $model->update(['id' => $id], $posts);
				$session->setFlashdata('success', 'Notice Updated Successfully.');
			} catch (\Exception $e) {
				$session->setFlashdata('error', 'Something went wrong.');
			}
			return redirect()->to(base_url('Notice/list'));
		}
	}

	public function delete($id = "")
	{
		$session = \Config\Services::session();
		try {
			$model = new Notice_model();
			$data['Notice'] = $model->where('id', $id)->delete();
			$session->setFlashdata('success', 'Notice Deleted Successfully.');
		} catch (\Exception $e) {
			$session->setFlashdata('error', 'Something went wrong.');
		}
		return redirect()->to(base_url('Notice/list'));
	}
}