<?php namespace App\Models;

use CodeIgniter\Model;

class Master_acct_year_model extends Model
{
    
    protected $table = 'pgb_account_year';
    protected $primaryKey = 'id';
	protected $allowedFields = ['acct_year'];

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
        $builder = $db->table('pgb_account_year');
        $builder->select('id,acct_year');
        $builder->orderBy('acct_year','ASC');
        return $builder->get();
    }
}