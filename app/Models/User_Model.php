<?php namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    
    protected $table = 'users';
    protected $primaryKey = 'id';
	protected $allowedFields = ['firstname','lastname','username','password','department','access_type','created_on', 'ip_address'];
    protected $beforeInsert = ['hashPassword', 'captureIpAddress'];
    protected $beforeUpdate = ['hashPassword', 'captureIpAddress']; // If you want to hash on updates too


    public function __construct() {
        parent::__construct();
    }

    protected function captureIpAddress(array $data)
    {
        $data['data']['ip_address'] = $this->getUserIp();
        return $data;
    }

    protected function getUserIp()
    {
        $request = \Config\Services::request();
        
        // Get the IP address, accounting for proxies
        $ip = $request->getIPAddress();
        
        // Validate it's a real IP (v4 or v6)
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : null;
    }

    protected $useTimestamps = true;
    protected $createdField  = 'created_on';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // Auto-hash password before saving
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)
                   ->first();
    }

    public function getAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }
    
    public function insert_user($data) {
        $this->db->insert('users', $data);
    }
}