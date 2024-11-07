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
            'laporan' => $laporanModel->findAll(),
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
        ];
        
        $kecamatanNames = [
       "Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karangjaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju"
        ];

        
        $batchData = [];
        foreach ($kecamatanNames as $kecamatan) {
            $batchData[] = [
                'id_laporan' => "LAP-001", // You might want to generate this dynamically
                'nama_kecamatan' => $kecamatan,
                'jumlah_pendapatan' => $this->request->getPost($kecamatan),
                'periode' => date('Y-m-d', strtotime($tanggalLaporan))
            ];
        }
        
        $laporanModel->insert($dataLaporan);
        $pendapatanModel->insertBatch($batchData);

        return redirect()->to('/admin/laporan')->with('success', 'Data pendapatan berhasil disimpan');
        }

}
