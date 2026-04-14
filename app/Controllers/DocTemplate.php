<?php

namespace App\Controllers;

class DocTemplate extends BaseController
{
	public function __construct()
	{
	}
	public function index()
	{
	}

	public function disbursement()
	{
		$data['page'] = "disbursement";
		$data['pagesub'] = "";

		// $this->load->helper('window_size');
		// $data['window_height'] = 800; // or calculate dynamically
		
		//-- Header --/
		echo view('templates/header2', $data);
				
		//-- Page --/
		echo view('doctemplate/disbursement_voucher');
	}
	
	public function obligation()
	{
		$data['page'] = "obligation";
		$data['pagesub'] = "";

		//-- Header --/
		echo view('templates/header2', $data);
				
		//-- Page --/
		echo view('doctemplate/obligation_request');	

	}
}