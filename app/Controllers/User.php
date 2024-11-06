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
        $penggunaModel = new PenggunaModel();
        $data = [
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role')
        ];

        $penggunaModel->insert($data);

        return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil disimpan');
    }

    public function ubah($id)
    {
        $penggunaModel = new PenggunaModel();
        $data = [
            'title' => 'Ubah Pengguna | SiUMKM',
            'navtitle' => 'Ubah Pengguna',
            'pengguna' => $penggunaModel->find($id)
        ];

        return view('/admin/ubah_pengguna', $data);
    }

    public function update()
    {
        $penggunaModel = new PenggunaModel();
        $data = [
            'id' => $this->request->getVar('id'),
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'role' => $this->request->getVar('role')
        ];

        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $penggunaModel->save($data);

        return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil diubah');
    }

    public function hapus($id)
    {
        $penggunaModel = new PenggunaModel();


        // Get the user to be deleted
        $pengguna = $penggunaModel->find($id);
        $username = $pengguna['username'];
        $role = $pengguna['role'];

        // Delete the user
        $penggunaModel->delete($id);

        // If the role is 'pelaku_umkm', delete the related data from the umkm table
        if ($role == 'pelaku_umkm') {
            $umkmModel = new UmkmModel();
            $umkmModel->where('username', $username)->delete();
        }

        return redirect()->to('/admin/user')->with('success', 'Data pengguna berhasil dihapus');
        }
}
