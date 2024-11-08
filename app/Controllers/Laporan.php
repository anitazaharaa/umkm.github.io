<?php

namespace App\Controllers;

use App\Models\PendapatanModel;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    
    public function index()
    {
        $laporanModel = new LaporanModel();

        $data = [
            'title' => 'Laporan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
            'laporan' => $laporanModel->orderBy('tanggal_laporan', 'ASC')->findAll(),
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

    public function simpan()
    {
        
        $pendapatanModel = new PendapatanModel();
        $laporanModel = new LaporanModel();

        $tanggalLaporan = $this->request->getPost('tanggal_laporan');
        $month = date('F', strtotime($tanggalLaporan));

        $lastLaporan = $laporanModel->orderBy('id_laporan', 'DESC')->first();
        if ($lastLaporan) {
            $lastIdNumber = (int) substr($lastLaporan['id_laporan'], 4);
            $newIdNumber = $lastIdNumber + 1;
            $newIdLaporan = 'LAP-' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newIdLaporan = 'LAP-001';
        }

        $dataLaporan = [
            'id_laporan' => $newIdLaporan,
            'nama_laporan' => "Laporan Pendapatan UMKM Bulan " . $month,
            'tanggal_laporan' => $tanggalLaporan,
        ];
        
        $kecamatanNames = [
       "Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karangjaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju"
        ];

        
        $batchData = [];
        foreach ($kecamatanNames as $kecamatan) {
            $batchData[] = [
                'id_laporan' => $newIdLaporan, // You might want to generate this dynamically
                'nama_kecamatan' => $kecamatan,
                'jumlah_pendapatan' => $this->request->getPost($kecamatan),
                'periode' => date('Y-m-d', strtotime($tanggalLaporan))
            ];
        }
        
        $laporanModel->insert($dataLaporan);
        $pendapatanModel->insertBatch($batchData);

        return redirect()->to('/admin/laporan')->with('success', 'Data pendapatan berhasil disimpan');
    }

    public function detail($id)
    {
        $pendapatanModel = new PendapatanModel();
        $laporanModel = new LaporanModel();

        $laporan = $laporanModel->find($id);
        $pendapatan = $pendapatanModel->where('id_laporan', $id)->findAll();

        $data = [
            'title' => 'Detail Laporan Pendapatan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
            'laporan' => $laporan,
            'pendapatan' => $pendapatan,
        ];

        return view('/admin/detail_laporan', $data);
    }

    public function hapus($id)
    {
        $pendapatanModel = new PendapatanModel();
        $laporanModel = new LaporanModel();

        $pendapatanModel->where('id_laporan', $id)->delete();
        $laporanModel->delete($id);

        return redirect()->to('/admin/laporan')->with('success', 'Data pendapatan berhasil dihapus');
    }

    public function ubah($id)
    {
        $pendapatanModel = new PendapatanModel();
        $laporanModel = new LaporanModel();

        $laporan = $laporanModel->find($id);
        $pendapatan = $pendapatanModel->where('id_laporan', $id)->findAll();

        $data = [
            'title' => 'Ubah Laporan Pendapatan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
            'laporan' => $laporan,
            'pendapatan' => $pendapatan,
        ];

        return view('/admin/ubah_pendapatan', $data);
    }

    public function update()
    {
        $pendapatanModel = new PendapatanModel();
        $laporanModel = new LaporanModel();

        $idLaporan = $this->request->getPost('id_laporan');
        $tanggalLaporan = $this->request->getPost('tanggal_laporan');
        $month = date('F', strtotime($tanggalLaporan));

        $kecamatanNames = [
            "Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karangjaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju"
        ];

        $dataLaporan = [
            'nama_laporan' => "Laporan Pendapatan UMKM Bulan " . $month,
            'tanggal_laporan' => $tanggalLaporan,
        ];

        $batchData = [];
        foreach ($kecamatanNames as $kecamatan) {
            $batchData[] = [
                'id_pendapatan' => $pendapatanModel->where('id_laporan', $idLaporan)->where('nama_kecamatan', $kecamatan)->first()['id_pendapatan'],
                'jumlah_pendapatan' => $this->request->getPost($kecamatan),
            ];
        }

        $laporanModel->update($idLaporan, $dataLaporan);

        $pendapatanModel->updateBatch($batchData, 'id_pendapatan');

        return redirect()->to('/admin/laporan/detail/' . $idLaporan)->with('success', 'Data laporan berhasil diubah');
    }

}
