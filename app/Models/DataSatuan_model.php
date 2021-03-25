<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSatuan_model extends Model
{
    protected $table = 'data_satuan';
    protected $allowedFields = ['satuan', 'created_at'];
    protected $primaryKey = 'id_satuan';
}
