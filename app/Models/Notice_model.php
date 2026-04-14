<?php namespace App\Models;

use CodeIgniter\Model;

class Notice_model extends Model
{
    protected $table = 'notice';
    protected $primaryKey = 'id';
	protected $allowedFields = ['timestamp','year','month','number','name','origin','destination','isolation','departure'];

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

    public function getLastNumber($year = null, $month = null) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('notice');
        $builder->selectMax('number');
        $builder->where('year', $year);
        $builder->where('month', $month);
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

}