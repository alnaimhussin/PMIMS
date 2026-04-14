<?php

namespace App\Models;

use CodeIgniter\Model;

class Province_model extends Model
{

    protected $table      = 'refprovince';
    protected $primaryKey = 'id';
    protected $allowedFields = ['psgcCode', 'provDesc', 'regCode', 'provCode'];

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

    public function getProvinceSort() {
        $db = \Config\Database::connect();
        $builder = $db->table('refprovince');
        $builder->distinct();
        $builder->select('provCode, provDesc');
        $builder->orderBy('provDesc', 'ASC');
        return $builder->get();
    }
}
