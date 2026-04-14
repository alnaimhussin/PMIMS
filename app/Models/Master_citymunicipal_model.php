<?php namespace App\Models;

use CodeIgniter\Model;

class Master_citymunicipal_model extends Model
{
    
    protected $table = 'pgb_master_citymunicipal';
    protected $primaryKey = 'id';
	protected $allowedFields = ['psgcCode','citymunDesc','regCode','provCode','citymunCode'];

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
        $builder = $db->table('pgb_master_citymunicipal');
        $builder->select('*');
        $builder->orderBy('citymunDesc','ASC');
        return $builder->get();
    }

}