<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class PendapatanModel extends Model
    {
        protected $table = 'tbl_pendapatan';
        protected $primaryKey = 'id_pendapatan';
        protected $useTimestamps = true;
        protected $allowedFields = ['nama_kecamatan', 'jumlah_pendapatan', 'periode'];

        public function getPendapatanByMonthYear($month, $year)
        {
            return $this
                ->where('MONTH(periode)', $month)
                ->where('YEAR(periode)', $year)
                ->orderBy('nama_kecamatan', 'ASC')
                ->findAll();
        }
    }

?>