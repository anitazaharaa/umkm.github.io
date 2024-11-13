<?= $this->extend('layout/template_navbar') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Ubah Pengguna</h4>
                </div>
                <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
                <?php if ($validation = session()->getFlashdata('validation')): ?>
                            <div class="alert alert-warning text-white">
                                <ul>
                                    <?php foreach ($validation as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="container">
                                <form action="<?= base_url("users/update") ?>" method="post">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                                        <div class="form-group">
                                                <label for="nama_pengguna">Nama Pengguna</label>
                                                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?= $pengguna['nama_pengguna'] ?>" required autofocus>
                                        </div>
                                        <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $pengguna['username'] ?>" required>
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
                                                        <option value="">---Pilih Role---</option>
                                                        <option value="administrator" <?= $pengguna['role'] == 'administrator' ? 'selected' : '' ?>>Administrator</option>
                                                        <option value="pelaku_umkm" <?= $pengguna['role'] == 'pelaku_umkm' ? 'selected' : '' ?>>Pelaku Umkm</option>
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
</div>

<?= $this->endSection() ?>