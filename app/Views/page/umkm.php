  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header pb-0">
              <h4>Data UMKM</h4>

            <div class="card-body px-0 pt-0 pb-2">
               <?php if (session()->getFlashdata('success')): ?>
                 <div class="alert alert-success text-white">
                   <?= session()->getFlashdata('success') ?>
                 </div>
              <?php endif; ?>

              <div class="d-flex justify-content-end">
                <form method="get" action="<?= base_url('umkm/cari') ?>" class="d-flex mx-4 mt-2">
                  <input type="text" class="form-control me-2" placeholder="Cari UMKM" name="keyword" style="height: 38px;">
                  <button class="btn btn-sm btn-info px-5" type="submit" style="margin-bottom: 0px; height: 38px;">Cari</button>
                </form>
                <button type="button" class="btn btn-secondary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom: 0px; height: 38px;">
                Filter UMKM
                </button>
              </div>

              <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter Data UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url("/umkm/filter") ?>" method="get">
                      <div class="form-group">
                        <label for="pendapatan">Pendapatan</label>
                        <select class="form-control" id="pendapatan" name="pendapatan">
                          <option value="">----Pilih Pendapatan----</option>
                          <option value="DESC">Pendapatan Tertinggi</option>
                          <option value="ASC">Pendapatan Terendah</option>
                        </select>
                       </div>

                       <div class="form-group">
                        <label for="sosial_media">Ketersedian Sosial Media</label>
                        <select class="form-control" id="sosial_media" name="sosial_media">
                          <option value="">----Pilih Ketersedian Sosial Media----</option>
                          <option value=true>UMKM Memiliki Sosial Media</option>
                          <option value=false>UMKM Tidak Memiliki Sosial Media</option>
                        </select>
                        </div>
                      </div>
                      
                    
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

              

            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Nama Pemilik</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">No HP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jumlah Pendapatan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Status</th>
                      <th class="text-secondary"></th>
                    </tr>
                  </thead>
                  <tbody>
          
                    <?php foreach ($umkm as $index => $item): ?>
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
                                            <h4 class="mb-0 text-sm"><?= $item['nama_pemilik'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['email'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= $item['no_hp'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm">Rp. <?= $item['total_pendapatan'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <?php if ($item['status'] == 'Belum Terverifikasi'): ?>
                                              <span class="badge bg-gradient-warning"><?= $item['status'] ?></span>
                                            <?php else: ?>
                                             <span class="badge bg-gradient-success"><?= $item['status'] ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle mb-0">
                                    <a href="/umkm/detail/<?= $item['id_umkm']?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <button class="btn btn-info btn-sm" style="margin: 0;">Detail</button>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach; ?>  
                    <?php if (empty($umkm)): ?>
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
  