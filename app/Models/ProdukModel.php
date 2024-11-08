<?php 

    namespace App\Models;

    use CodeIgniter\Model;

    class ProdukModel extends Model
    {
        protected $table = 'tbl_produk';
        protected $primaryKey = 'id_produk';
        protected $useTimestamps = true;
        protected $allowedFields = ['id_umkm', 'nama_produk', 'id_kategori','harga','foto_produk'];

        public function getProdukWithKategori()
        {
            return $this->select('tbl_produk.*, tbl_kategori.nama_kategori')
                        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori')
                        ->findAll();
        }

        public function getProdukDetail($id_produk = false)
        {
            return $this->select('tbl_produk.*, tbl_kategori.nama_kategori, tbl_umkm.nama_pemilik, tbl_umkm.alamat_umkm, tbl_umkm.no_hp')
                ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori')
                ->join('tbl_umkm', 'tbl_umkm.id_umkm = tbl_produk.id_umkm')
                ->where(['id_produk' => $id_produk])
                ->first();
        }

        public function getProdukByKategori($id_kategori)
        {
            return $this->select('tbl_produk.*, tbl_kategori.nama_kategori')
                        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori')
                        ->where(['tbl_produk.id_kategori' => $id_kategori])
                        ->findAll();
        }

        public function searchProduk($keyword)
        {
            return $this->select('tbl_produk.*, tbl_kategori.nama_kategori')
                        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori')
                        ->like('nama_produk', $keyword)
                        ->findAll();
        }


    
    }

?>