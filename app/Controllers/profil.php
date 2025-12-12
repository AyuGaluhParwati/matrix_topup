<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        // Cek login
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }

        // Ambil ID dari session
        $userId = session()->get('user_id');

        // Load model user
        $userModel = new UserModel();

        // Ambil data user
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/logout');
        }

        // Kirim ke view
        $data = [
            'user_name'     => $user['username'] ?? '',
            'email'         => $user['email'] ?? '',
            'phone'         => $user['phone'] ?? '',
            'saldo'         => $user['saldo'] ?? 0,
            'member_since'  => $user['created_at'] ?? '',
        ];

        return view('profil', $data);
    }
}
