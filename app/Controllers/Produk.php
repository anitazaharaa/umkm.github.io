<?php

namespace App\Controllers;

use App\Models\ProdukModel;
class Produk extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'produk' => $produkModel->getProdukWithKategori(),
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
        $produkModel = new ProdukModel();

        $data = [
            'title' => 'Detail Produk | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'produk' => $produkModel->getProdukDetail($id_produk),
        ];

        return view('/admin/detail_produk', $data);
    }

    public function hapus($id_produk)
    {
        $produkModel = new ProdukModel();

        $produkModel->delete($id_produk);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/admin/produk');
    }


}
