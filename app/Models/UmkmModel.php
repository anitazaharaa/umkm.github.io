<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class UmkmModel extends Model
    {
        protected $table = 'tbl_umkm';
        protected $primaryKey = 'id_umkm';
        protected $useTimestamps = true;
        protected $allowedFields = ['nama_pemilik', 'NIK', 'email','no_hp','id_kategori','alamat_umkm', 'status', 'username'];

    }

?>