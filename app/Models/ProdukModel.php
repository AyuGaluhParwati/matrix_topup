<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

protected $allowedFields = [
    'nama_produk', 
    'kategori_slug', 
    'tipe_game', // 🔥 TAMBAHKAN INI
    'harga', 
    'deskripsi', 
    'gambar'
];


    public function getProdukWithKategori()
    {
        return $this->select('produk.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.slug = produk.kategori_slug', 'left')
                    ->findAll();
    }
}
