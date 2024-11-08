<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class LaporanModel extends Model
    {
        protected $table = 'tbl_laporan';
        protected $primaryKey = 'id_laporan';
        protected $useTimestamps = true;
        protected $allowedFields = ['id_laporan','tanggal_laporan','nama_laporan'];

    }

?>