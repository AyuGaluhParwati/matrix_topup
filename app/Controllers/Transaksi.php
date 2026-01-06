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
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
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

        $jumlah   = (int) $this->request->getPost('jumlah');
        $promo    = strtoupper($this->request->getPost('kode_promo'));
        $tipeGame = $produk['tipe_game'];

        // ================= HITUNG HARGA =================
        $subtotal = $produk['harga'] * $jumlah;

        $diskon = 0;
        if ($promo === 'HEMAT10') $diskon = 10;
        if ($promo === 'MTRIX20') $diskon = 20;

        $totalBayar = $subtotal - ($subtotal * $diskon / 100);

        // ================= DATA TRANSAKSI =================
        $data = [
            'user_id'      => session()->get('user_id'),
            'produk_id'    => $produkId,
            'nama_produk'  => $produk['nama_produk'],
            'tipe_game'    => $tipeGame,
            'harga'        => $produk['harga'],
            'jumlah'       => $jumlah,
            'kode_promo'   => $promo,
            'diskon'       => $diskon,
            'total_bayar'  => $totalBayar, // ✅ FIX FINAL

            'nama'         => $this->request->getPost('nama'),
            'kontak'       => $this->request->getPost('kontak'),

            'status'       => 'pending',
            'created_at'   => date('Y-m-d H:i:s')
        ];

        // ================= MOBILE LEGENDS =================
        if ($tipeGame === 'ml') {
            $userGame = $this->request->getPost('user_game');
            $server   = $this->request->getPost('server');

            if (!$userGame || !$server) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'User ID dan Server Mobile Legends wajib diisi');
            }

            $data['user_game'] = $userGame;
            $data['server']    = $server;
            $data['username']  = null;
            $data['password']  = null;
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

            $data['username']  = $username;
            $data['password']  = password_hash($password, PASSWORD_DEFAULT);
            $data['user_game'] = null;
            $data['server']    = null;
        }

        // ================= SIMPAN TRANSAKSI =================
        $transaksiModel->insert($data);
        $transaksiId = $transaksiModel->getInsertID();

        // ================= REDIRECT KE PEMBAYARAN =================
        return redirect()->to('/bayar/' . $transaksiId)
            ->with('success', 'Transaksi berhasil dibuat, silakan lakukan pembayaran');
    }

    public function riwayat()
    {
        $transaksiModel = new TransaksiModel();

        $data['transaksi'] = $transaksiModel
            ->where('user_id', session()->get('user_id'))
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('transaksi/riwayat', $data);
    }
}
