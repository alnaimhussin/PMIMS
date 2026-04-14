<?php namespace App\Models;

use CodeIgniter\Model;

class Master_room_type_model extends Model
{
    
    protected $table = 'master_room_type';
    protected $primaryKey = 'id';
	protected $allowedFields = ['name','description'];

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
        $builder = $db->table('master_room_type');
        $builder->select('name,description');
        $builder->orderBy('id','ASC');
        return $builder->get();
    }

}