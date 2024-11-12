<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class PendapatanModel extends Model
    {
        protected $table = 'tbl_pendapatan';
        protected $primaryKey = 'id_pendapatan';
        protected $allowedFields = ['id_laporan','nama_kecamatan', 'jumlah_pendapatan', 'periode'];

        public function getPendapatanByMonthYear($month, $year)
        {
            return $this
                ->where('MONTH(periode)', $month)
                ->where('YEAR(periode)', $year)
                ->orderBy('nama_kecamatan', 'ASC')
                ->findAll();
        }

        public function getPendapatanByYear($year){
            return $this
                ->where('YEAR(periode)', $year)
                ->findAll();
        }

        public function getMonthByYear($year){
            return $this
                ->select('MONTH(periode) as month')
                ->where('YEAR(periode)', $year)
                ->groupBy('MONTH(periode)')
                ->findAll();
        }
    }

?>