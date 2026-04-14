<?php namespace App\Models;

use CodeIgniter\Model;

class Travelpass_model extends Model
{
    
    protected $table = 'travelpass';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'timestamp','pass_id','category','purpose','lgu','barangay','address1','province','citymun','address2','withvehicle','plate_no','vehicle_color_made','departure','returndate'];

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
        $builder->orderBy('timestamp', 'ASC');
        return $builder->get();
    }

    public function getAllRelease()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('travelpass');
        $builder->select('*,travelpass.id as _id');
        $builder->join('refprovince', 'travelpass.province = refprovince.provCode');
        $builder->join('reflgu', 'travelpass.lgu = reflgu.lguCode');
        $builder->where('travelpass.statusReleased', "released");
        $builder->orderBy('timestamp', 'ASC');
        return $builder->get();
    }

    public function getDetail($pass_id = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('travelpass');
        $builder->select('*');
        $builder->where('pass_id', $pass_id);
        return $builder->get();
    }

}