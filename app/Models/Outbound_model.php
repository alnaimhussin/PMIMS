<?php namespace App\Models;

use CodeIgniter\Model;

class Outbound_model extends Model
{

    protected $table = 'outbound';
    protected $primaryKey = 'id';
	protected $allowedFields = ['timedate','lastname','firstname','middlename','age','birthday','gender','mobile','infantname','infantage','infantbirthday','category','ofw','workercompany','workeraddress','
    reasons','province','citymun','address1','lgu','barangay','address2','contactname','contactrelation','contactnumber','referencenumber','airline','departure'];

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
        $builder = $db->table('outbound');
        $builder->select('*,outbound.id as _id');
        $builder->join('refprovince', 'outbound.province = refprovince.provCode');
        $builder->join('reflgu', 'outbound.lgu = reflgu.lguCode');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }

    public function getDetail($id = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('outbound');
        $builder->select('*');
        $builder->where('id', $id);
        return $builder->get();
    }

    public function getCityMunTotal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('outbound');
        $builder->distinct();
        $builder->select('citymun, COUNT(citymun) as citymunCount');
        $builder->groupby('citymun');
        $builder->where('status', '');
        $builder->orderBy('citymun', 'ASC');
        return $builder->get();
    }

    public function countOutbound()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('outbound');   
        $builder->select('id');     
        return $builder->countAll();
    }

}