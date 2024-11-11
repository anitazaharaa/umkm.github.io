<?php

namespace App\Controllers;


class Umkm extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data UMKM | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Data UMKM',
            'umkm' => $this->umkmModel->findAll()
        ];

        return view('/page/umkm', $data);
    }

    public function cari(){
        $keyword = $this->request->getVar('keyword');

        $data = [
            'title' => 'Data UMKM | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Data UMKM',
            'umkm' => $this->umkmModel->like('nama_pemilik', $keyword)
                                        ->orLike('NIK', $keyword)
                                        ->orLike('email', $keyword)
                                        ->orLike('no_hp', $keyword)
                                        ->orLike('alamat_umkm', $keyword)
                                        ->orLike('status', $keyword)
                                        ->findAll()
        ];
        return view('/page/umkm', $data);
    }


    public function detail($id)
    {
        $data = [
            'title' => 'Detail UMKM | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Data UMKM',
            'umkm' => $this->umkmModel->find($id)
        ];

        return view('/page/detail_umkm', $data);
    }

    public function verifikasi($id)
    {
        $umkm = $this->umkmModel->find($id);

        if ($umkm['status'] == 'Belum Terverifikasi') {
            $this->umkmModel->update($id, ['status' => 'Terverifikasi']);
        } else {
            $this->umkmModel->update($id, ['status' => 'Belum Terverifikasi']);
        }

        session()->setFlashdata('success', 'UMKM berhasil diverifikasi!');

        return redirect()->to('/umkm/detail/' . $id);
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah UMKM | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Data UMKM',
            'umkm' => $this->umkmModel->find($id)
        ];

        return view('/page/ubah_umkm', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id_umkm');
        $data = [
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'NIK' => $this->request->getVar('NIK'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat_umkm' => $this->request->getVar('alamat_umkm'),
            'status' => $this->request->getVar('status')
        ];

        $this->umkmModel->update($id, $data);

        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/umkm/detail/' . $id);
    }

    public function hapus($id_umkm, $id_pengguna)
    {

        $this->umkmModel->delete($id_umkm);

        $this->PenggunaModel->delete($id_pengguna);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/umkm');
    }
}
