<?php namespace App\Models;

use CodeIgniter\Model;

class Employee_leave_credit_model extends Model
{
    protected $table = 'leave_credit';
    protected $primaryKey = 'id';
	protected $allowedFields = ['id_','vacation','sick','maternity','paternity','spl','solo'];

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