<?php

namespace App\Controllers;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {

        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Data Kategori | SiUMKM',
            'navtitle' => 'Kategori',
            'kategori' => $kategoriModel->findAll()
        ];

        return view('admin/kategori', $data);
    }

    public function tambah()
    {

        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Tambah Kategori | SiUMKM',
            'navtitle' => 'Kategori',
        ];

        return view('admin/tambah_kategori', $data);
    }

    public function simpan()
    {
        $kategoriModel = new KategoriModel();

        $kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/admin/kategori');
    }

    public function hapus($id)
    {
        $kategoriModel = new KategoriModel();

        $kategoriModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/admin/kategori');
    }

    public function edit($id)
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Edit Kategori | SiUMKM',
            'navtitle' => 'Kategori',
            'kategori' => $kategoriModel->find($id)
        ];

        return view('admin/ubah_kategori', $data);
    }

    public function update()
    {
        $kategoriModel = new KategoriModel();

        $kategoriModel->save([
            'id_kategori' => $this->request->getVar('id_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah!');

        return redirect()->to('/admin/kategori');
    }


}
