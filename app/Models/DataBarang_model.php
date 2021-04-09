<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBarang_model extends Model
{
    protected $table = 'data_barang';
    protected $allowedFields = ['nama_brg', 'id_satuan', 'total_stok'];
    protected $primaryKey = 'id_brg';
    protected $useTimestamps = true;

    protected $table_satuan = 'data_satuan';
    protected $table_barang_masuk = 'data_barang_masuk';

    public function getBarang()
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_barang, $this->table.updated_at as diubah_barang, $this->table_satuan.created_at as dibuat_satuan");
        $builder->join($this->table_satuan, "$this->table_satuan.id_satuan =  $this->table.id_satuan");
        $builder->groupBy("$this->table.id_brg");

        return $builder->get()->getResultArray();
    }
}
