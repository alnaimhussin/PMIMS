<?php namespace App\Models;

use CodeIgniter\Model;

class Client_model extends Model
{

    protected $table = 'travelpass';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'timestamp','category','lgu','barangay','address1','province','citymun','address2','withvehicle','plate_no','vehicle_color_made','departure'];

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

}