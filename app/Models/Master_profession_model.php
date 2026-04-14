<?php namespace App\Models;

use CodeIgniter\Model;

class Master_profession_model extends Model
{
    
    protected $table = 'pgb_profession';
    protected $primaryKey = 'id';
	protected $allowedFields = ['profession','description','prof_code'];

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
        $builder = $db->table('pgb_profession');
        $builder->select('profession,description,prof_code');
        $builder->orderBy('profession','ASC');
        return $builder->get();
    }

}