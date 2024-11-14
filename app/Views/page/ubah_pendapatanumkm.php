<?= $this->extend('layout/template_navbar') ?>

<?= $this->section('content') ?>


  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Ubah Pendapatan UMKM</h4>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
              <div class="container">
                  <form action="<?= base_url("pendapatan-umkm/update") ?>" method="post">
                      <input type="hidden" name="id_pendapatanumkm" value="<?= $pendapatanumkm['id_pendapatanumkm'] ?>">
                      <?= csrf_field() ?>
                      <div class="form-group">
                            <label for="periode">Periode Pendapatan</label>
                            <input type="date" class="form-control" id="periode" name="periode" value="<?= $pendapatanumkm['periode'] ?>" required autofocus>
                      </div>
                      <div class="form-group">
                            <label for="jumlah_pendapatan_umkm">Jumlah Pendapatan</label>
                            <input type="text" class="form-control" id="jumlah_pendapatan_umkm" name="jumlah_pendapatan_umkm" value="<?= $pendapatanumkm['jumlah_pendapatan_umkm'] ?>" required>
                      </div>
                    
                      <div class="form-group text-end">
                          <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                      </div>
                  </form>
              </div>   
          </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
