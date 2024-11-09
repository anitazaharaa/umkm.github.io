<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User Management | SiUMKM',
            'navtitle' => 'User Management',
            'user' => $this->PenggunaModel->findAll()
        ];

        return view('/admin/user', $data);
    }

    public function cari()
    {
        $keyword = $this->request->getVar('keyword');
        $data = [
            'title' => 'User Management | SiUMKM',
            'navtitle' => 'User Management',
            'user' => $this->PenggunaModel->like('nama_pengguna', $keyword)->findAll()
        ];

        return view('/admin/user', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Pengguna | SiUMKM',
            'navtitle' => 'Tambah Pengguna'
        ];

        return view('/admin/tambah_pengguna', $data);
    }

    public function simpan()
    {    
        $data = [
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role')
        ];

        $this->PenggunaModel->insert($data);

        return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil disimpan');
    }

    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Pengguna | SiUMKM',
            'navtitle' => 'Ubah Pengguna',
            'pengguna' => $this->PenggunaModel->find($id)
        ];

        return view('/admin/ubah_pengguna', $data);
    }

    public function update()
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'role' => $this->request->getVar('role')
        ];

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $this->PenggunaModel->save($data);

        return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil diubah');
    }

    public function hapus($id)
    {


        // Get the user to be deleted
        $pengguna = $this->PenggunaModel->find($id);

        $role = $pengguna['role'];

        // Delete the user
        $this->PenggunaModel->delete($id);

        // If the role is 'pelaku_umkm', delete the related data from the umkm table
        if ($role == 'pelaku_umkm') {
            $this->umkmModel->where('id_pengguna', $id_pengguna)->delete();
        }

        return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil dihapus');
        }
}
