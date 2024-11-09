<?= $this->extend('layout/template_home') ?>

<?= $this->section('content') ?>
<main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Selamat Datang di Sistem Informasi UMKM Kabupaten Tasikmalaya</h1>
                    <p class="text-lead text-white">Mempermudah dalam melakukan pendataan dan managemen UMKM.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h4>Daftar UMKM</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($validation = session()->getFlashdata('validation')): ?>
                            <div class="alert alert-warning text-white">
                                <ul>
                                    <?php foreach ($validation as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form role="form" action="<?= base_url('home/simpan') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik" aria-label="nama_pemilik" value="<?= old('nama_pemilik') ?>" required autofocus>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="NIK" placeholder="NIK" aria-label="NIK" value="<?= old('NIK') ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" value="<?= old('email') ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="no_hp" placeholder="No HP Aktif" aria-label="no_hp" value="<?= old('no_hp') ?>" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="alamat_umkm" placeholder="Alamat UMKM" aria-label="Alamat UMKM" required><?= old('alamat_umkm') ?></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username" aria-label="username" value="<?= old('username') ?>" required>
                                <small> Username harus minimal 5 karakter</small>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" required>
                                <small> Password harus minimal 6 karakter</small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>