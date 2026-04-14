<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_model extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
	protected $allowedFields = ['lastname','firstname','middlename','initial','nickname','birthdate','birthplace','gender','civilstatus',
    'prof_code','exname','bloodtype','height','weight','bloodtype','email','contact','pgbid'];

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
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }

    public function getPGBID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->like('pgbid', 'PGB', 'both');
        $builder->orderBy('pgbid', 'ASC');
        return $builder->get();
    }
    
    
    public function getLastID()
    {
        alert("here");
        // $db = \Config\Database::connect();
        // $sql = "SELECT Max(Cast(Substring('pgbid',5,length('pgbid')-4))) as MAX_INT FROM employee WHERE pgbid LIKE 'PGB%'"; 
        
        // $builder = $db->query($sql);
        // return $builder->get();
    }
    
    public function getCount()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('id');
        return $builder->countAll();
    }    
    
    public function getIDNO($pgbid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('pgbid');
        $builder->like('pgbid', $pgbid, 'both');
        return $builder->countAllResults();
    }    
    
    public function getCountDuplicateID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('pgbid');
        $builder->like('pgbid', '-D', 'both');
        return $builder->countAllResults();
    }    

    public function getCountByDept()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee_details');
        $builder->select('dept_code, count(dept_code) as allcount');
        $builder->groupby('dept_code');
        $builder->orderBy('dept_code','ASC');
        return $builder->get();
    }    

    public function getCountPermanent()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee_details');
        $builder->select('dept_code, count(dept_code) as permanent');
        $builder->where('status', 'Permanent');
        $builder->groupby('dept_code');
        $builder->orderBy('dept_code','ASC');
        return $builder->get();
    }
    
    public function getCountCasual()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee_details');
        $builder->select('dept_code, count(dept_code) as casual');
        $builder->where('status', 'Casual');
        $builder->groupby('dept_code');
        $builder->orderBy('dept_code','ASC');
        return $builder->get();
    }
    
    public function getCountJobOrder()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee_details');
        $builder->select('dept_code, count(dept_code) as joborder');
        $builder->where('status', 'JO');
        $builder->groupby('dept_code');
        $builder->orderBy('dept_code','ASC');
        return $builder->get();
    }
    
    public function getCountDeptID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('employee_details.dept_code, count(dept_code) as countid');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('emp_id', 'employee.pgbid = emp_id.pgbid');
        $builder->groupby('dept_code');
        $builder->orderBy('dept_code','ASC');
        return $builder->get();
    }
    
    public function getMale()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('id');
        $builder->where('gender', 'Male');
        return $builder->countAllResults();
    }
    
    public function getFemale()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('id');
        $builder->where('gender', 'Female');
        return $builder->countAllResults();
    }

    public function searchEmployee($pgbid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->like('pgbid', $pgbid, 'both');
        $builder->orderBy('lastname', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function searchEmployeeName($lastname,$firstname)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->like('lastname', $lastname, 'both');
        $builder->like('firstname', $firstname, 'both');
        $builder->orderBy('lastname', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function searchByDeptPos($dept_code, $pos_code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.dept_code');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->like('employee_details.dept_code', $dept_code, 'both');
        $builder->where('employee_details.pos_code', $pos_code);
        $builder->orderBy('lastname', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function searchByDept($dept_code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id, department.id_ as dept_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->where('employee_details.dept_code', $dept_code);
        $builder->orderBy('lastname', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function searchByPos($pos_code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id, department.id_ as dept_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->where('employee_details.pos_code', $pos_code);
        $builder->orderBy('lastname', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function searchAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id, department.id_ as dept_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->orderBy('lastname', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function viewDetailEducation($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('employee_education', 'employee.id = employee_education.id_');
        $builder->where('employee.id', $id);
        $data = $builder->get();
        return $data;
    }

    public function viewDetailEligibility($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('employee_eligibility', 'employee.id = employee_eligibility.id_');
        $builder->where('employee.id', $id);
        $data = $builder->get();
        return $data;
    }

    public function viewLeaveCredit($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id');   
        $builder->join('leave_credit', 'employee.id = leave_credit.id_');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->where('employee.id', $id);
        $data = $builder->get();
        return $data;
    }

    // function viewDetail($id) used for employee profile page, getDetail used for employee list page
    public function viewDetail($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*, employee.id as _id, position.id as pos_id, department.id_ as dept_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('employee_contacts', 'employee.id = employee_contacts.id_');
        $builder->join('employee_membership', 'employee.id = employee_membership.id_');
        $builder->join('profession', 'employee.prof_code = profession.prof_code');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->join('master_province', 'employee_contacts.r_province = master_province.provCode');
        $builder->join('master_citymunicipal', 'employee_contacts.r_citymunicipal = master_citymunicipal.citymunCode');
        $builder->where('employee.id', $id);
        
        $query = $builder->get();
        return $query->getResult(); // Just return the array (empty or full)
    }
    
    public function getDetail($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*,employee.id as _id, position.id as pos_id, department.id_ as dept_id');
        $builder->join('employee_details', 'employee.id = employee_details.id_');
        $builder->join('employee_contacts', 'employee.id = employee_contacts.id_');
        $builder->join('employee_membership', 'employee.id = employee_membership.id_');
        $builder->join('department', 'employee_details.dept_code = department.id_');
        $builder->join('position', 'employee_details.pos_code = position.id');
        $builder->join('profession', 'employee.prof_code = profession.prof_code');
        $builder->join('master_province', 'employee_contacts.r_province = master_province.provCode');
        $builder->join('master_citymunicipal', 'employee_contacts.r_citymunicipal = master_citymunicipal.citymunCode');
        $builder->where('employee.id', $id);
        $data = $builder->get();
        return $data;
    }
    
    public function checkDuplicateID($pgbid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('*');
        $builder->where('pgbid', $pgbid, 'both');
        return $builder->countAllResults();
    }
    
    public function checkDuplicateName($lastname,$firstname,$middlename)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
        $builder->select('pgbid');
        $builder->where('lastname', $lastname, 'both');
        $builder->where('firstname', $firstname, 'both');
        $builder->where('middlename', $middlename, 'both');
        return $builder->countAllResults();
    }

}