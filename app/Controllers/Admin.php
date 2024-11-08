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

}
