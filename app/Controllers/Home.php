<?php

namespace App\Controllers;

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

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_pemilik' => 'required',
            'NIK' => 'required|numeric|min_length[16]',
            'email' => 'required|valid_email',
            'no_hp' => 'required|numeric|min_length[10]',
            'alamat_umkm' => 'required',
            'username' => 'required|min_length[5]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $lastPengguna = $this->PenggunaModel->orderBy('id_pengguna', 'DESC')->first();
        $newIdPengguna = $lastPengguna['id_pengguna'] + 1;

        $this->PenggunaModel->insert([
            'id_pengguna' => $newIdPengguna,
            'nama_pengguna' => $this->request->getVar('nama_pemilik'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 'pelaku_umkm'
        ]);

        $this->umkmModel->insert([
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'NIK' => $this->request->getVar('NIK'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat_umkm' => $this->request->getVar('alamat_umkm'),
            'status' => 'Belum Terverifikasi',
            'id_pengguna' => $newIdPengguna,
        ]);

        session()->setFlashdata('success', 'Registrasi berhasil! Silahkan login.');

        return redirect()->to('/');
    }

    public function login()
    {
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->PenggunaModel->where('username', $username)->first();

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
                    return redirect()->to('/umkm');
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

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
