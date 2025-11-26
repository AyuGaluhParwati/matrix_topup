<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\Controller;

class ProdukUser extends Controller
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    /**
     * ============================
     * HALAMAN LIST PRODUK
     * ============================
     */
    public function index()
    {
        $data = [
            'produk' => $this->produkModel->findAll()
        ];

        return view('ProdukUser', $data);
    }

    /**
     * ============================
     * FITUR PENCARIAN PRODUK
     * ============================
     */
    public function cari()
    {
        $keyword = $this->request->getVar('keyword');

        // Jika keyword kosong, langsung tampilkan semua produk
        if (empty($keyword)) {
            return redirect()->to('/produk');
        }

        $data = [
            'produk' => $this->produkModel
                ->groupStart()
                    ->like('nama_produk', $keyword)
                    ->orLike('kategori', $keyword)
                ->groupEnd()
                ->findAll()
        ];

        return view('ProdukUser', $data);
    }
}
