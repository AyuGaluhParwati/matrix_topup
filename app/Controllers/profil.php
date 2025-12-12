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
        $userModel =new UserModel();

        // ambil id user login
        $userId = session()->get('id');

        // kirim sebagai $user agar sama dengan view
        $data['user'] = $userModel->find($userId);

        return view('profil', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('id');

        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'no_hp'    => $this->request->getPost('no_hp'),
            'favorit'  => $this->request->getPost('favorit'),
        ];

        // Jika password diisi → update dengan hash
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $userModel->update($userId, $data);

        return redirect()->to('/profil?status=success');

    }
}
