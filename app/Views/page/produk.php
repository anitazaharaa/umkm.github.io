  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header pb-0">
              <h4>Data Produk</h4>
              <?php if (session()->getFlashdata('success')): ?>
                 <div class="alert alert-success text-white">
                   <?= session()->getFlashdata('success') ?>
                 </div>
              <?php endif; ?>
              <?php if ($status == "Belum Terverifikasi"): ?>
                <div class="alert alert-warning text-white text-center">
                  UMKM ini belum Terverifikasi
                </div>
              <?php endif; ?>
            <div class="card-body px-0 pt-0 pb-2">
              
              <?php if ($role == "administrator"): ?>
                <div class="d-flex justify-content-end" ?>
                  <form method="get" action="<?= base_url("/produk/cari") ?>" class="d-flex mt-2 text-end">
                      <input type="text" class="form-control me-2" placeholder="Cari Produk" name="keyword" style="height: 38px;">
                      <button class="btn btn-sm btn-info px-5" type="submit" style="margin-bottom: 0px; height: 38px;">Cari</button>
                  </form>
                </div>
              <?php endif; ?>

              <?php if ($role == "pelaku_umkm"): ?>
                <div class="d-flex justify-content-<?= $status == "Terverifikasi" ? "between" : "end" ?>" ?>
                  <?php if ($status == "Terverifikasi"): ?>
                  <a href="<?= base_url('/produk/tambah') ?>">
                    <button class="btn btn-success btn-sm mt-2">Tambah Produk</button>
                  </a>
                  <?php endif; ?>

                  <form method="get" action="<?= base_url("/produk/cari") ?>" class="d-flex mt-2 text-end">
                      <input type="text" class="form-control me-2" placeholder="Cari Produk" name="keyword" style="height: 38px;">
                      <button class="btn btn-sm btn-info px-5" type="submit" style="margin-bottom: 0px; height: 38px;">Cari</button>
                  </form>
                </div>
              <?php endif; ?>
                

              
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Foto Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Nama Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Kategori</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Harga</th>
                      <th class="text-secondary"></th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($produk as $index => $item): ?>
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
                                            <img src="/img/uploads/<?= $item['foto_produk'] ?>" alt="<?= $item['nama_produk'] ?>" class="img-fluid rounded" style="max-width: 100px;">
                            
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['nama_produk'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['nama_kategori'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['harga'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle mb-0">
                                    <a href="/produk/detail/<?= $item['id_produk']?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <button class="btn btn-info btn-sm" style="margin: 0;">Detail</button>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach; ?>  
                    <?php if (empty($produk)): ?>
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
  