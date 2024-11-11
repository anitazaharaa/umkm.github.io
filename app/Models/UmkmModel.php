<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class UmkmModel extends Model
    {
        protected $table = 'tbl_umkm';
        protected $primaryKey = 'id_umkm';
        protected $useTimestamps = true;
        protected $allowedFields = ['nama_pemilik', 'NIK', 'email','no_hp','id_kategori','alamat_umkm', 'id_pengguna', 'status', 'username'];

        public function getTotalUmkmByStatus($status)
        {
            return $this->where('status', $status)->countAllResults();
        }

        public function getUmkmVerif($id)
        {
            return $this->select('tbl_umkm.status')
                        ->where(['tbl_umkm.id_umkm' => $id])
                        ->first();
        }
    }

?>