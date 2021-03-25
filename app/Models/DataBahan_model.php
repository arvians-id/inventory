<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBahan_model extends Model
{
    protected $table = 'data_bahan';
    protected $allowedFields = ['nama_bhn', 'id_satuan'];
    protected $primaryKey = 'id_bhn';
    protected $useTimestamps = true;

    protected $table_satuan = 'data_satuan';

    public function getBahan()
    {
        $builder = $this->db->table($this->table);
        $builder->select("*, $this->table.created_at as dibuat_bahan, $this->table.updated_at as diubah_bahan, $this->table_satuan.created_at as dibuat_satuan");
        $builder->join($this->table_satuan, "$this->table_satuan.id_satuan =  $this->table.id_satuan");

        return $builder->get()->getResultArray();
    }
}
