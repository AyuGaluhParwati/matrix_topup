<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // ================= LOGIN =================
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model   = new UserModel();

        $email    = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id'    => $user['id'],
                'user_name'  => $user['nama'],
                'role'       => $user['role'],
                'isLoggedIn' => true
            ]);

            return redirect()->to(
                $user['role'] === 'admin' ? '/admin/dashboard' : '/home'
            );
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // ================= REGISTER =================
    public function register()
    {
        return view('auth/register');
    }

    public function saveUser()
    {
        $model = new UserModel();
        $post  = $this->request->getPost();

        if (empty($post['nama']) || empty($post['email']) || empty($post['password'])) {
            return redirect()->back()->with('error', 'Semua field wajib diisi.');
        }

        if ($model->where('email', $post['email'])->first()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.');
        }

        $model->insert([
            'nama'     => $post['nama'],
            'email'    => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'role'     => 'user'
        ]);

        return redirect()->to('/login')
            ->with('success', 'Registrasi berhasil, silakan login.');
    }

    // ================= FORGOT PASSWORD (SIMPLE) =================
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function forgotPasswordProcess()
    {
        $model = new UserModel();

        $email    = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));
        $confirm  = trim($this->request->getPost('confirm_password'));

        if (empty($email) || empty($password) || empty($confirm)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi.');
        }

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok.');
        }

        $user = $model->where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar.');
        }

        $model->update($user['id'], [
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        return redirect()->to('/login')
            ->with('success', 'Password berhasil direset. Silakan login.');
    }
}
