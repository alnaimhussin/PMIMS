<?php namespace App\Models;

use CodeIgniter\Model;

class Room_model extends Model
{
    
    protected $table = 'master_room';
    protected $primaryKey = 'id';
	protected $allowedFields = [
        'room','roomtype','description','price','pax','remarks'];

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
        $builder = $db->table('master_room');
        $builder->select('room');
        $builder->orderBy('room', 'ASC');
        return $builder->get();
    }

    public function getRoomDetails($room)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_room');
        $builder->select('*');
        $builder->where('room', $room);
        $builder->orderBy('room', 'ASC');
        $data = $builder->get();
        return $data;
    }

    public function getTotal()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('master_room');  
        $builder->select('id');     
        return $builder->countAll();
    }

}