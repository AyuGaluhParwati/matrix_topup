<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'produk_id',
        'user_game',
        'server',
        'catatan',
        'total_bayar',
        'status'
    ];

    protected $useTimestamps = false; // ubah ke true jika pakai created_at

    public function getByUser($userId)
    {
        return $this->select('transaksi.*, produk.nama_produk, produk.harga')
            ->join('produk', 'produk.id = transaksi.produk_id', 'left')
            ->where('transaksi.user_id', $userId)
            ->orderBy('transaksi.id', 'DESC')
            ->findAll();
    }
}
