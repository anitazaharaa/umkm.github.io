<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->post('/home/simpan', 'Home::simpan_umkm');
$routes->post('/home/login', 'Home::login');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/kategori', 'Kategori::index' );
$routes->get('/admin/kategori/tambah', 'Kategori::tambah' );
$routes->post('/admin/kategori/simpankategori', 'Kategori::simpan');
$routes->get('/admin/kategori/hapus/(:num)', 'Kategori::hapus/$1');
$routes->get('/admin/kategori/ubah/(:num)', 'Kategori::edit/$1');
$routes->post('/admin/kategori/update', 'Kategori::update');

$routes->get('/admin/umkm', 'Umkm::index');
$routes->get('/admin/umkm/detail/(:num)', 'Umkm::detail/$1');
$routes->get('/admin/umkm/ubah/(:num)', 'Umkm::ubah/$1');
$routes->post('/admin/umkm/update', 'Umkm::update');
$routes->get('/admin/umkm/hapus/(:num)/(:any)', 'Umkm::hapus/$1/$2');

$routes->get('/admin/produk', 'Produk::index');
$routes->get('/admin/produk/detail/(:num)', 'Produk::detail/$1');
$routes->get('/admin/produk/hapus/(:num)', 'Produk::hapus/$1');

$routes->get('/admin/user', 'User::index');