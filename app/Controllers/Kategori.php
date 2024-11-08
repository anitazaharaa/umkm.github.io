<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Data Kategori | SiUMKM',
            'navtitle' => 'Kategori',
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('admin/kategori', $data);
    }

    public function cari(){

        $keyword = $this->request->getVar('keyword');

        $data = [
            'title' => 'Data Kategori | SiUMKM',
            'navtitle' => 'Kategori',
            'kategori' => $this->kategoriModel->like('nama_kategori', $keyword)->findAll()
        ];

        return view('admin/kategori', $data);
    }

    public function tambah()
    {

        $data = [
            'title' => 'Tambah Kategori | SiUMKM',
            'navtitle' => 'Kategori',
        ];

        return view('admin/tambah_kategori', $data);
    }

    public function simpan()
    {
    
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/admin/kategori');
    }

    public function hapus($id)
    {

        $this->kategoriModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/admin/kategori');
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Edit Kategori | SiUMKM',
            'navtitle' => 'Kategori',
            'kategori' => $this->kategoriModel->find($id)
        ];

        return view('admin/ubah_kategori', $data);
    }

    public function update()
    {

        $this->kategoriModel->save([
            'id_kategori' => $this->request->getVar('id_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah!');

        return redirect()->to('/admin/kategori');
    }


}
