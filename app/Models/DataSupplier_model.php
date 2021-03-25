<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSupplier_model extends Model
{
    protected $table = 'data_supplier';
    protected $allowedFields = ['nama', 'email', 'no_hp', 'alamat'];
    protected $primaryKey = 'id_supp';
    protected $useTimestamps = true;
}
