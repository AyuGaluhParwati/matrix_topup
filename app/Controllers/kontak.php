<?php

namespace App\Controllers;

class Kontak extends BaseController
{
    public function index()
    {
        return view('kontak');
    }

    public function send()
    {
        $model = new PesanModel();

        $model->save([
            'nama'   => $this->request->getPost('nama'),
            'email'  => $this->request->getPost('email'),
            'subjek' => $this->request->getPost('subjek'),
            'pesan'  => $this->request->getPost('pesan'),
        ]);

        return redirect()->to('/kontak')->with('success', 'Pesan berhasil dikirim!');
    }
}
