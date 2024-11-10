  <?= $this->extend('layout/template_admin') ?>

  <?= $this->section('content') ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0">
              <h4>Tambah Pengguna</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
                <div class="container">
                                <?php if ($validation = session()->getFlashdata('validation')): ?>
                            <div class="alert alert-warning text-white">
                                <ul>
                                    <?php foreach ($validation as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <form action="/admin/user/simpan" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nama_pengguna">Nama Pengguna</label>
                            <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Ulangi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="">---Pilih Role---</option>
                                <option value="administrator">Administrator</option>
                                <option value="petugas">Petugas</option>
                            </select>
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
  