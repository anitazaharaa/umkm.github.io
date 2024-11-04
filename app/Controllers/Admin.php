<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin | SiUMKM',
            'navtitle' => 'Dashboard',
        ];

        return view('admin/dashboard', $data);
    }

}
