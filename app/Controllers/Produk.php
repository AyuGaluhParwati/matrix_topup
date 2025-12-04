<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\Controller;

class Produk extends Controller
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    /**
     * Menampilkan halaman produk
     * Jika admin → ke halaman admin
     * Jika user → ke halaman user
     */
    public function index()
    {
        $role = session()->get('role');
        $produk = $this->produkModel->findAll();

        // Jika admin, tampilkan halaman admin
        if ($role === 'admin') {
            return view('admin/produk', ['produk' => $produk]);
        }
        return view('views/Produk', ['produk' => $produk]);
    }

    /**
     * Halaman form tambah produk (khusus admin)
     */
    public function create()
    {
        return view('admin/produk_create');
    }

    /**
     * Simpan produk baru
     */
    public function store()
    {
        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();

        // Simpan file ke folder public/images/produk
        $file->move(ROOTPATH . 'public/images/produk', $fileName);

        $this->produkModel->insert([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori'    => $this->request->getPost('kategori'),
            'harga'       => $this->request->getPost('harga'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'gambar'      => $fileName,
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan.');
        return redirect()->to(base_url('produk'));
    }

    /**
     * Halaman edit produk
     */
    public function edit($id)
    {
        $produk = $this->produkModel->find($id);
        return view('admin/produk_edit', ['produk' => $produk]);
    }

    /**
     * Update data produk
     */
    public function update($id)
    {
        $file = $this->request->getFile('gambar');
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori'    => $this->request->getPost('kategori'),
            'harga'       => $this->request->getPost('harga'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
        ];

        // Jika user upload gambar baru
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images/produk', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->produkModel->update($id, $data);
        session()->setFlashdata('success', 'Produk berhasil diperbarui.');
        return redirect()->to(base_url('produk'));
    }

    /**
     * Hapus produk
     */
    public function delete($id)
    {
        $produk = $this->produkModel->find($id);

        // Hapus file gambar jika ada
        if ($produk && !empty($produk['gambar'])) {
            $path = ROOTPATH . 'public/images/produk/' . $produk['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->produkModel->delete($id);
        session()->setFlashdata('success', 'Produk berhasil dihapus.');
        return redirect()->to(base_url('produk'));
    }

}
