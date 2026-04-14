<?php

namespace App\Models;

use CodeIgniter\Model;

class Barangay_model extends Model
{

    protected $table      = 'refbrgy';
    protected $primaryKey = 'id';
    protected $allowedFields = ['lguCode', 'brgyName', 'brgyCode'];

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
    
    public function getBarangay($lguCode) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('refbrgy');
        $builder->select('brgyName');
        $builder->where('lguCode', $lguCode);
        $builder->orderBy('brgyName', 'ASC');
        $data = $builder->get();
        return $data;
    }
}
