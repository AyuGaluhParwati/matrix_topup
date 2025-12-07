<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'role',
        'coin',         // tambah coin
        'phone',        // tambah phone
        'address',      // tambah address
        'avatar',       // jika nanti pakai foto profil
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}
