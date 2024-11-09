<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function index()
    {

        $currentMonth = $this->request->getPost('month') ?? date('m');
        $currentYear = $this->request->getPost('year') ?? date('Y');

        $data = [
            'title' => 'Dashboard Admin | SiUMKM',
            'navtitle' => 'Dashboard',
            'pendapatan' => $this->pendapatanModel->getPendapatanByMonthYear($currentMonth, $currentYear),     
            'total_produk' => $this->produkModel->countAll(),
            'kategori' => $this->kategoriModel->getKategoriAndCountProduk(),
            'month' => $currentMonth,
            'year' => $currentYear
        ];

        $data['umkm'] = [
            'total' => $this->umkmModel->countAll(),
            'verif' => $this->umkmModel->getTotalUmkmByStatus('Terverifikasi'),
            'nonverif' => $this->umkmModel->getTotalUmkmByStatus('Belum Terverifikasi')
        ];

        return view('admin/dashboard', $data);
    }

    public function profile()
    {
        $session = session();

        $data = [
            'title' => 'Profile Admin | SiUMKM',
            'navtitle' => 'Profile',
            'profile' => $this->PenggunaModel->where('username', $session->get('username'))->first()
        ];

        return view('admin/profile', $data);
    }

    public function updateprofile()
    {
        $session = session();

        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];

        $this->PenggunaModel->update($this->request->getPost('id_pengguna'), $data);

        $ses_data = [
                    'username' => $this->request->getPost('username'),
                    'role' => $this->request->getPost('role'),
                    'logged_in' => TRUE
                ];
        $session->set($ses_data);

        return redirect()->to('/admin/profile')->with('success', 'Profile berhasil diubah');
    }

}
