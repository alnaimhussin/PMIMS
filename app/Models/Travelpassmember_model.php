<?php namespace App\Models;

use CodeIgniter\Model;

class Travelpassmember_model extends Model
{

    protected $table = 'travelpassmember';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'pass_id','lastname','firstname','middlename','age','birthday','gender','mobile'];

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

    public function getDetail($pass_id = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('travelpassmember');
        $builder->select('*');
        $builder->where('pass_id', $pass_id);
        return $builder->get();
    }


}