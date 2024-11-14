  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <h4>Ubah Data UMKM</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
                <div class="container">
                    <form action="<?= base_url('umkm/update') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_umkm" value="<?= $umkm['id_umkm'] ?>">
                        <h5 class="mt-4 mb-2">Identitas Pemilik</h5>
                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <input type="text" class="form-control" value="<?= $umkm['nama_pemilik'] ?>" id="nama_pemilik" name="nama_pemilik" required >
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" value="<?= $umkm['NIK'] ?>" id="nik" name="NIK" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" value="<?= $umkm['email'] ?>" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" value="<?= $umkm['no_hp'] ?>" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_umkm">Alamat</label>
                            <textarea class="form-control" id="alamat_umkm" name="alamat_umkm" required><?= $umkm['alamat_umkm'] ?></textarea>  
                        </div>
                        <h5 class="mt-4 mb-2">Identitas UMKM</h5>
                        <div class="form-group">
                            <label for="nama_umkm">Nama UMKM</label>
                            <input type="text" class="form-control" value="<?= $umkm['nama_umkm'] ?>" name="nama_umkm" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Terverifikasi" <?= $umkm['status'] == 'Terverifikasi' ? 'selected' : '' ?> >Terverifikasi</option>
                                <option value="Belum Terverifikasi" <?= $umkm['status'] == 'Belum Terverifikasi' ? 'selected' : '' ?>>Belum Terverifikasi</option>
                            </select>
                        </div>
                        <h5 class="mt-4 mb-2">Sosial Media</h5>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Facebook</label>
                              <input class="form-control" type="text" name="facebook" value="<?= $umkm['facebook'] ?>" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Instagram</label>
                              <input class="form-control" type="text" name="instagram" value="<?= $umkm['instagram'] ?>" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Youtube</label>
                              <input class="form-control" type="text" name="youtube" value="<?= $umkm['youtube'] ?>" required>
                            </div>
                          </div>
                        
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
  