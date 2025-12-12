<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Produk extends Controller
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $role = session()->get('role');

        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();

        $filter = $this->request->getGet('kategori');

        if ($filter) {
            $produk = $this->produkModel->where('kategori_slug', $filter)->findAll();
        } else {
            $produk = $this->produkModel->getProdukWithKategori();
        }

        if ($role === 'admin') {
            return view('admin/produk', [
                'produk'   => $produk,
                'kategori' => $kategori
            ]);
        }

        return view('Produk', [
            'produk'   => $produk,
            'kategori' => $kategori,
            'filter'   => $filter
        ]);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/images/produk', $fileName);

        $this->produkModel->insert([
            'nama_produk'   => $this->request->getPost('nama_produk'),
            'kategori_slug' => $this->request->getPost('kategori_slug'),
            'harga'         => $this->request->getPost('harga'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'gambar'        => $fileName,
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan.');
        return redirect()->to(base_url('produk'));
    }

    public function update($id)
    {
        $file = $this->request->getFile('gambar');

        $data = [
            'nama_produk'   => $this->request->getPost('nama_produk'),
            'kategori_slug' => $this->request->getPost('kategori_slug'),
            'harga'         => $this->request->getPost('harga'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ];

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images/produk', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->produkModel->update($id, $data);

        session()->setFlashdata('success', 'Produk berhasil diperbarui.');
        return redirect()->to(base_url('produk'));
    }

    public function delete($id)
    {
        $produk = $this->produkModel->find($id);

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
