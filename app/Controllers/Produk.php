<?php

namespace App\Controllers;


class Produk extends BaseController
{
    public function index()
    {

        $id_umkm = session()->get('id_umkm');

        if (session()->get('role') == 'pelaku_umkm') {
            $produk = $this->produkModel->getProdukByUmkm($id_umkm);
        } else {
            $produk = $this->produkModel->getProdukWithKategori();
        }

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'role' => session()->get('role'),
            'status' => $this->umkmModel->getUmkmVerif($id_umkm)['status'],
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->getProdukWithKategori(),
        ];

        return view('/page/produk', $data);
    }

    public function cari()
    {
        $keyword = $this->request->getVar('keyword');
        $id_umkm = session()->get('id_umkm');

        if (session()->get('role') == 'pelaku_umkm') {
            $produk = $this->produkModel->getProdukByUmkm($id_umkm);
        } else {
            $produk = $this->produkModel->getProdukWithKategori();
        }

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'navtitle' => 'Produk UMKM',
            'role' => session()->get('role'),
            'status' => $this->umkmModel->getUmkmVerif($id_umkm)['status'],
            'produk' => $this->produkModel->searchProduk($keyword),
        ];

        return view('/page/produk', $data);
    }

    public function tambah(){
        $id_umkm = session()->get('id_umkm');

        $data = [
            'title' => 'Tambah Produk | SiUMKM',
            'role' => session()->get('role'),
            'id_umkm' => $id_umkm,
            'kategori' => $this->kategoriModel->findAll(),
            'navtitle' => 'Produk UMKM',
        ];

        return view('/page/tambah_produk', $data);
    }

    public function simpan()
    {
        

        $file = $this->request->getFile('foto_produk');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('img/uploads', $newName);
            $gambar = $newName;
        } else {
            $gambar = 'default.png';
        }
        
        $this->produkModel->insert([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'id_umkm' => session()->get('id_umkm'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'foto_produk' => $gambar,
        ]);
        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/produk');
    }

    public function kategori($id_kategori)
    {

        $data = [
            'title' => 'Produk UMKM | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->getProdukByKategori($id_kategori),
        ];

        return view('/page/produk', $data);
    }

    public function detail($id_produk)
    {

        $data = [
            'title' => 'Detail Produk | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Produk UMKM',
            'produk' => $this->produkModel->getProdukDetail($id_produk),
        ];

        return view('/page/detail_produk', $data);
    }

    public function hapus($id_produk)
    {

        $this->produkModel->delete($id_produk);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/produk');
    }


}
