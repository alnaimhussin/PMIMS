<?php namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
    
    protected $table = 'users';
    protected $primaryKey = 'id';
	protected $allowedFields = ['firstname','lastname','access_type','username','password','created_date','modified_date','status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

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

    public function getDetail($pass_id = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('user_id', $pass_id);
        return $builder->get();
    }

}