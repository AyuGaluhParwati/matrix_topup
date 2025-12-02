<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class ProdukUser extends Controller
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }

    /**
     * ============================
     * HALAMAN LIST PRODUK (HOMEPAGE)
     * ============================
     */
    public function index()
    {
        $data = [
            'produk'   => $this->produkModel->orderBy('created_at', 'DESC')->findAll(),
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('produk/index', $data);
    }

    /**
     * ============================
     * FITUR PENCARIAN PRODUK
     * ============================
     */
    public function cari()
    {
        $keyword = $this->request->getVar('keyword');

        // Jika keyword kosong, tampilkan semua produk
        if (empty($keyword)) {
            return redirect()->to('/produk');
        }

        $produk = $this->produkModel
                    ->groupStart()
                        ->like('nama_produk', $keyword)
                        ->orLike('kategori', $keyword)
                    ->groupEnd()
                    ->findAll();

        $data = [
            'produk'   => $produk,
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('produk/index', $data);
    }

    /**
     * ============================
     * HALAMAN PRODUK BERDASARKAN KATEGORI
     * ============================
     */
    public function kategori($slug)
    {
        // Ambil data kategori berdasarkan slug
        $kategoriSatu = $this->kategoriModel->where('slug', $slug)->first();

        if (!$kategoriSatu) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Kategori '$slug' tidak ditemukan");
        }

        // Ambil semua kategori (untuk menampilkan daftar kategori)
        $kategori = $this->kategoriModel->findAll();

        // Ambil produk yang sesuai kategori
        $produk = $this->produkModel->where('kategori_slug', $slug)->findAll();

        $data = [
            'title'        => 'Kategori: ' . $kategoriSatu['nama_kategori'],
            'kategori'     => $kategori,       // semua kategori untuk foreach
            'kategori_satu'=> $kategoriSatu,   // kategori yang sedang dibuka
            'produk'       => $produk
        ];

        return view('produk/kategori', $data);
    }
}
