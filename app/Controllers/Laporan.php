<?php

namespace App\Controllers;

use App\Models\PendapatanModel;
use App\Models\LaporanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    
    public function index()
    {

        $data = [
            'title' => 'Laporan UMKM | SiUMKM',
            'role' => session()->get('role'),
            'navtitle' => 'Laporan UMKM',
            'laporan' => $this->laporanModel->orderBy('tanggal_laporan', 'ASC')->findAll(),
        ];

        return view('/page/laporan', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Laporan Pendapatan UMKM | SiUMKM',
            'role' => session()->get('role'),
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

        return redirect()->to('/laporan')->with('success', 'Data pendapatan berhasil disimpan');
    }

    public function detail($id)
    {

        $laporan = $this->laporanModel->find($id);
        $pendapatan = $this->pendapatanModel->where('id_laporan', $id)->findAll();

        $data = [
            'title' => 'Detail Laporan Pendapatan UMKM | SiUMKM',
            'role' => session()->get('role'),
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

        return redirect()->to('/laporan')->with('success', 'Data pendapatan berhasil dihapus');
    }

    public function ubah($id)
    {

        $laporan = $this->laporanModel->find($id);
        $pendapatan = $this->pendapatanModel->where('id_laporan', $id)->findAll();

        $data = [
            'title' => 'Ubah Laporan Pendapatan UMKM | SiUMKM',
            'role' => session()->get('role'),
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
                'periode' => date('Y-m-d', strtotime($tanggalLaporan))
            ];
        }

        $this->laporanModel->update($idLaporan, $dataLaporan);

        $this->pendapatanModel->updateBatch($batchData, 'id_pendapatan');

        return redirect()->to('/laporan/detail/' . $idLaporan)->with('success', 'Data laporan berhasil diubah');
    }

    public function generateLaporanTahunan()
    {
        $year = $this->request->getGet('tahun');

        // Instantiate Dompdf with options
        $options = new Options();
        $options->set('arial', 'Courier');
        $dompdf = new Dompdf($options);

        $pendapatan = $this->pendapatanModel->getPendapatanByYear($year);

        $groupedData = [];
        foreach ($pendapatan as $item) {
            $nama_kecamatan = $item['nama_kecamatan'];
            if (!isset($groupedData[$nama_kecamatan])) {
                $groupedData[$nama_kecamatan] = [
                    'nama_kecamatan' => $nama_kecamatan,
                    'jumlah_pendapatan' => []
                ];
            }
            $groupedData[$nama_kecamatan]['jumlah_pendapatan'][] = $item['jumlah_pendapatan'];
        ;
        }

        $months = [];
        foreach ($this->pendapatanModel->getMonthByYear($year) as $item) {
            $months[] = [
                'month' => date('F', mktime(0, 0, 0, $item['month'], 10))
            ];
        }

        $data = [
            'year' => $year,
            'months' => $months,
            'pendapatan' => $groupedData
        ];

        $html = view('layout/template_pdf', $data);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream("Laporan Pendapatan UMKM Tahun " . $year . ".pdf", array("Attachment" => 0));
    }

}
