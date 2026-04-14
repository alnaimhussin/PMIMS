<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_leave_credit_details_model extends Model
{
    protected $table = 'leave_credit_details';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','leave_type','leave_sub_type','start_date','end_date','number_days',
                                'commutation','reason','contact_details','supporting_docs','other_docs','status','created_on','created_by'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_on';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function __construct()
    {
        parent::__construct();
    }

}