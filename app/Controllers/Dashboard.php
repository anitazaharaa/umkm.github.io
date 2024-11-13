<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {

        $session = session();

        $currentMonth = $this->request->getPost('month') ?? date('m');
        $currentYear = $this->request->getPost('year') ?? date('Y');

        $data = [
            'navtitle' => 'Dashboard',
            'role' => $session->get('role'),
            'pendapatan' => $this->pendapatanModel->getPendapatanByMonthYear($currentMonth, $currentYear),     
            'total_produk' => $this->produkModel->countAll(),
            'kategori' => $this->kategoriModel->getKategoriAndCountProduk(),
            'month' => $currentMonth,
            'year' => $currentYear
        ];

        if ($session->get('role') == 'administrator') {
            $data['title'] = 'Dashboard Admin | SiUMKM';
        } else {
            $data['title'] = 'Dashboard | SiUMKM';
            $data['total_produk'] = $this->produkModel->countProdukByUmkm($session->get('id_umkm'));
        }

        $data['umkm'] = [
            'total' => $this->umkmModel->countAll(),
            'verif' => $this->umkmModel->getTotalUmkmByStatus('Terverifikasi'),
            'nonverif' => $this->umkmModel->getTotalUmkmByStatus('Belum Terverifikasi')
        ];

        return view('/page/dashboard', $data);
    }

}
