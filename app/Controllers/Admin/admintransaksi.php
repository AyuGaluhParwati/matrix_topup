<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class AdminTransaksi extends BaseController
{
    public function transaksi()
    {
        $session = session();

        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel
                                ->orderBy('created_at', 'DESC')
                                ->findAll();

        return view('admin/transaksi', $data);
    }

    public function updateStatus($id, $status)
    {
        $session = session();

        if (!$session->get('isLoggedIn') || $session->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Anda harus login sebagai admin.');
        }

        $transaksiModel = new TransaksiModel();
        $transaksiModel->update($id, [
            'status' => $status
        ]);

        return redirect()->to('/admin/transaksi')
            ->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
