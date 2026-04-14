<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeID_model extends Model
{
    protected $table = 'emp_id';
    protected $primaryKey = 'id';
	protected $allowedFields = ['pgbid','unique_id','file_picture','file_signature','file_qrcode'];

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
        $builder = $db->table('emp_id');
        $builder->select('*');
        $builder->join('employee', 'emp_id.pgbid = employee.pgbid');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }
    
    public function getCount()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('emp_id');
        $builder->select('id');
        return $builder->countAll();
    }    

    public function searchAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('emp_id');
        $builder->select('*');
        $builder->join('employee', 'emp_id.pgbid = employee.pgbid');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }

    public function searchByDept($dept_code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('emp_id');
        $builder->select('*');
        $builder->join('employee', 'emp_id.pgbid = employee.pgbid');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->where('employee_details.dept_code', $dept_code);
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }

}