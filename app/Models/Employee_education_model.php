<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_education_model extends Model
{
    protected $table = 'pgb_employee_education';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','category','name_school','degree','level_earned','year_graduate'];

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