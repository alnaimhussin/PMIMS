<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Inbound_model;
use App\Models\Travelpass_model;
use App\Models\Travelpassmember_model;

use App\Models\Province_model;
use App\Models\Citymun_model;
use App\Models\Lgu_model;

class Client extends BaseController
{
	public function index()
	{
		$validation =  \Config\Services::validation();
		$data['page'] = "inbound";
		$data['pagesub'] = "inbound_add";

		echo view('templates/header2', ['validation' => $validation]);
		echo view('client/menu');
		echo view('templates/footer');
	}
	
	public function addInbound()
	{
		$posts = $this->request->getVar();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$validation =  \Config\Services::validation();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$data['posts'] = $posts;
		$data['page'] = "inbound";
		$data['pagesub'] = "inbound_add";

		echo view('templates/header2', $data, ['validation' => $validation]);
		echo view('client/inbound_add');
		echo view('templates/footer', $data);
	}
	
	public function addOutbound()
	{
		$posts = $this->request->getVar();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$validation =  \Config\Services::validation();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$data['posts'] = $posts;
		$data['page'] = "outbound";
		$data['pagesub'] = "outbound_add";

		echo view('templates/header2', $data, ['validation' => $validation]);
		echo view('client/outbound_add');
		echo view('templates/footer', $data);
	}

	public function addTravelPass()
	{
		$posts = $this->request->getVar();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$validation =  \Config\Services::validation();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$data['posts'] = $posts;
		$data['page'] = "travelpass";
		$data['pagesub'] = "travelpass_add";

		echo view('templates/header2', $data, ['validation' => $validation]);
		echo view('client/travelpass_add');
		echo view('templates/footer', $data);
	}

	public function addMember()
	{
		$posts = $this->request->getVar();
		$province = new Province_model();
		$citymun = new Citymun_model();
		$lgu = new Lgu_model();
		$validation =  \Config\Services::validation();
		$data['province'] = $province->getProvinceSort();
		$data['citymun'] = $citymun->findAll();
		$data['lgu'] = $lgu->getLguSort();
		$data['posts'] = $posts;
		$data['page'] = "travelpass";
		$data['pagesub'] = "travelpass_add";

		echo view('templates/header2', $data, ['validation' => $validation]);
		echo view('client/travelpass_addMember');
		echo view('templates/footer', $data);
	}

