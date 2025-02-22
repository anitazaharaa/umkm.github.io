<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::loginPage');
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::simpan');
$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');

$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/dashboard', 'Dashboard::index');
$routes->get('/profile', 'Profile::index');
$routes->post('/profile', 'Profile::updateprofile');

$routes->get('/kategori', 'Kategori::index' );
$routes->get('/kategori/cari', 'Kategori::cari');
$routes->get('/kategori/tambah', 'Kategori::tambah' );
$routes->post('/kategori/simpan', 'Kategori::simpan');
$routes->get('/kategori/hapus/(:num)', 'Kategori::hapus/$1');
$routes->get('/kategori/ubah/(:num)', 'Kategori::edit/$1');
$routes->post('/kategori/update', 'Kategori::update');

$routes->get('/umkm', 'Umkm::index');
$routes->get('/umkm/cari', 'Umkm::cari');
$routes->get('/umkm/filter', 'Umkm::filter');
$routes->get('/umkm/detail/(:num)', 'Umkm::detail/$1');
$routes->get('/umkm/verifikasi/(:num)', 'Umkm::verifikasi/$1');
$routes->get('/umkm/ubah/(:num)', 'Umkm::ubah/$1');
$routes->post('/umkm/update', 'Umkm::update');
$routes->get('/umkm/hapus/(:num)/(:any)', 'Umkm::hapus/$1/$2');

$routes->get('/produk', 'Produk::index');
$routes->get('/produk/cari', 'Produk::cari');
$routes->get('/produk/tambah', 'Produk::tambah');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->get('/produk/ubah/(:num)', 'Produk::ubah/$1');
$routes->post('/produk/update', 'Produk::update');
$routes->get('/produk/(:num)', 'Produk::kategori/$1');
$routes->get('/produk/detail/(:num)', 'Produk::detail/$1');
$routes->get('/produk/hapus/(:num)', 'Produk::hapus/$1');

$routes->get('/users', 'Users::index');
$routes->get('/users/cari', 'Users::cari');
$routes->get('/users/tambah', 'Users::tambah');
$routes->post('/users/simpan', 'Users::simpan');
$routes->get('/users/ubah/(:num)', 'Users::ubah/$1');
$routes->post('/users/update', 'Users::update');
$routes->get('/users/hapus/(:num)', 'Users::hapus/$1');

$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/tambah', 'Laporan::tambah');
$routes->post('/laporan/simpan', 'Laporan::simpan');
$routes->get('/laporan/detail/(:any)', 'Laporan::detail/$1');
$routes->get('/laporan/hapus/(:any)', 'Laporan::hapus/$1');
$routes->get('/laporan/ubah/(:any)', 'Laporan::ubah/$1');
$routes->post('/laporan/update', 'Laporan::update');
$routes->get('/laporan/generate-laporan', 'Laporan::generateLaporanTahunan');

$routes->get('/pendapatan-umkm', 'PendapatanUmkm::index');
$routes->get('/pendapatan-umkm/tambah', 'PendapatanUmkm::tambah');
$routes->post('/pendapatan-umkm/simpan', 'PendapatanUmkm::simpan');
$routes->get('/pendapatan-umkm/ubah/(:num)', 'PendapatanUmkm::ubah/$1');
$routes->post('/pendapatan-umkm/update', 'PendapatanUmkm::update');
$routes->get('/pendapatan-umkm/hapus/(:num)', 'PendapatanUmkm::hapus/$1');
