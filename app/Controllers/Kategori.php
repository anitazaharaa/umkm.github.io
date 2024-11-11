<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Data Kategori | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Kategori',
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('/page/kategori', $data);
    }

    public function cari(){

        $keyword = $this->request->getVar('keyword');

        $data = [
            'title' => 'Data Kategori | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Kategori',
            'kategori' => $this->kategoriModel->like('nama_kategori', $keyword)->findAll()
        ];

        return view('/page/kategori', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Kategori | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Kategori',
        ];

        return view('/page/tambah_kategori', $data);
    }

    public function simpan()
    {
    
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/kategori');
    }

    public function hapus($id)
    {

        $this->kategoriModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/kategori');
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Edit Kategori | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Kategori',
            'kategori' => $this->kategoriModel->find($id)
        ];

        return view('/page/ubah_kategori', $data);
    }

    public function update()
    {

        $this->kategoriModel->save([
            'id_kategori' => $this->request->getVar('id_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah!');

        return redirect()->to('/kategori');
    }


}
