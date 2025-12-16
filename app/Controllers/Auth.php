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

    // ================= FORGOT PASSWORD =================
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function sendResetLink()
    {
        $model = new UserModel();
        $emailInput = $this->request->getPost('email');

        $user = $model->where('email', $emailInput)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar.');
        }

        $token = bin2hex(random_bytes(32));

        $model->update($user['id'], [
            'reset_token'   => $token,
            'reset_expired' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ]);

        $resetLink = base_url("reset-password/$token");

        $email = \Config\Services::email();
        $email->setTo($emailInput);
        $email->setSubject('Reset Password MTRIX');
        $email->setMessage("
            <h3>Reset Password</h3>
            <p>Klik link berikut:</p>
            <a href='{$resetLink}'>{$resetLink}</a>
            <p>Link berlaku 1 jam.</p>
        ");

       if (!$email->send()) {
    return redirect()->back()
        ->with('error', $email->printDebugger(['headers']));
}


        return redirect()->back()->with('success', 'Link reset password telah dikirim ke email.');
    }

    // ================= RESET PASSWORD =================
    public function resetPassword($token)
    {
        return view('auth/reset_password', ['token' => $token]);
    }

    public function updatePassword()
    {
        $model = new UserModel();
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm_password');

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok.');
        }

        $user = $model
            ->where('reset_token', $token)
            ->where('reset_expired >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            return redirect()->to('/login')
                ->with('error', 'Token tidak valid atau kadaluarsa.');
        }

        $model->update($user['id'], [
            'password'      => password_hash($password, PASSWORD_BCRYPT),
            'reset_token'   => null,
            'reset_expired' => null
        ]);

        return redirect()->to('/login')
            ->with('success', 'Password berhasil direset.');
    }
}
