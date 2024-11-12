<?= $this->extend('layout/template_navbar') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header pb-0">
            <h4>Data Laporan UMKM</h4>

            <div class="d-flex justify-content-between">
              <a href="<?= base_url("laporan/tambah") ?>">
                <button class="btn btn-success btn-sm my-3">Tambah Laporan Pendapatan UMKM</button>
              </a>
              <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Cetak Laporan Tahunan
              </button>
            </div>

            <!-- Button trigger modal -->
            

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laporan Pendapatan Tahunan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url("/laporan/generate-laporan") ?>" method="get">
                      <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun" required>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                        </select>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <div class="card-body px-0 pt-0 pb-2">
             <?php if (session()->getFlashdata('success')): ?>
               <div class="alert alert-success text-white">
                 <?= session()->getFlashdata('success') ?>
               </div>
            <?php endif; ?>
          </div>
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Nama Laporan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Periode</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tanggal Dibuat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tanggal Diubah</th>
                    <th class="text-secondary"></th>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach ($laporan as $index => $item): ?>
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
                                            <h4 class="mb-0 text-sm"><?= $item['nama_laporan'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= date('F Y', strtotime($item['tanggal_laporan'])) ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= date('d F Y', strtotime($item['created_at'])) ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm"><?= date('d F Y', strtotime($item['created_at'])) ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle mb-0">
                                    <a href="/laporan/detail/<?= $item['id_laporan']?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <button class="btn btn-info btn-sm" style="margin: 0;">Detail</button>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach; ?>  
                </tbody> 
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>
