<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'Home::index');

// Auth (Login, Register, Logout)
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');

// Menampilkan form register
$routes->get('register', 'Auth::register');
// Proses form register
$routes->post('register', 'Auth::saveUser');

$routes->get('logout', 'Auth::logout');

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
$routes->get('ProdukUser', 'ProdukUser::index');

// Pencarian produk (RUTE KHUSUS HARUS DIDULUKAN)
$routes->get('produk/cari', 'ProdukUser::cari');

$routes->get('tentang_kami', 'TentangKami::index');

$routes->get('kontak', 'Kontak::index');
$routes->post('kontak/send', 'Kontak::send');
// ADMIN PESAN
$routes->get('pesan', 'Pesan::index');
$routes->get('pesan/(:num)', 'Admin\Pesan::detail/$1');
$routes->get('pesan/delete/(:num)', 'Admin\Pesan::delete/$1');












