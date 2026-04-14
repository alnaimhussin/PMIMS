<?php

namespace App\Models;

use CodeIgniter\Model;

class Lgu_model extends Model
{

    protected $table      = 'reflgu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['lguName', 'lguCode', 'zip'];

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
    
    public function getLguSort() {
        $db = \Config\Database::connect();
        $builder = $db->table('reflgu');
        $builder->distinct();
        $builder->select('lguName, lguCode');
        $builder->orderBy('lguName', 'ASC');
        return $builder->get();
    }
}
