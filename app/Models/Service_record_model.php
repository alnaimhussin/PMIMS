<?php namespace App\Models;

use CodeIgniter\Model;

class Service_record_model extends Model
{
    protected $table = 'service_record';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','startDate','endDate','position_title','sg_step','monthly_salary','appointment_status','department_agency','remarks'];

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

    public function searchServiceRecord($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('service_record');
        $builder->select('*');
        $builder->like('id_', $id, 'both');
        $builder->orderBy('id', 'ASC');
        $data = $builder->get();
        return $data;
    }
    
}