<?php

namespace App\Controllers;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $userModel = new UserModel();
        $data['totalUsers'] = $userModel->countAllResults();

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // ambil semua user

        return view('admin/users', $data);
    }

    public function editUser($id)
{
    $userModel = new UserModel();
    $data['user'] = $userModel->find($id);

    if (!$data['user']) {
        return redirect()->to('admin/users')->with('error', 'User tidak ditemukan.');
    }

    return view('admin/edit_user', $data);
}

public function updateUser($id)
{
    $userModel = new UserModel();
    $post = $this->request->getPost();

    $updateData = [
        'nama' => $post['nama'],
        'email' => $post['email'],
        'role' => $post['role'],
        'updated_at' => date('Y-m-d H:i:s')
    ];

    // Update password jika diisi
    if (!empty($post['password'])) {
        $updateData['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
    }

    $userModel->update($id, $updateData);

    return redirect()->to('admin/users')->with('success', 'User berhasil diupdate.');
}

public function deleteUser($id)
{
    $userModel = new UserModel();
    $userModel->delete($id);

    return redirect()->to('admin/users')->with('success', 'User berhasil dihapus.');
}

}
