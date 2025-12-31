<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Produk extends Controller
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel   = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $role    = session()->get('role');
        $filter  = $this->request->getGet('kategori');

        $kategori = $this->kategoriModel->findAll();

        if ($filter) {
            $produk = $this->produkModel
                ->where('kategori_slug', $filter)
                ->findAll();
        } else {
            $produk = $this->produkModel->getProdukWithKategori();
        }

        if ($role === 'admin') {
            return view('admin/produk', compact('produk', 'kategori'));
        }

        return view('Produk', compact('produk', 'kategori', 'filter'));
    }

    /* =========================
       STORE
    ========================= */
    public function store()
    {
        $file = $this->request->getFile('gambar');

        if (!$file || !$file->isValid()) {
            session()->setFlashdata('error', 'Gambar produk wajib diupload');
            return redirect()->back()->withInput();
        }

        $fileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/images/produk', $fileName);

        $this->produkModel->insert([
            'nama_produk'   => $this->request->getPost('nama_produk'),
            'kategori_slug' => $this->request->getPost('kategori_slug'),
            'tipe_game'     => strtolower(trim($this->request->getPost('tipe_game'))),
            'harga'         => $this->request->getPost('harga'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'gambar'        => $fileName,
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan');
        return redirect()->to(base_url('produk'));
    }

    /* =========================
       UPDATE
    ========================= */
    public function update($id)
    {
        $produk = $this->produkModel->find($id);

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        $data = [
            'nama_produk'   => $this->request->getPost('nama_produk'),
            'kategori_slug' => $this->request->getPost('kategori_slug'),
            'tipe_game'     => strtolower(trim($this->request->getPost('tipe_game'))),
            'harga'         => $this->request->getPost('harga'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
        ];

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            if (!empty($produk['gambar'])) {
                $oldPath = ROOTPATH . 'public/images/produk/' . $produk['gambar'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images/produk', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->produkModel->update($id, $data);

        session()->setFlashdata('success', 'Produk berhasil diperbarui');
        return redirect()->to(base_url('produk'));
    }

    /* =========================
       DELETE
    ========================= */
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

        session()->setFlashdata('success', 'Produk berhasil dihapus');
        return redirect()->to(base_url('produk'));
    }
}
