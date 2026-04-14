<?php namespace App\Controllers;

require_once(APPPATH.'config/autoload.php');
use CodeIgniter\Controller;
use App\Models\Auth_model;
use App\Models\User_model;
 
class Register extends Controller
{

    public function __construct() {
    }

    public function index() {
        
    }

    public function create() {
        // set validation rules
		$form_validation =  \Config\Services::validation();
        $form_validation->setRules([
            'username' => 'required|alpha_numeric|max_length[15]',
            'password' => 'required|alpha_numeric|min_length[8]|max_length[12]'
        ]);
        
		$result = $form_validation->withRequest($this->request)->run();

		if(!$result){
		
			$data['title'] = ucfirst("User List");
			$data['page'] = "position";
			$data['pagesub'] = "position_add";
	
			echo view('templates/header', $data, ['validation' => $form_validation]);
			echo view('menu/sidebar', $data);
			echo view('user/user_list');
			echo view('templates/footer', $data);
		}
		else{
			$session = \Config\Services::session();

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $lastname = $this->request->getVar('lastname');
            $firstname = $this->request->getVar('firstname');

            // hash the password with a unique salt
            // $options = [
            //     'cost' => 12,
            //     'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
            // ];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // insert the new user's information into the database
            $data = array(
                'username' => $username,
                'password' => $hashed_password,
                'lastname' => $lastname,
                'firstname' => $firstname
            );

			try{
				$model = new User_model();
				$model->insert($data);
				$session->setFlashdata('success', 'New User Added Successfully.');
                return redirect()->to( base_url('users/') );
			}
			catch(\Exception $e){
				$session->setFlashdata('error', 'Something went wrong.');
                echo "error";
			}			
		}
    }
 
}