<?php

namespace App\Models;

use CodeIgniter\Model;

class Citymun_model extends Model
{

    protected $table      = 'refcitymun';
    protected $primaryKey = 'id';
    protected $allowedFields = ['psgcCode', 'citymunDesc', 'regDesc', 'provCode', 'citymunCode'];

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

    public function getCityMun($provCode) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('refcitymun');
        $builder->select('citymunDesc, provCode');
        $builder->where('provCode', $provCode);
        $builder->orderBy('citymunDesc', 'ASC');
        $data = $builder->get();
        return $data;
    }
}
