<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class UmkmModel extends Model
    {
        protected $table = 'tbl_umkm';
        protected $primaryKey = 'id_umkm';
        protected $useTimestamps = true;
        protected $allowedFields = ['nama_pemilik', 'NIK', 'email','no_hp','id_kategori', 'nama_umkm', 'alamat_umkm', 'facebook', 'instagram', 'youtube', 'id_pengguna', 'status', 'username'];

        public function getUmkmWithPendapatan(){
            return $this->select('tbl_umkm.*, SUM(tbl_pendapatan_umkm.jumlah_pendapatan_umkm) as total_pendapatan')
                        ->join('tbl_pendapatan_umkm', 'tbl_pendapatan_umkm.id_umkm = tbl_umkm.id_umkm', 'left')
                        ->groupBy('tbl_umkm.id_umkm')
                        ->findAll();
        }

        public function getUmkmWithPendapatanWithFilter($pendapatan = null, $sosial_media = null) {
            $query = $this->select('tbl_umkm.*, SUM(tbl_pendapatan_umkm.jumlah_pendapatan_umkm) as total_pendapatan')
                  ->join('tbl_pendapatan_umkm', 'tbl_pendapatan_umkm.id_umkm = tbl_umkm.id_umkm', 'left')
                  ->groupBy('tbl_umkm.id_umkm');

            if ($pendapatan != null) {
                $query->orderBy('total_pendapatan', $pendapatan);
            }

            if ($sosial_media == 'true'){
                $query->where('tbl_umkm.facebook IS NOT NULL')
                      ->Where('tbl_umkm.instagram IS NOT NULL')
                      ->Where('tbl_umkm.youtube IS NOT NULL');
            } else if ($sosial_media == 'false'){
                $query->where('tbl_umkm.facebook IS NULL')
                      ->Where('tbl_umkm.instagram IS NULL')
                      ->Where('tbl_umkm.youtube IS NULL');
            }

            return $query->findAll();
        }

        public function getTotalUmkmByStatus($status)
        {
            return $this->where('status', $status)->countAllResults();
        }

        public function getUmkmStatus($id)
        {
            return $this->select('tbl_umkm.status')
                        ->where(['tbl_umkm.id_umkm' => $id])
                        ->first();
        }
    }

?>