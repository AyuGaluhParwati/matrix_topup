<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama',
        'email',
        'subjek',
        'pesan',
        'status',
        'balasan',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = false;
}
