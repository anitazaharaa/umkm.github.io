<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class PenggunaModel extends Model
    {
        protected $table = 'tbl_pengguna';
        protected $primaryKey = 'id';
        protected $useTimestamps = true;
        protected $allowedFields = ['nama_pengguna', 'username', 'email', 'password', 'role'];

    }

?>