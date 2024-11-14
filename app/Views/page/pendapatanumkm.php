<?= $this->extend('layout/template_navbar') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header pb-0">
            <h4>Data Pendapatan UMKM</h4>
            <div class="card-body px-0 pt-0 pb-2">
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

              <?php if ($lastmonth != date('m') || $lastmonth == ""): ?>  
                <div class="alert alert-danger text-white text-center">
                  Pendapatan Bulan ini belum dilaporkan
                </div>
              <?php endif; ?>
              
            <?php if ($status == "Terverifikasi"): ?>
            <div class="d-flex justify-content-start">
              <a href="<?= base_url("pendapatan-umkm/tambah") ?>">
                <button class="btn btn-success btn-sm my-3">Tambah Pendapatan UMKM</button>
              </a>
            </div>
            <?php endif; ?>

          </div>
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Periode</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jumlah Pendapatan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tanggal Dibuat</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tanggal Diubah</th>
                    <th class="text-secondary"></th>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach ($pendapatanumkm as $index => $item): ?>
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
                                            <h4 class="mb-0 text-sm"><?= date('F Y', strtotime($item['periode'])) ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h4 class="mb-0 text-sm">Rp. <?= $item['jumlah_pendapatan_umkm'] ?></h4>
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
                                    <a href="/pendapatan-umkm/ubah/<?= $item['id_pendapatanumkm']?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit">
                                        <button class="btn btn-primary btn-sm" style="margin: 0;">Edit</button>
                                    </a>
                                    <a href="/pendapatan-umkm/hapus/<?= $item['id_pendapatanumkm']?>" class="text-secondary font-weight-bold text-xs hapusbtn" data-toggle="tooltip" data-original-title="Hapus">
                                        <button class="btn btn-danger btn-sm" style="margin: 0;">Hapus</button>
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
  
  <?= $this->section('sweetalert') ?>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="/js/hapusalert.js"></script>

  <?= $this->endSection() ?>