<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class PendapatanUmkmModel extends Model
    {
        protected $table = 'tbl_pendapatan_umkm';
        protected $primaryKey = 'id_pendapatanumkm';
        protected $useTimestamps = true;
        protected $allowedFields = ['id_pendapatanumkm','id_umkm', 'jumlah_pendapatan_umkm', 'periode'];

        public function pendapatanFindByUmkm($id_umkm)
        {
            return $this->where('id_umkm', $id_umkm)->findAll();
        }

        public function getMonthMax($id_umkm)
        {
            return $this->select('MONTH(periode) as month')->where('id_umkm', $id_umkm)->orderBy('periode', 'DESC')->first();
        }
    }

?>