<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login'); // tampilkan halaman login
    }

    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $email = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id'   => $user['id'],
                'user_name' => $user['nama'],
                'role'      => $user['role'],
                'isLoggedIn'=> true
            ]);

            return ($user['role'] === 'admin')
                ? redirect()->to('/admin/dashboard')
                : redirect()->to('/home');
        } else {
            $session->setFlashdata('error', 'Email atau password salah.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register ()
    {
        return view('auth/register');
    }
    // Menyimpan user baru
    public function saveUser()
    {
        $userModel = new UserModel();

        $post = $this->request->getPost();

        // Validasi sederhana
        if(empty($post['nama']) || empty($post['email']) || empty($post['password'])) {
            return redirect()->back()->with('error', 'Semua field harus diisi.');
        }

        // Cek email sudah terdaftar atau belum
        if($userModel->where('email', $post['email'])->first()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.');
        }

        // Simpan user
        $userModel->insert([
            'nama' => $post['nama'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT), // hash password
            'role' => 'user',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
