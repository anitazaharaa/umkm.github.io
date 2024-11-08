<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class KategoriModel extends Model
    {
        protected $table = 'tbl_kategori';
        protected $primaryKey = 'id_kategori';
        protected $allowedFields = ['nama_kategori'];

        public function getKategoriAndCountProduk()
        {
            $this->select('tbl_kategori.*, COUNT(tbl_produk.id_produk) as total_produk');
            $this->join('tbl_produk', 'tbl_produk.id_kategori = tbl_kategori.id_kategori', 'left');
            $this->groupBy('tbl_kategori.id_kategori');
            return $this->findAll();
        }
    }

?>