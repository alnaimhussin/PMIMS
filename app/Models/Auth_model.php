<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Auth_model extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['firstname','lastname','access_type','access_sub','username','password','created_date','modified_date','status'];
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }
}