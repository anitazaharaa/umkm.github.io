  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <h4>Detail UMKM</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
                <div class="container">
                         <?php if (session()->getFlashdata('success')): ?>
                         <div class="alert alert-success text-white">
                            <?= session()->getFlashdata('success') ?>
                           </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Pemilik</label>
                            <input type="text" class="form-control" value="<?= $umkm['nama_pemilik'] ?>" id="nama_kategori" name="nama_kategori" disabled >
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">NIK</label>
                            <input type="text" class="form-control" value="<?= $umkm['NIK'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">E-Mail</label>
                            <input type="text" class="form-control" value="<?= $umkm['email'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">No HP</label>
                            <input type="text" class="form-control" value="<?= $umkm['no_hp'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Alamat</label>
                            <textarea class="form-control" id="alamat_umkm" name="alamat_umkm" disabled><?= $umkm['alamat_umkm'] ?></textarea>  
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Status</label>
                            <input type="text" class="form-control" value="<?= $umkm['status'] ?>" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Dibuat</label>
                            <input type="text" class="form-control" value="<?= $umkm['created_at'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Terakhir Update</label>
                            <input type="text" class="form-control" value="<?= $umkm['updated_at'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>
                        <div class="d-flex justify-content-between">

                        <a href="<?= base_url("umkm/verifikasi/") . $umkm['id_umkm'] ?>">
                        <?php if ($umkm['status'] == 'Belum Terverifikasi'): ?>
                            <button class="btn btn-info btn-sm">Verifikasi UMKM</button>
                        <?php else: ?>
                            <button class="btn btn-danger btn-sm">Batalkan Verifikasi</button>
                          </a>
                        <?php endif; ?>
                        <div class="form-group text-end">
                            <a href="<?= base_url('/umkm/ubah/' . $umkm['id_umkm']) ?>">
                                <button class="btn btn-sm btn-primary">Ubah Data</button>
                            </a>
                            <a href="<?= base_url('/umkm/hapus/' . $umkm['id_umkm'] . '/' . $umkm['id_pengguna']) ?>">
                                <button class="btn btn-sm btn-danger hapusbtn">Hapus Data</button>
                            </a>
                        </div>
                      </div>
                        
                </div>   
            </div>
        </div>
      </div>
    </div>
  <?= $this->endSection() ?>
  
<?= $this->section('sweetalert') ?>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="/js/hapusalert.js"></script>

<?= $this->endSection() ?>