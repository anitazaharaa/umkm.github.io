  <?= $this->extend('layout/template_admin') ?>

  <?= $this->section('content') ?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-">
            <div class="card-header pb-0">
              <h6>User Management</h6>
            </div>

              <?php if (session()->getFlashdata('success')): ?>
                 <div class="alert alert-success mx-3 text-white">
                   <?= session()->getFlashdata('success') ?>
                 </div>
              <?php endif; ?>

            <div class="d-flex justify-content-between">
              <a href="/admin/user/tambah">
                <button class="btn btn-success btn-sm mx-4 mt-2">Tambah Kategori</button>
              </a>
              <form method="get" action="/admin/user/cari" class="d-flex mx-4 mt-2">
                <input type="text" class="form-control me-2" placeholder="Cari User" name="keyword" style="height: 38px;">
                <button class="btn btn-sm btn-info px-5" type="submit" style="margin-bottom: 0px; height: 38px;">Cari</button>
              </form>
            </div>
            

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                      <th class="text-secondary opacity-4"></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($user as $index => $item): ?>
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
                                            <h4 class="mb-0 text-sm"><?= $item['nama_pengguna'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['username'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['role'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle mb-0">
                                    <a href="/admin/user/ubah/<?= $item['id']?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <button class="btn btn-primary btn-sm" style="margin: 0;">Edit</button>
                                    </a>
                                    <a href="/admin/user/hapus/<?= $item['id']?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                                        <button class="btn btn-danger btn-sm" style="margin: 0;">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($user)): ?>
                          <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan</td>
                          </tr>
                        <?php endif; ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?= $this->endSection() ?>
  