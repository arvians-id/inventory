<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthPengguna_model extends Model
{
    protected $table = 'auth_pengguna';
    protected $allowedFields = ['username', 'password'];
    protected $useTimestamps = true;
    protected $primaryKey = 'id';

    public function getAdminBySession()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id', session()->get('id'));

        return $builder->get()->getRowArray();
    }
}
