<?php namespace App\Models;

use CodeIgniter\Model;

class Master_position_model extends Model
{
    protected $table = 'position';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id','position','sub_position','description','pos_code'];

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
        $builder = $db->table('position');
        $builder->select('*');
        $builder->orderBy('position','ASC');
        $builder->orderBy('sub_position','ASC');
        return $builder->get();
    }

    public function viewPosition($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('position');
        $builder->select('*');
        $builder->where('id', $id);
        $data = $builder->get();
        return $data;
    }

}