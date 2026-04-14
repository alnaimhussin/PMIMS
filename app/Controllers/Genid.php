<?php namespace App\Controllers;
 
use CodeIgniter\Controller;

use App\Models\Employee_model;
 
class Genid extends Controller
{
    public function index($id = 0)
    {
		$posts = $this->request->getVar();
		$pgbid = $posts['id'];
		$model1 = new Employee_model();
		$data['id'] = $pgbid;
		$data['employee'] = $model1->getDetail($pgbid);

		echo view('templates/header2');
		echo view('genid/genid', $data);
		echo view('templates/footer2');
    }
    public function download()
    {
		$posts = $this->request->getVar();
		$data['posts'] = $posts;

		echo view('genid/download', $data);
    }  
	function ajax_upload()  
	{  
		 if(isset($_FILES["image_file"]["name"]))  
		 {  
			  $config['upload_path'] = './upload/';  
			  $config['allowed_types'] = 'jpg|jpeg|png|gif';  
			  $this->load->library('upload', $config);  
			  if(!$this->upload->do_upload('image_file'))  
			  {  
				   echo $this->upload->display_errors();  
			  }  
			  else  
			  {  
				   $data = $this->upload->data();  
				   echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
			  }  
		 }  
	}  
}