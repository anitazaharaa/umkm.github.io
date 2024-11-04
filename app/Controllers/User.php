<?php

namespace App\Controllers;

use App\Models\UmkmModel;
use App\Models\PenggunaModel;

class User extends BaseController
{
    public function index()
    {
        $penggunaModel = new PenggunaModel();
        $data = [
            'title' => 'User Management | SiUMKM',
            'navtitle' => 'User Management',
            'user' => $penggunaModel->findAll()
        ];

        return view('/admin/user', $data);
    }
}
