<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->post('/home/simpan', 'Home::simpan');
$routes->post('/home/login', 'Home::login');
$routes->get('/home/logout', 'Home::logout');

$routes->get('/admin', 'Admin::index');
$routes->post('/admin', 'Admin::index');
$routes->get('/admin/profile', 'Admin::profile');
$routes->post('/admin/updateprofile', 'Admin::updateprofile');

$routes->get('/admin/kategori', 'Kategori::index' );
$routes->get('/admin/kategori/cari', 'Kategori::cari');
$routes->get('/admin/kategori/tambah', 'Kategori::tambah' );
$routes->post('/admin/kategori/simpankategori', 'Kategori::simpan');
$routes->get('/admin/kategori/hapus/(:num)', 'Kategori::hapus/$1');
$routes->get('/admin/kategori/ubah/(:num)', 'Kategori::edit/$1');
$routes->post('/admin/kategori/update', 'Kategori::update');

$routes->get('/admin/umkm', 'Umkm::index');
$routes->get('/admin/umkm/cari', 'Umkm::cari');
$routes->get('/admin/umkm/detail/(:num)', 'Umkm::detail/$1');
$routes->get('/admin/umkm/ubah/(:num)', 'Umkm::ubah/$1');
$routes->post('/admin/umkm/update', 'Umkm::update');
$routes->get('/admin/umkm/hapus/(:num)/(:any)', 'Umkm::hapus/$1/$2');

$routes->get('/admin/produk', 'Produk::index');
$routes->get('/admin/produk/cari', 'Produk::cari');
$routes->get('/admin/produk/(:num)', 'Produk::kategori/$1');
$routes->get('/admin/produk/detail/(:num)', 'Produk::detail/$1');
$routes->get('/admin/produk/hapus/(:num)', 'Produk::hapus/$1');

$routes->get('/admin/user', 'User::index');
$routes->get('/admin/user/cari', 'User::cari');
$routes->get('/admin/user/tambah', 'User::tambah');
$routes->post('/admin/user/simpan', 'User::simpan');
$routes->get('/admin/user/ubah/(:num)', 'User::ubah/$1');
$routes->post('/admin/user/update', 'User::update');
$routes->get('/admin/user/hapus/(:num)', 'User::hapus/$1');

$routes->get('/admin/laporan', 'Laporan::index');
$routes->get('/admin/laporan/tambahpendapatan', 'Laporan::tambah');
$routes->post('/admin/laporan/simpan', 'Laporan::simpan');
$routes->get('/admin/laporan/detail/(:any)', 'Laporan::detail/$1');
$routes->get('/admin/laporan/hapus/(:any)', 'Laporan::hapus/$1');
$routes->get('/admin/laporan/ubah/(:any)', 'Laporan::ubah/$1');
$routes->post('/admin/laporan/update', 'Laporan::update');