	public function saveInbound()
	{
		$posts = $this->request->getVar();
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
			'transportation' => 'required|string',
			'medicalcert_image' => [
				'rules' => 'is_image[medicalcert_image]|max_size[medicalcert_image,2048]',
				'label' => 'Medical Certificate'
			],
			'travelauth_image' => [
				'rules' => 'is_image[travelauth_image]|max_size[travelauth_image,2048]',
				'label' => 'Travel Authority'
			],
			'residency_image' => [
				'rules' => 'is_image[residency_image]|max_size[residency_image,2048]',
				'label' => 'Prrof of Residency'
			],
			'owwa_image' => [
				'rules' => 'is_image[owwa_image]|max_size[owwa_image,2048]',
				'label' => 'OWWA Coordination'
			],
			'companyid_image' => [
				'rules' => 'is_image[companyid_image]|max_size[companyid_image,2048]',
				'label' => 'Company ID'
			],
			'employmentcert_image' => [
				'rules' => 'is_image[employmentcert_image]|max_size[employmentcert_image,2048]',
				'label' => 'Employment Certificate'
			],
			'travelorder_image' => [
				'rules' => 'is_image[travelorder_image]|max_size[travelorder_image,2048]',
				'label' => 'Travel Order'
			],
		]);
		$res = $validation->withRequest($this->request)->run();
		if (!$res) {
			$session = \Config\Services::session();
			$session->setFlashdata('validation', 'true');
			$this->addInbound();
		} else {
			$session = \Config\Services::session();
			try {
				$path = 'public/assets/img/' . date('mdY');
				$directory = FCPATH . $path;
				if ("" != $this->request->getFile('medicalcert_image')) {
					$newName = $this->request->getFile('medicalcert_image')->getRandomName();
					$file = $this->request->getFile('medicalcert_image')->move($directory, $newName);
					$medicalcert_image = "/" . $path . "/" . $newName;
				} else {
					$medicalcert_image = "";
				}
				if ("" != $this->request->getFile('travelauth_image')) {
					$newName = $this->request->getFile('travelauth_image')->getRandomName();
					$file = $this->request->getFile('travelauth_image')->move($directory, $newName);
					$travelauth_image = "/" . $path . "/" . $newName;
				} else {
					$travelauth_image = "";
				}
				if ("" != $this->request->getFile('residency_image')) {
					$newName = $this->request->getFile('residency_image')->getRandomName();
					$file = $this->request->getFile('residency_image')->move($directory, $newName);
					$residency_image = "/" . $path . "/" . $newName;
				} else {
					$residency_image = "";
				}
				if ("" != $this->request->getFile('owwa_image')) {
					$newName = $this->request->getFile('owwa_image')->getRandomName();
					$file = $this->request->getFile('owwa_image')->move($directory, $newName);
					$owwa_image = "/" . $path . "/" . $newName;
				} else {
					$owwa_image = "";
				}
				if ("" != $this->request->getFile('companyid_image')) {
					$newName = $this->request->getFile('companyid_image')->getRandomName();
					$file = $this->request->getFile('companyid_image')->move($directory, $newName);
					$companyid_image = "/" . $path . "/" . $newName;
				} else {
					$companyid_image = "";
				}
				if ("" != $this->request->getFile('employmentcert_image')) {
					$newName = $this->request->getFile('employmentcert_image')->getRandomName();
					$file = $this->request->getFile('employmentcert_image')->move($directory, $newName);
					$employmentcert_image = "/" . $path . "/" . $newName;
				} else {
					$employmentcert_image = "";
				}
				if ("" != $this->request->getFile('travelorder_image')) {
					$newName = $this->request->getFile('travelorder_image')->getRandomName();
					$file = $this->request->getFile('travelorder_image')->move($directory, $newName);
					$travelorder_image = "/" . $path . "/" . $newName;
				} else {
					$travelorder_image = "";
				}

				$model = new Inbound_model();
				$model->set('medicalcert_image', $medicalcert_image);
				$model->set('travelauth_image', $travelauth_image);
				$model->set('residency_image', $residency_image);
				$model->set('owwa_image', $owwa_image);
				$model->set('companyid_image', $companyid_image);
				$model->set('employmentcert_image', $employmentcert_image);
				$model->set('travelorder_image', $travelorder_image);
				$model->set($posts);
				$model->insert();
				$session->setFlashdata('success', 'Detail Added Successfully.');
			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}
			echo $session->getFlashdata('error');
			return redirect()->to(base_url(''));
		}
	}
	
	// public function get_unused_id()
	// {
	// 	$session = \Config\Services::session();
	// 	// Create a random user id
	// 	$random_unique_int = mt_rand(1200,999999999);

	// 	// Make sure the random user_id isn't already in use
	// 	$model = new Travelpass_model();
	// 	$query = $model->where('pass_id', $random_unique_int);

	// 	if ($query->countAllResults() > 0)
	// 	{
	// 		$query->free_result();
	// 		// If the random user_id is already in use, get a new number
	// 		$this->get_unused_id();
	// 	}		
	// 	$session->remove('pass_id');
	// 	$session->set('pass_id', $random_unique_int);
	// 	// return $random_unique_int;
	// }

	public function saveTravelPass()
	{
		// $this->get_unused_id();
		$posts = $this->request->getVar();
		$session = \Config\Services::session();
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'category' => 'required|string',
			'lgu' => 'required|string',
			'address1' => 'required|string',
			'barangay' => 'required|string',
			'province' => 'required|string',
			'citymun' => 'required|string',
			'address2' => 'required|string',
			'withvehicle' => 'required|string',
			'departure' => 'required|string',
		]);
		$res = $validation->withRequest($this->request)->run();

		if (!$res) {
			$session->setFlashdata('validation', 'true');
			$this->addMember();
		} else {
			try {
				$model = new Travelpass_model();
				$model->set($posts);
				$model->insert();
				$session->setFlashdata('success', 'true');
			} catch (\Exception $e) {
				$session->setFlashdata('error', $e);
			}
		}
	}

	public function saveTravelMember()
	{
		$posts = $this->request->getVar();	
		$session = \Config\Services::session();	
		
		try {
			$model = new Travelpassmember_model();
			$model->set($posts);
			$model->insert();
			$session->setFlashdata('success', 'true');
		} catch (\Exception $e) {
			$session->setFlashdata('error', $e);
		}
		$session->setFlashdata('success', 'Details Added Successfully.');
	}
	//--------------------------------------------------------------------
	public function successTravelpass()
	{
		echo view('templates/header2');
		echo view('client/travelpass_view');
		echo view('templates/footer');
	}		
	
}