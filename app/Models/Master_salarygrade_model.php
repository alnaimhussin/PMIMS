<?php namespace App\Models;

use CodeIgniter\Model;

class Master_salarygrade_model extends Model
{
    
    protected $table = 'pgb_salarygrade';
    protected $primaryKey = 'id';
	protected $allowedFields = ['sg','description','sg_code'];

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
        $builder = $db->table('pgb_salarygrade');
        $builder->select('sg,description,sg_code');
        $builder->orderBy('id','ASC');
        return $builder->get();
    }

}