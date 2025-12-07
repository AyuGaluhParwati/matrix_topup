<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        // id user login, contoh: 1
        $userId = session()->get('id');

        $data['user'] = $userModel->find($userId);

        return view('profile', $data);
    }

    public function update()
    {
        $userModel = new UserModel();

        $userId = session()->get('id');

        $userModel->update($userId, [
            'nama'    => $this->request->getPost('nama'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
