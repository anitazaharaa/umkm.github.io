<?php

namespace App\Controllers;
use App\Models\HomeModel;
use App\Models\PenggunaModel;
use App\Models\UmkmModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | SiUMKM'
        ];

        return view('home/login', $data);
    }

    public function register(): string
    {
        $data = [
            'title' => 'Register | SiUMKM',
        ];

        return view('home/register', $data);
    }

    public function simpan_umkm(){
      
        $penggunaModel = new PenggunaModel();
        $umkmModel = new UmkmModel();

        $penggunaModel->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 'pelaku_umkm'
        ]);

        $umkmModel->save([
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'NIK' => $this->request->getVar('NIK'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat_umkm' => $this->request->getVar('alamat_umkm'),
            'status' => 'Belum Teraktivasi',
            'username' => $this->request->getVar('username'),
        ]);

        session()->setFlashdata('success', 'Registrasi berhasil! Silahkan login.');

        return redirect()->to('/');
    }

    public function login()
    {
        $session = session();
        $penggunaModel = new PenggunaModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $penggunaModel->where('username', $username)->first();

        if ($user) {
            $pass = $user['password'];
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                $ses_data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                if($user['role'] == 'administrator'){
                    return redirect()->to('/admin');
                } else if($user['role'] == 'petugas'){
                    return redirect()->to('/petugas');
                } else {
                    return redirect()->to('/pelaku-umkm');
                }
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to('/');
        }
    }
}
