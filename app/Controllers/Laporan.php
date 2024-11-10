<?php

namespace App\Controllers;

use App\Models\PendapatanModel;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    
    public function index()
    {

        $data = [
            'title' => 'Laporan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
            'laporan' => $this->laporanModel->orderBy('tanggal_laporan', 'ASC')->findAll(),
        ];

        return view('/page/laporan', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Laporan Pendapatan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
        ];

        return view('/page/tambah_pendapatan', $data);
    }

    public function simpan()
    {
        

        $tanggalLaporan = $this->request->getPost('tanggal_laporan');
        $month = date('F', strtotime($tanggalLaporan));

        $lastLaporan = $this->laporanModel->orderBy('id_laporan', 'DESC')->first();
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
        
        $this->laporanModel->insert($dataLaporan);
        $this->pendapatanModel->insertBatch($batchData);

        return redirect()->to('/page/laporan')->with('success', 'Data pendapatan berhasil disimpan');
    }

    public function detail($id)
    {

        $laporan = $this->laporanModel->find($id);
        $pendapatan = $this->pendapatanModel->where('id_laporan', $id)->findAll();

        $data = [
            'title' => 'Detail Laporan Pendapatan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
            'laporan' => $laporan,
            'pendapatan' => $pendapatan,
        ];

        return view('/page/detail_laporan', $data);
    }

    public function hapus($id)
    {

        $this->pendapatanModel->where('id_laporan', $id)->delete();
        $this->laporanModel->delete($id);

        return redirect()->to('/page/laporan')->with('success', 'Data pendapatan berhasil dihapus');
    }

    public function ubah($id)
    {

        $laporan = $this->laporanModel->find($id);
        $pendapatan = $this->pendapatanModel->where('id_laporan', $id)->findAll();

        $data = [
            'title' => 'Ubah Laporan Pendapatan UMKM | SiUMKM',
            'navtitle' => 'Laporan UMKM',
            'laporan' => $laporan,
            'pendapatan' => $pendapatan,
        ];

        return view('/page/ubah_pendapatan', $data);
    }

    public function update()
    {

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
                'id_pendapatan' => $this->pendapatanModel->where('id_laporan', $idLaporan)->where('nama_kecamatan', $kecamatan)->first()['id_pendapatan'],
                'jumlah_pendapatan' => $this->request->getPost($kecamatan),
            ];
        }

        $this->laporanModel->update($idLaporan, $dataLaporan);

        $this->pendapatanModel->updateBatch($batchData, 'id_pendapatan');

        return redirect()->to('/page/laporan/detail/' . $idLaporan)->with('success', 'Data laporan berhasil diubah');
    }

}
