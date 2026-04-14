<?php namespace App\Models;

use CodeIgniter\Model;

class Travelpass_model extends Model
{

    protected $table = 'travelpass';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'timestamp','lastname','firstname','middlename','age','birthday','gender','mobile','category',
        'frontlinerid_image','governmentid','businesspermit_image','referral_image','medicalcert_image','chestxray_image','travelorder_image','vehiclepapers_image',
        'lgu','barangay','address1','province','citymun','address2','contactname','contactrelation','contactnumber',
        'withvehicle','plate_no','vehicle_color_made','departure','departure_time'];

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
        $builder = $db->table('travelpass');
        $builder->select('*,travelpass.id as _id');
        $builder->join('refprovince', 'travelpass.province = refprovince.provCode');
        $builder->join('reflgu', 'travelpass.lgu = reflgu.lguCode');
        $builder->orderBy('lastname', 'ASC');
        return $builder->get();
    }

    public function getDetail($id = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('travelpass');
        $builder->select('*');
        $builder->where('id', $id);
        return $builder->get();
    }

    public function getCityMunTotal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->distinct();
        $builder->select('citymun, COUNT(citymun) as citymunCount');
        $builder->groupby('citymun');
        $builder->where('arrstatus', '');
        $builder->orderBy('citymun', 'ASC');
        return $builder->get();
    }

    public function countArrival()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inbound');
        $builder->select('COUNT(id) as countArrival');
        $builder->where('arrstatus', '%arrived%');
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