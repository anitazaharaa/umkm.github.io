<?= $this->extend('layout/template_admin') ?>

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
                  <form action="/admin/laporan/update" method="post">
                      <?= csrf_field() ?>
                      <input type="hidden" name="id_laporan" value="<?= $laporan['id_laporan'] ?>">
                      <div class="form-group">
                            <label for="tanggal_laporan">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" value="<?= $laporan['tanggal_laporan'] ?>" required autofocus>
                     </div>
                      <?php
                        foreach ($pendapatan as $p) :
                            ?>
                           <div class="form-group">
                               <label for="<?= $p['nama_kecamatan'] ?>"><?= $p['nama_kecamatan'] ?></label>
                               <input type="text" class="form-control" id="<?= $p['nama_kecamatan'] ?>" name="<?= $p['nama_kecamatan'] ?>" value="<?= $p['jumlah_pendapatan'] ?>">
                           </div>
                       <?php endforeach;?>

                      <div class="form-group text-end">
                          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                      </div>
                  </form>
              </div>   
          </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
