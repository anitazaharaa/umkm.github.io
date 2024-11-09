<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class PenggunaModel extends Model
    {
        protected $table = 'tbl_pengguna';
        protected $primaryKey = 'id_pengguna';
        protected $useTimestamps = true;
        protected $allowedFields = ['id_pengguna','nama_pengguna', 'username', 'password', 'role'];
    }

?>