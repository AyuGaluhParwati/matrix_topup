<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PesanModel;
use App\Models\ProdukModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $userModel   = new UserModel();
        $produkModel = new ProdukModel();

        $data = [
            'totalUsers'   => $userModel->countAllResults(),
            'total_produk' => $produkModel->countAll(),   // <-- FIX DI SINI
        ];

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

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
            'nama'       => $post['nama'],
            'email'      => $post['email'],
            'role'       => $post['role'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

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

    // ===========================
    //      HALAMAN PESAN
    // ===========================
    public function pesan()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $model = new PesanModel();
        $data['pesan'] = $model->orderBy('id', 'DESC')->findAll();

        return view('admin/pesan', $data);
    }
}
