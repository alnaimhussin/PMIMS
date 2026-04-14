<?php namespace App\Models;

use CodeIgniter\Model;

class Inbound_model extends Model
{

    protected $table = 'inbound';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'timestamp','lastname','firstname','middlename','age','birthday','gender','mobile','category',
        'medicalcert_image', 'travelauth_image', 'residency_image', 'owwa_image', 'companyid_image', 'employmentcert_image', 'travelorder_image', 
        'province','citymun','address1','lgu','barangay','address2','contactname','contactrelation','contactnumber',
        'transportation','airline','sea_vessel','plate_no','ref_air','ref_sea','vehicle_color_made','departure','departure_time'];

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
        $builder = $db->table('inbound');
        $builder->select('*,inbound.id as _id');
        $builder->join('refprovince', 'inbound.province = refprovince.provCode');
        $builder->join('reflgu', 'inbound.lgu = reflgu.lguCode');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }

    public function getDetail($id = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->select('*');
        $builder->where('id', $id);
        return $builder->get();
    }

    public function getValidated() 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->select('*,inbound.id as _id');
        $builder->join('refprovince', 'inbound.province = refprovince.provCode');
        $builder->join('reflgu', 'inbound.lgu = reflgu.lguCode');
        $builder->where('inbound.isValidated', 'validated');
        return $builder->get();
    }

    public function getCityMunTotal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->distinct();
        $builder->select('citymun, COUNT(citymun) as citymunCount');
        $builder->groupby('citymun');
        $builder->where('status', '');
        $builder->orderBy('citymun', 'ASC');
        return $builder->get();
    }

    public function getLGUTotal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->distinct();
        $builder->select('reflgu.lguName, COUNT(lgu) as lguCount');
        $builder->join('reflgu', 'inbound.lgu = reflgu.lguCode');
        $builder->groupby('lgu');
        $builder->where('status', '');
        $builder->orderBy('lgu', 'ASC');
        return $builder->get();
    }

    public function countArrival()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->select('COUNT(id) as countArrival');
        $builder->where('status', '%arrived%');
        return $builder->countAllResults();
    }

    public function countInbound()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');   
        $builder->select('id');     
        return $builder->countAll();
    }

}