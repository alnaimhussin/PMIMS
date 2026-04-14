<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_contacts_model extends Model
{
    protected $table = 'pgb_employee_contacts';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','e_lastname','e_firstname','e_middlename','e_relation','e_extname','e_contact','r_lot','r_street','r_village','r_barangay','r_citymunicipal','r_province','p_lot','p_street','p_village','p_barangay','p_citymunicipal','p_province'];

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