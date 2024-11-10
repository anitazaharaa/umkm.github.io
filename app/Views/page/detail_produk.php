  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Detail Produk</p>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" value="<?= $produk['nama_produk'] ?>" id="nama_produk" disabled >
                </div>
                <div class="form-group">
                    <label for="nama_kategori">Kategori</label>
                    <input type="text" class="form-control" value="<?= $produk['nama_kategori'] ?>" id="nama_kategori" disabled >
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" value="<?= 'Rp. ' . $produk['harga'] ?>" id="harga" disabled >
                </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Dibuat</label>
                      <input class="form-control" type="text" value="<?= $produk['created_at'] ?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Terakhir diubah</label>
                      <input class="form-control" type="text" value="<?= $produk['updated_at'] ?>" disabled>
                    </div>
                  </div>
              </div>
                </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Informasi Pemilik UMKM</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Pemilik</label>
                    <input class="form-control" type="text" value="<?= $produk['nama_pemilik'] ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text" value="<?= $produk['alamat_umkm'] ?>" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No HP</label>
                    <input class="form-control" type="text" value="<?= $produk['no_hp'] ?>" disabled>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <div class="form-group text-end">
                <a href="/admin/produk/hapus/<?= $produk['id_produk'] ?>" class="hapusbtn">
                  <button class="btn btn-danger btn-sm text-end">Hapus</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile p-3">
            <h4>Foto Produk</h4>
            <img src="/img/produk/ayamtaliwang.jpg" alt="Image placeholder" class="card-img-top mt-2">           
          </div>
        </div>
      </div>
    </div>
  <?= $this->endSection() ?>
  
  <?= $this->section('sweetalert') ?>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="/js/hapusalert.js"></script>

<?= $this->endSection() ?>