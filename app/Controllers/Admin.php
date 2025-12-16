<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PesanModel;
use App\Models\ProdukModel;

class Admin extends BaseController
{
    /* ===============================
       DASHBOARD
       =============================== */
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
            'total_produk' => $produkModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }

    /* ===============================
       LIST USERS
       =============================== */
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

    /* ===============================
       EDIT USER
       =============================== */
    public function editUser($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            return redirect()->to('admin/users')->with('error', 'User tidak ditemukan.');
        }

        return view('admin/edit_user', $data);
    }

    /* ===============================
       UPDATE USER
       =============================== */
    public function updateUser($id)
    {
        $userModel = new UserModel();
        $post = $this->request->getPost();

        // Cek username duplikat (selain user ini)
        $cekUsername = $userModel
            ->where('username', $post['username'])
            ->where('id !=', $id)
            ->countAllResults();

        if ($cekUsername > 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username sudah digunakan!');
        }

        // Data update
        $updateData = [
            'nama'       => $post['nama'],
            'username'   => $post['username'],
            'email'      => $post['email'],
            'no_hp'      => $post['no_hp'],
            'role'       => $post['role'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update password jika diisi
        if (!empty($post['password'])) {
            $updateData['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
        }

        $userModel->update($id, $updateData);

        return redirect()->to('admin/users')
            ->with('success', 'User berhasil diupdate.');
    }

    /* ===============================
       DELETE USER
       =============================== */
    public function deleteUser($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('admin/users')
            ->with('success', 'User berhasil dihapus.');
    }

    /* ===============================
       PESAN
       =============================== */
    public function pesan()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $pesanModel = new PesanModel();
        $data['pesan'] = $pesanModel->orderBy('id', 'DESC')->findAll();

        return view('admin/pesan', $data);
    }
}
