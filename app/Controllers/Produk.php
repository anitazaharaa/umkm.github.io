<?php

namespace App\Controllers;


class Produk extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->getProdukWithKategori(),
        ];

        return view('/admin/produk', $data);
    }

    public function cari()
    {
        $keyword = $this->request->getVar('keyword');

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->searchProduk($keyword),
        ];

        return view('/admin/produk', $data);
    }

    public function kategori($id_kategori)
    {

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->getProdukByKategori($id_kategori),
        ];

        return view('/admin/produk', $data);
    }

    public function detail($id_produk)
    {

        $data = [
            'title' => 'Detail Produk | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->getProdukDetail($id_produk),
        ];

        return view('/admin/detail_produk', $data);
    }

    public function hapus($id_produk)
    {

        $this->produkModel->delete($id_produk);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/admin/produk');
    }


}
