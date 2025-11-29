<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;

class pesan extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        $model = new PesanModel();
        $data['pesan'] = $model->orderBy('id', 'DESC')->findAll();

        return view('admin/pesan', $data);
    }

    public function detail($id)
    {
        $model = new PesanModel();
        $data['pesan'] = $model->find($id);

        // update status → dibaca
        $model->update($id, ['status' => 'dibaca']);

        return view('admin/pesan/detail', $data);
    }

    public function delete($id)
    {
        $model = new PesanModel();
        $model->delete($id);

        return redirect()->to('/admin/pesan')->with('success', 'Pesan berhasil dihapus.');
    }
}
