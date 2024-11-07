<?php

namespace App\Controllers;

use App\Models\PendapatanModel;

class Laporan extends BaseController
{
    
    public function index()
    {
        $data = [
            'title' => 'Laporan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
        ];

        return view('admin/laporan', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Laporan Pendapatan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
        ];

        return view('admin/tambah_pendapatan', $data);
    }

}
