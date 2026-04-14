<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_details_model extends Model
{
    protected $table = 'employee_details';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','sg_code','dept_code','pos_code','status',];

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