<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriModel();

        $data['kategori'] = $kategoriModel->findAll();
        $data['title'] = 'Kategori Produk';

        return view('kategori/index', $data);
    }
}
