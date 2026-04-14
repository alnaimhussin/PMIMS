<?php namespace App\Models;

use CodeIgniter\Model;

class Master_department_model extends Model
{
    
    protected $table = 'pgb_department';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','department','description','dept_code','head'];

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
        $builder = $db->table('pgb_department');
        $builder->select('id_,department,description,dept_code,head');
        $builder->orderBy('department','ASC');
        return $builder->get();
    }

    public function getDept($id_)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pgb_department');
        $builder->select('id_,department,description,dept_code,head');
        $builder->where('id_', $id_);
        $data = $builder->get();
        return $data;
    }


    public function getCountCasual()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pgb_department');
        $builder->select('department, count(pgb_employee_details.dept_code) as casual, head');
        $builder->join('pgb_employee_details', 'pgb_department.id_ = pgb_employee_details.dept_code');
        $builder->where('pgb_employee_details.status', 'C');
        $builder->groupBy('pgb_department.dept_code');
        $builder->orderBy('pgb_department.department','ASC');
        return $builder->get();
    }

    public function getCountJobOrder()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pgb_department');
        $builder->select('department, count(pgb_employee_details.dept_code) as joborder, head');
        $builder->join('pgb_employee_details', 'pgb_department.id_ = pgb_employee_details.dept_code');
        $builder->where('pgb_employee_details.status', 'J');
        $builder->groupBy('pgb_department.dept_code');
        $builder->orderBy('pgb_department.department','ASC');
        return $builder->get();
    }

}