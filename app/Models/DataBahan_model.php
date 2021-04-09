<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBahan_model extends Model
{
    protected $table = 'data_bahan';
    protected $allowedFields = ['nama_bhn', 'id_satuan', 'total_stok'];
    protected $primaryKey = 'id_bhn';
    protected $useTimestamps = true;

    protected $table_satuan = 'data_satuan';
    protected $table_bahan_masuk = 'data_bahan_masuk';
    protected $table_bahan_keluar = 'data_bahan_keluar';

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function getBahan($type = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_bahan, $this->table.updated_at as diubah_bahan");
        $builder->join($this->table_satuan, "$this->table_satuan.id_satuan =  $this->table.id_satuan");
        if ($type != null) {
            $builder->having('total_stok >', 0);
        }
        return $builder->get()->getResultArray();
    }
    public function getBahanById($id)
    {
        return $this->db->table($this->table)->where('id_bhn', $id)->get()->getRowArray();
    }
}
