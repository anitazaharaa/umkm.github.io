<?php

namespace App\Controllers;

use App\Models\PendapatanModel;

class Admin extends BaseController
{
    

    public function index()
    {
        $pendapatanModel = new PendapatanModel();
        
        $currentMonth = date('m');
        $currentYear = date('Y');

        $data = [
            'title' => 'Dashboard Admin | SiUMKM',
            'navtitle' => 'Dashboard',
            'pendapatan' => $pendapatanModel->getPendapatanByMonthYear($currentMonth, $currentYear),
            'month' => $currentMonth,
            'year' => $currentYear
        ];

        return view('admin/dashboard', $data);
    }

}
