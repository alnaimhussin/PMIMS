<?php namespace App\Models;

use CodeIgniter\Model;

class Activitylog_model extends Model
{
    
    protected $table = 'activitylog';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'timestamp','access_type','access_sub','user_id','username','activity','message'];

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
        $session = \Config\Services::session();
        if ($session->get('access_type')==0) {
            $db = \Config\Database::connect();
            $builder = $db->table('activitylog');
            $builder->select('*');
            $builder->orderBy('timestamp', 'ASC');
        } else {
            if ($session->get('access_type')==1 && $session->get('access_sub')==0) {
                $db = \Config\Database::connect();
                $builder = $db->table('activitylog');
                $builder->select('*');
                $builder->where('access_type', 1);
                $builder->orderBy('timestamp', 'ASC');
            }
            if ($session->get('access_type')==2 && $session->get('access_sub')==0) {
                $db = \Config\Database::connect();
                $builder = $db->table('activitylog');
                $builder->select('*');
                $builder->where('access_type', 2);
                $builder->orderBy('timestamp', 'ASC');
            }
        }
        return $builder->get();
    }
}