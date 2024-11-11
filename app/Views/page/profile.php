  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Profile</p>
              </div>
                              <?php if (session()->getFlashdata('success')): ?>
                         <div class="alert alert-success text-white mt-4">
                            <?= session()->getFlashdata('success') ?>
                           </div>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url("/profile") ?>" method="POST">
                <input type="hidden" name="id_pengguna" value="<?= $profile['id_pengguna'] ?>">
                <div class="form-group">
                    <label for="nama_pengguna">Nama</label>
                    <input type="text" class="form-control" name="nama_pengguna" value="<?= $profile['nama_pengguna'] ?>" id="nama_pengguna">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $profile['username'] ?>" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                </div>
                <div class="form-group">
                    <label for="password_ulang">Ulangi Password</label>
                    <input type="password" class="form-control" id="password_ulang" name="password_ulang">
                </div>
                <div class="form-group">
                       <label for="role">Role</label>
                       <select class="form-control" name="role" id="role">
                            <option value="administrator" <?= $profile['role'] == 'administrator' ? 'selected' : '' ?>>Administrator</option>
                            <option value="petugas" <?= $profile['role'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                        </select>
                     </div>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Dibuat</label>
                      <input class="form-control" type="text" value="<?= $profile['created_at'] ?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Terakhir diubah</label>
                      <input class="form-control" type="text" value="<?= $profile['updated_at'] ?>" disabled>
                    </div>
                  </div>
              </div>
              <div class="form-group text-end">
                    
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?= $this->endSection() ?>
  