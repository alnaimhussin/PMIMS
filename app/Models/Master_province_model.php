<?php namespace App\Models;

use CodeIgniter\Model;

class Master_province_model extends Model
{
    
    protected $table = 'pgb_master_province';
    protected $primaryKey = 'id';
	protected $allowedFields = ['psgcCode','provDesc','regCode','provCode'];

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
        $builder = $db->table('pgb_master_province');
        $builder->select('*');
        $builder->orderBy('provDesc','ASC');
        return $builder->get();
    }

}