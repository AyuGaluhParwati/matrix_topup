<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'Home::index');


$routes->get('topup', 'Topup::index');
$routes->post('topup/process', 'Topup::process');

// profil index and update
$routes->get('/profile', 'Profile::index');
$routes->post('/profile/update', 'Profile::update');


// Auth (Login, Register, Logout)
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');

// Menampilkan form register
$routes->get('register', 'Auth::register');
// Proses form register
$routes->post('register', 'Auth::saveUser');

$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password', 'Auth::forgotPasswordProcess');

$routes->get('logout', 'Auth::logout');

$routes->get('profil', 'profil::index');
$routes->post('/profil/update', 'Profil::update');

// Role-based pages
$routes->get('home', 'Home::index'); // optional, karena '/' sudah mewakili home
$routes->get('admin/dashboard', 'Admin::dashboard');

$routes->get('dashboard', 'Admin::dashboard'); // route default admin

$routes->get('admin/users', 'Admin::users');
$routes->get('admin/users/edit/(:num)', 'Admin::editUser/$1');
$routes->post('admin/users/update/(:num)', 'Admin::updateUser/$1');
$routes->get('admin/users/delete/(:num)', 'Admin::deleteUser/$1');
  
$routes->get('produk', 'Produk::index');          // Daftar produk
$routes->get('produk/create', 'Produk::create'); // Form tambah produk
$routes->post('produk/store', 'Produk::store');  // Simpan produk baru
$routes->get('produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('produk/update/(:num)', 'Produk::update/$1');
$routes->get('produk/delete/(:num)', 'Produk::delete/$1');
// =====================
// ROUTES PRODUK USER
// =====================

// List produk
$routes->get('produk/cari', 'ProdukUser::cari');            // lebih spesifik dulu
$routes->get('produk/kategori/(:segment)', 'ProdukUser::kategori/$1');
$routes->get('ProdukUser', 'ProdukUser::index');


$routes->get('tentang_kami', 'TentangKami::index');

$routes->get('kontak', 'Kontak::index');
$routes->post('kontak/send', 'Kontak::send');

// ADMIN PESAN
$routes->get('pesan', 'Pesan::index');
$routes->get('pesan/(:num)', 'Admin\Pesan::detail/$1');
$routes->get('pesan/delete/(:num)', 'Admin\Pesan::delete/$1');

$routes->get('transaksi/form/(:num)', 'Transaksi::form/$1', ['filter' => 'authTransaksi']);
$routes->post('transaksi/proses', 'Transaksi::proses', ['filter' => 'authTransaksi']);
$routes->get('riwayat-transaksi', 'Transaksi::riwayat', ['filter' => 'auth']);



$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('transaksi', 'AdminTransaksi::transaksi');
    $routes->get('transaksi/update/(:num)/(:segment)', 'AdminTransaksi::updateStatus/$1/$2');
});

$routes->get('/bayar/(:num)', 'BayarController::index/$1');
$routes->post('/bayar/proses', 'BayarController::proses');
$routes->get('/bayar/sukses/(:num)', 'BayarController::sukses/$1');
$routes->get('/bayar/gagal', 'BayarController::gagal');
$routes->get('/bayar/invoice/(:num)', 'BayarController::invoice/$1');














