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
    protected $table_bahan_keluar = 'data_bahan_keluar';
    protected $table_bahan = 'data_bahan';
    protected $table_satuan = 'data_satuan';

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function getBarangMasuk()
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_barang, $this->table.updated_at as diubah_barang");
        $builder->join($this->table_barang, "$this->table_barang.id_brg =  $this->table.id_brg");
        $builder->join($this->table_satuan, "$this->table_satuan.id_satuan =  $this->table_barang.id_satuan");
        $builder->orderBy("$this->table.id_brg_msk", 'DESC');

        return $builder->get()->getResultArray();
    }
    public function deleteBarangMasuk($id)
    {
        $this->db->transStart();

        // Update Bahan Stok ++
        $bahanKeluar = $this->db->table($this->table_bahan_keluar)->where('id_brg_msk', $id)->get()->getResultArray();
        foreach ($bahanKeluar as $keluar) {
            $idBahan = $keluar['id_bhn'];
            $jmlKeluar = $keluar['jml_keluar'];

            $this->db->table($this->table_bahan)->set('total_stok', "total_stok+$jmlKeluar", FALSE)->where('id_bhn', $idBahan)->update();
        }
        // Update Barang Stok --
        $barangMasuk = $this->db->table($this->table)->where('id_brg_msk', $id)->get()->getRowArray();
        $jmlMasuk = $barangMasuk['jml_masuk'];
        $idBarang = $barangMasuk['id_brg'];
        $this->db->table($this->table_barang)->set('total_stok', "total_stok-$jmlMasuk", FALSE)->where('id_brg', $idBarang)->update();

        // Delete Barang Masuk
        $this->db->table($this->table)->where('id_brg_msk', $id)->delete();

        $this->db->transComplete();
        return $this->db->transStatus();
    }
    public function getBarangMasukById($id)
    {
        return $this->db->table($this->table)->where('id_brg_msk', $id)->get()->getRowArray();
    }
}
