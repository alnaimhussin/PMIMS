<?php namespace App\Models;

use CodeIgniter\Model;

class BankAccount_model extends Model
{
    protected $table = 'bank_accounts'; // The name of the database table
    protected $primaryKey = 'id'; // The primary key of the table

    // The fields that are allowed to be filled using mass assignment
    protected $allowedFields = [
        'bank_name',             // The name of the bank
        'bank_branch',           // The branch of the bank
        'bank_code',             // The bank code (SWIFT/BIC)
        'account_name',          // The name of the account
        'account_number',        // The account number
        'account_type',          // The type of account (Current, Savings, etc.)
        'account_opening_date',  // Date when the account was opened
        'account_status',        // Status of the account (Active, Dormant, etc.)
        'bic_swift_code',        // BIC/SWIFT code for the bank
        'routing_number',        // Routing number for the bank
        'bank_tin',              // Bank's Tax Identification Number (TIN)
        'special_instructions',  // Any special instructions related to the bank account
        'remarks',               // Additional remarks or comments
        'date_created'           // The date when the account was created
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
        $builder = $db->table('bank_accounts');
        $builder->select('*');
        $builder->orderBy('bank_name', 'ASC');
        return $builder->get();
    }

    public function getBankAccount()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bank_accounts');
        $builder->select('bank_code, bank_name');
        $builder->orderBy('bank_name', 'ASC');
        return $builder->get();
    }
    
    public function checkDuplicateBankCode($bank_code)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bank_accounts');
        $builder->select('bank_code');
        $builder->where('bank_code', $bank_code);
        return $builder->countAllResults();
    }

}