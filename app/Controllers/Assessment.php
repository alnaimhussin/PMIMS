<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Inbound_model;
use App\Models\Travelpass_model;
use App\Models\Travelpassmember_model;

use App\Models\Province_model;
use App\Models\Citymun_model;
use App\Models\Lgu_model;

class Assessment extends BaseController
{
	public function index()
	{
	}

	public function new()
	{
		$data['page'] = "assessment";
		$data['pagesub'] = "new";

		echo view('templates/header', $data);
		echo view('menu/sidebar');
		echo view('assessment/new');
		echo view('templates/footer');
	}
	
}