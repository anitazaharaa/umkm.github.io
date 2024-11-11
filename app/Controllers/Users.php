<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User Management | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'User Management',
            'user' => $this->PenggunaModel->findAll()
        ];

        return view('/admin/users', $data);
    }

    public function cari()
    {
        $keyword = $this->request->getVar('keyword');
        $data = [
            'title' => 'User Management | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'User Management',
            'user' => $this->PenggunaModel->like('nama_pengguna', $keyword)->findAll()
        ];

        return view('/admin/users', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pengguna | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Tambah Pengguna'
        ];

        return view('/admin/tambah_pengguna', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'confirm_password' => 'required|matches[password]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $lastPengguna = $this->PenggunaModel->orderBy('id_pengguna', 'DESC')->first();
        $newIdPengguna = $lastPengguna['id_pengguna'] + 1;

        $data = [
            'id_pengguna' => $newIdPengguna,
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role')
        ];

        $this->PenggunaModel->insert($data);

        return redirect()->to('/users')->with('success', 'Data pengguna berhasil disimpan');
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Pengguna | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Ubah Pengguna',
            'pengguna' => $this->PenggunaModel->find($id)
        ];

        return view('/admin/ubah_pengguna', $data);
    }

    public function update()
    {
        $data = [
            'id_pengguna' => $this->request->getVar('id_pengguna'),
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'role' => $this->request->getVar('role')
        ];

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->PenggunaModel->save($data);

        return redirect()->to('/users')->with('success', 'Data pengguna berhasil diubah');
    }

    public function hapus($id)
    {

        $pengguna = $this->PenggunaModel->find($id);

        $role = $pengguna['role'];
        $this->PenggunaModel->delete($id);

        if ($role == 'pelaku_umkm') {
            $this->umkmModel->where('id_pengguna', $id)->delete();
        }

        return redirect()->to('/users')->with('success', 'Data pengguna berhasil dihapus');
        }
}
