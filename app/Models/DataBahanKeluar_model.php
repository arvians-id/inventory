<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class DataBahanKeluar_model extends Model
{
    protected $table = 'data_bahan_keluar';
    protected $allowedFields = ['id_brg_msk', 'id_bhn', 'jml_keluar', 'tgl_keluar'];
    protected $useTimestamps = true;
    protected $primaryKey = 'id_bhn_klr';

    protected $table_bahan = 'data_bahan';
    protected $table_barang = 'data_barang';
    protected $table_barang_masuk = 'data_barang_masuk';

    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function insertBahanKeluarBarangMasuk($data, $id_bhn, $jml_keluar, $tanggal_keluar, $totalStokBahan)
    {
        $this->db->transStart();

        // Insert Barang Masuk
        $builder = $this->db->table($this->table_barang_masuk);
        $builder->insert($data);
        $insertId = $this->db->insertID();

        for ($i = 0; $i < count($id_bhn); $i++) {
            $dataBahanKeluar[] = [
                'id_brg_msk' => $insertId,
                'id_bhn' => $id_bhn[$i],
                'jml_keluar' => $jml_keluar[$i],
                'tgl_keluar' => $tanggal_keluar,
                'created_at' => Time::now('Asia/Jakarta'),
                'updated_at' => Time::now('Asia/Jakarta')
            ];

            $dataBahan = [
                // 'id_bhn' => $id_bhn[$i],
                'total_stok' => $totalStokBahan[$i]
            ];
            // Update Data Bahan
            $this->db->table($this->table_bahan)->set($dataBahan)->where('id_bhn', $id_bhn[$i])->update();
        }
        // Insert Bahan Keluar
        $this->db->table($this->table)->insertBatch($dataBahanKeluar);

        $this->db->transComplete();
        return $this->db->transStatus();
    }
    public function getBahanKeluar($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_bahan, $this->table.updated_at as diubah_bahan");
        $builder->join($this->table_barang_masuk, "$this->table_barang_masuk.id_brg_msk =  $this->table.id_brg_msk");
        $builder->join($this->table_bahan, "$this->table_bahan.id_bhn =  $this->table.id_bhn");
        if ($id != null) {
            $builder->where("$this->table.id_brg_msk", $id);
        }
        $builder->orderBy("$this->table.id_bhn_klr", 'DESC');

        return $builder->get()->getResultArray();
    }
}
