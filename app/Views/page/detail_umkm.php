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
                        <h5 class="mt-4 mb-2">Identitas Pemilik</h5>
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
                            <label for="nama_kategori">Dibuat</label>
                            <input type="text" class="form-control" value="<?= $umkm['created_at'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Terakhir Update</label>
                            <input type="text" class="form-control" value="<?= $umkm['updated_at'] ?>" id="nama_kategori" name="nama_kategori" disabled>
                        </div>

                        <h5 class="mt-4 mb-2">Identitas UMKM</h5>
                        <div class="form-group">
                            <label for="nama_kategori">Nama UMKM</label>
                            <input type="text" class="form-control" value="<?= $umkm['nama_umkm'] ?>" name="nama_kategori" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Status</label>
                            <input type="text" class="form-control" value="<?= $umkm['status'] ?>" name="nama_kategori" disabled>
                        </div>
                        <h5 class="mt-4 mb-2">Sosial Media</h5>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Facebook</label>
                              <input class="form-control" type="text" value="<?= $umkm['facebook'] ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Instagram</label>
                              <input class="form-control" type="text" value="<?= $umkm['instagram'] ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Youtube</label>
                              <input class="form-control" type="text" value="<?= $umkm['youtube'] ?>" disabled>
                            </div>
                          </div>
                      </div>

                      <h5 class="mt-4 mb-2">Pendapatan UMKM</h5>


                      <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Periode</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Pendapatan</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($pendapatanumkm as $index => $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $index + 1 ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= date('F Y', strtotime($item['periode'])) ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['jumlah_pendapatan_umkm'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                          <?php if (empty($pendapatanumkm)): ?>
                            <tr>
                              <td colspan="3" class="text-center">Data tidak ditemukan</td>
                            </tr>
                          <?php endif; ?>    
                    </tbody>
                  </table>
                </div>
                        
                        <div class="d-flex justify-content-between mt-5">

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
                            <a href="<?= base_url('/umkm/hapus/' . $umkm['id_umkm'] . '/' . $umkm['id_pengguna']) ?>" class="hapusbtn">
                                <button class="btn btn-sm btn-danger">Hapus Data</button>
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