<?php

namespace App\Controllers;

use App\Models\User_Model;
use CodeIgniter\Controller;

class AuthController extends Controller
{

    protected $helpers = ['form'];

    public function login()
    {
        // Show login form
		echo view('auth/login');	
    }   

	public function attemptLogin()
    {
        
// 1. Define and Validate Rules
    $rules = [
        'username' => 'required',
        'password' => 'required|min_length[8]'
    ];
    
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
// 2. User Authentication
    $userModel = new \App\Models\User_Model();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    
    $user = $userModel->getUserByUsername($username);

    // Check if user exists and password verifies securely
    if (!$user || !password_verify($password, $user['password'])) {
        return redirect()->back()->withInput()->with('error', 'Invalid credentials');
    }
    
// 3. Update Last Login Info (Optional but Good Practice)
    $userModel->update($user['id'], [
        'ip_address' => $this->request->getIPAddress(),
        'login_at' => date('Y-m-d H:i:s')
    ]);

// 4. Set User Session
    $sessionData = [
        'user_id'     => $user['id'],
        'username'    => $user['username'],
        'firstname'   => $user['firstname'],
        'lastname'    => $user['lastname'],
        'access_type' => $user['access_type'],
        'department'  => $user['department'],
        'module'      => 'Provincial Medicine Inventory Management System',
        'logged_in'   => true
    ];
    
    session()->set($sessionData);
    
// 5. Redirection Logic

// Fetch the user's department ID
    $departmentId = $user['department'];
    
// Handle special cases first (e.g., Department 0 for Admin)
    if ($departmentId == '0') {
        return redirect()->to('/pmims/dashboard'); // Full Admin View
    }

// Redirect all other departments dynamically
// The user will be sent to a URL like /department/view/1 or /department/view/5
    return redirect()->to('/pmims/employee/department');   

    }
    
    public function logout()
    {
        session()->destroy();
        header('Location: /pmims/auth/login');
        exit();
    }


}