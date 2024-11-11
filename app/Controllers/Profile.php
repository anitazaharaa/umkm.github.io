<?php

namespace App\Controllers;

class Profile extends BaseController
{

    public function index()
    {
        $session = session();

        $data = [
            'title' => 'Profile Admin | SiUMKM',
            'role' => $session->get('role'),
            'navtitle' => 'Profile',
            'profile' => $this->PenggunaModel->where('username', $session->get('username'))->first()
        ];

        return view('/page/profile', $data);
    }

    public function updateprofile()
    {
        $session = session();

        $data = [
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->PenggunaModel->update($this->request->getPost('id_pengguna'), $data);

        $ses_data = [
                    'username' => $this->request->getPost('username'),
                    'role' => $this->request->getPost('role'),
                    'logged_in' => TRUE
                ];
        $session->set($ses_data);

        return redirect()->to('/profile')->with('success', 'Profile berhasil diubah');
    }
}