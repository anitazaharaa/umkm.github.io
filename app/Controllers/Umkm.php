<?php

namespace App\Controllers;

use App\Models\UmkmModel;
use App\Models\PenggunaModel;

class Umkm extends BaseController
{
    public function index()
    {
        $umkmModel = new UmkmModel();
        $data = [
            'title' => 'Data UMKM | SiUMKM',
            'navtitle' => 'Data UMKM',
            'umkm' => $umkmModel->findAll()
        ];

        return view('/admin/umkm', $data);
    }

    public function detail($id)
    {
        $umkmModel = new UmkmModel();
        $data = [
            'title' => 'Detail UMKM | SiUMKM',
            'navtitle' => 'Data UMKM',
            'umkm' => $umkmModel->find($id)
        ];

        return view('/admin/detail_umkm', $data);
    }

    public function ubah($id)
    {
        $umkmModel = new UmkmModel();
        $data = [
            'title' => 'Ubah UMKM | SiUMKM',
            'navtitle' => 'Data UMKM',
            'umkm' => $umkmModel->find($id)
        ];

        return view('/admin/ubah_umkm', $data);
    }

    public function update()
    {
        $umkmModel = new UmkmModel();
        $id = $this->request->getVar('id_umkm');
        $data = [
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'NIK' => $this->request->getVar('NIK'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat_umkm' => $this->request->getVar('alamat_umkm'),
            'status' => $this->request->getVar('status')
        ];

        $umkmModel->update($id, $data);

        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/admin/umkm/detail/' . $id);
    }

    public function hapus($id, $username)
    {
        $umkmModel = new UmkmModel();
        $penggunaModel = new PenggunaModel();

        // Delete UMKM data
        $umkmModel->delete($id);

        // Delete Pengguna data
        $pengguna = $penggunaModel->where('username', $username)->first();
        if ($pengguna) {
            $penggunaModel->delete($pengguna['id']);
        }

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/admin/umkm');
    }
}
