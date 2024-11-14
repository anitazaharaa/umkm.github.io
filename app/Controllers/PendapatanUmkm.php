<?php

namespace App\Controllers;

use App\Models\PendapatanUmkmModel;

class PendapatanUmkm extends BaseController
{
    public function __construct() {
        $this->pendapatanumkmModel = new PendapatanUmkmModel();
    }
    
    public function index()
    {

        $role = session()->get('role');
        $id_umkm = session()->get('id_umkm');

        $data = [
            'title' => 'Pendapatan UMKM | SiUMKM',
            'role' => $role,
            'navtitle' => 'Pendapatan UMKM',
            'status' => $this->umkmModel->getUmkmStatus($id_umkm)['status'],
            'lastmonth' => $this->pendapatanumkmModel->getMonthMax($id_umkm)['month'] ?? '',
            'pendapatanumkm' => $this->pendapatanumkmModel->pendapatanFindByUmkm($id_umkm),
        ];

        return view('/page/pendapatanumkm', $data);
    }

    public function tambah()
    {
        $role = session()->get('role');
        $id_umkm = session()->get('id_umkm');

        $data = [
            'title' => 'Tambah Pendapatan UMKM | SiUMKM',
            'role' => $role,
            'navtitle' => 'Tambah Pendapatan UMKM',
        ];

        return view('/page/tambah_pendapatanumkm', $data);
    }

    public function simpan()
    {
        $id_umkm = session()->get('id_umkm');

        $this->pendapatanumkmModel->save([
            'id_umkm' => $id_umkm,
            'periode' => $this->request->getVar('periode'),
            'jumlah_pendapatan_umkm' => $this->request->getVar('jumlah_pendapatan_umkm'),
        ]);

        session()->setFlashdata('success', 'Data berhasil disimpan!');

        return redirect()->to('/pendapatan-umkm');
    }

    public function ubah($id)
    {
        $role = session()->get('role');
        $id_umkm = session()->get('id_umkm');

        $data = [
            'title' => 'Ubah Pendapatan UMKM | SiUMKM',
            'role' => $role,
            'navtitle' => 'Ubah Pendapatan UMKM',
            'pendapatanumkm' => $this->pendapatanumkmModel->find($id),
        ];

        return view('/page/ubah_pendapatanumkm', $data);
    }

    public function update()
    {
        $this->pendapatanumkmModel->save([
            'id_pendapatanumkm' => $this->request->getVar('id_pendapatanumkm'),
            'periode' => $this->request->getVar('periode'),
            'jumlah_pendapatan_umkm' => $this->request->getVar('jumlah_pendapatan_umkm'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah!');

        return redirect()->to('/pendapatan-umkm');
    }


    public function hapus($id)
    {
        $this->pendapatanumkmModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus!');

        return redirect()->to('/pendapatan-umkm');
    }
}