<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_membership_model extends Model
{
    protected $table = 'pgb_employee_membership';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','gsis','pagibig','philhealth','sss','tin',];

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
    
}