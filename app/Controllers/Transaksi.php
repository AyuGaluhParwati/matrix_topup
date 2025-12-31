<?php
namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function form($id)
    {
        $produkModel = new ProdukModel();
        $produk = $produkModel->find($id);

        if (!$produk) {
            return redirect()->back();
        }

        return view('transaksi/form', [
            'produk' => $produk
        ]);
    }

    public function proses()
    {
        $produkModel    = new ProdukModel();
        $transaksiModel = new TransaksiModel();

        $produkId = $this->request->getPost('produk_id');
        $produk   = $produkModel->find($produkId);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $tipeGame = $produk['tipe_game'];

        // ================= DATA DASAR =================
        $data = [
            'user_id'   => session()->get('user_id'),
            'produk_id'=> $produkId,
            'tipe_game'=> $tipeGame,
            'jumlah'   => $this->request->getPost('jumlah'),
            'nama'     => $this->request->getPost('nama'),
            'kontak'   => $this->request->getPost('kontak'),
            'promo'    => $this->request->getPost('kode_promo'),
            'status'   => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        // ================= ML =================
        if ($tipeGame === 'ml') {
            $userGame = $this->request->getPost('user_game');
            $server   = $this->request->getPost('server');

            if (!$userGame || !$server) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'User ID dan Server wajib diisi');
            }

            $data['user_game'] = $userGame;
            $data['server']    = $server;
            $data['username'] = null;
            $data['password'] = null;
        }

        // ================= ROBLOX =================
        if ($tipeGame === 'roblox') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if (!$username || !$password) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Username dan Password Roblox wajib diisi');
            }

            $data['username'] = $username;
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $data['user_game'] = null;
            $data['server']    = null;
        }

        // ================= SIMPAN =================
        $transaksiModel->insert($data);

        return redirect()->to('/riwayat-transaksi')
            ->with('success', 'Transaksi berhasil dibuat');
    }

    public function riwayat()
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->getByUser(session()->get('user_id'));

        return view('transaksi/riwayat', $data);
    }
}
