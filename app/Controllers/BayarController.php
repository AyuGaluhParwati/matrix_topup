<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BayarController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // ===============================
    // HALAMAN BAYAR
    // ===============================
    public function index($transaksiId)
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('user_id');

        $transaksi = $this->db->table('transaksi')
            ->where('id', $transaksiId)
            ->where('user_id', $userId)
            ->get()->getRowArray();

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        $user = $this->db->table('users')
            ->where('id', $userId)
            ->get()->getRowArray();

        return view('bayar/index', [
            'transaksi' => $transaksi,
            'user'      => $user,
            'saldo_dibutuhkan' => $transaksi['total_bayar']
        ]);
    }

    // ===============================
    // PROSES PEMBAYARAN
    // ===============================
    public function proses()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId      = $session->get('user_id');
        $transaksiId = $this->request->getPost('transaksi_id');

        $transaksi = $this->db->table('transaksi')
            ->where('id', $transaksiId)
            ->where('user_id', $userId)
            ->get()->getRowArray();

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak valid');
        }

        // Cegah bayar ulang
        if ($transaksi['status'] === 'paid') {
            return redirect()->back()->with('error', 'Transaksi sudah dibayar');
        }

        $user = $this->db->table('users')
            ->where('id', $userId)
            ->get()->getRowArray();

        $saldoUser  = (int) $user['saldo'];
        $totalBayar = (int) $transaksi['total_bayar'];

        if ($saldoUser < $totalBayar) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi');
        }

        // ===============================
        // TRANSAKSI DATABASE (AMAN)
        // ===============================
        $this->db->transStart();

        // Kurangi saldo
        $this->db->table('users')
            ->where('id', $userId)
            ->set('saldo', 'saldo - '.$totalBayar, false)
            ->update();

        // Update transaksi
        $this->db->table('transaksi')
            ->where('id', $transaksiId)
            ->update([
                'status'     => 'paid',
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'Pembayaran gagal');
        }

        return redirect()->to('/bayar/sukses');
    }

    // ===============================
    // HALAMAN SUKSES
    // ===============================
    public function sukses()
    {
        return view('bayar/sukses');
    }
}
