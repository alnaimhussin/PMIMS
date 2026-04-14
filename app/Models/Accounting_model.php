<?php namespace App\Models;

use CodeIgniter\Model;

class Accounting_model extends Model
{
    protected $table = 'chart_account'; // The name of the database table
    protected $primaryKey = 'id';  // The primary key of the table

    // The fields that are allowed to be filled using mass assignment
	protected $allowedFields = [
        'account_code',
        'parent_code',
        'account_type',
        'account_title',
        'account_desc',
        'date_created'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'date_created';
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
        $builder = $db->table('chart_account');
        $builder->select('*');
        $builder->orderBy('account_code', 'ASC');
        return $builder->get();
    }

    public function getAccountTitle()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('chart_account');
        $builder->select('account_code, account_title');
        $builder->orderBy('account_title', 'ASC');
        return $builder->get();
    }

    public function getAccountType()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('chart_account_type');
        $builder->select('account_type');
        $builder->orderBy('account_type', 'ASC');
        return $builder->get();
    }
    
    public function checkDuplicateAccountCode($account_code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('chart_account');
        $builder->select('account_code');
        $builder->where('account_code', $account_code);
        return $builder->countAllResults();
    }

}