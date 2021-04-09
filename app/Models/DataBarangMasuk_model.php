<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBarangMasuk_model extends Model
{
    protected $table = 'data_barang_masuk';
    protected $allowedFields = ['id_brg', 'jml_masuk', 'tgl_masuk'];
    protected $useTimestamps = true;
    protected $primaryKey = 'id_brg_msk';

    protected $table_barang = 'data_barang';

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function getBarangKeluar()
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_barang, $this->table.updated_at as diubah_barang");
        $builder->join($this->table_barang, "$this->table_barang.id_brg =  $this->table.id_brg");
        $builder->orderBy("$this->table.id_brg_msk", 'DESC');

        return $builder->get()->getResultArray();
    }
}
