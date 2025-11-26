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
        $contact = new ContactModel();

        $contact->save([
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'pesan' => $this->request->getPost('pesan'),
        ]);

        return redirect()->to('/kontak')->with('success', 'Pesan berhasil dikirim!');
    }

    // Halaman admin
    public function admin()
    {
        $contact = new ContactModel();
        $data['kontak'] = $contact->orderBy('id', 'DESC')->findAll();

        return view('admin/kontak_list', $data);
    }
}
