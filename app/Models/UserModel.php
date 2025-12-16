<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama',
        'email',
        'username',
        'no_hp',
        'favorit',
        'password',
        'coin',
        'avatar',

        // 🔐 reset password
        'reset_token',
        'reset_expired',

        // timestamp
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}
