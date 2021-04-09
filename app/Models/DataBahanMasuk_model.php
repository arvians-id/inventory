<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBahanMasuk_model extends Model
{
    protected $table = 'data_bahan_masuk';
    protected $allowedFields = ['id_bhn', 'id_supp', 'jml_masuk', 'tgl_masuk'];
    protected $useTimestamps = true;
    protected $primaryKey = 'id_bhn_msk';

    protected $table_supplier = 'data_supplier';
    protected $table_bahan = 'data_bahan';
    protected $table_satuan = 'data_satuan';

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function getBahanMasuk()
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_bahan_masuk, $this->table.updated_at as diubah_bahan_masuk");
        $builder->join($this->table_bahan, "$this->table_bahan.id_bhn =  $this->table.id_bhn");
        $builder->join($this->table_supplier, "$this->table_supplier.id_supp =  $this->table.id_supp");
        $builder->join($this->table_satuan, "$this->table_satuan.id_satuan =  $this->table_bahan.id_satuan");
        $builder->orderBy("$this->table.id_bhn_msk", 'DESC');

        return $builder->get()->getResultArray();
    }
    public function deleteBahanMasuk($id)
    {
        $this->db->transStart();

        $getJmlMasuk = $this->db->table($this->table)->where('id_bhn_msk', $id)->get()->getRowArray();
        $this->__updateDataStok($getJmlMasuk);

        $this->db->table($this->table)->where('id_bhn_msk', $id)->delete();

        $this->db->transComplete();
        return $this->db->transStatus();
    }
    public function getBahanMasukById($id)
    {
        return $this->db->table($this->table)->where('id_bhn_msk', $id)->get()->getRowArray();
    }
    private function __updateDataStok($getJmlMasuk)
    {
        $jmlMasuk = $getJmlMasuk['jml_masuk'];
        $idBahan = $getJmlMasuk['id_bhn'];

        $this->db->table($this->table_bahan)->set('total_stok', "total_stok-$jmlMasuk", FALSE)->where('id_bhn', $idBahan)->update();
    }
}
