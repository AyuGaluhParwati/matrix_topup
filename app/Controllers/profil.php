<?php

namespace App\Controllers;

class profil extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }

        return view('profil');
    }
}
