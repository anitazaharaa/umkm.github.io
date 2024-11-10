<?= $this->extend('layout/template_navbar') ?>

<?= $this->section('content') ?>


  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Detail Laporan Pendapatan</h4>
            <div class="card-body px-0 pt-0 pb-2">
               <?php if (session()->getFlashdata('success')): ?>
                 <div class="alert alert-success text-white mt-3">
                   <?= session()->getFlashdata('success') ?>
                 </div>
              <?php endif; ?>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
              <div class="container">
                      <?= csrf_field() ?>
                      <div class="form-group">
                            <label for="nama_laporan">Nama Laporan</label>
                            <input type="text" class="form-control" id="nama_laporan" name="nama_laporan" value="<?= $laporan['nama_laporan'] ?>" disabled>
                      </div>
                      <div class="form-group">
                            <label for="tanggal_laporan">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" value="<?= $laporan['tanggal_laporan'] ?>" disabled>
                      </div>
                      <div class="form-group text-end">
                          <a href="/admin/laporan/ubah/<?= $laporan['id_laporan'] ?>"">
                            <button class="btn btn-sm btn-primary">Ubah</button>
                          </a>
                          <a href="/admin/laporan/hapus/<?= $laporan['id_laporan'] ?>" class="hapusbtn">
                            <button class="btn btn-sm btn-danger">Hapus</button>
                          </a>
                      </div>
                      <hr class="horizontal dark">
                      <h4>Pendapatan</h4>
                      <?php
                        $kecamatan = ["Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karangjaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju"];
                        foreach ($pendapatan as $p) :
                            ?>
                           <div class="form-group">
                               <label for="<?= $p['nama_kecamatan'] ?>"><?= $p['nama_kecamatan'] ?></label>
                               <input type="text" class="form-control" id="<?= $p['nama_kecamatan'] ?>" name="<?= $p['nama_kecamatan'] ?>" value="<?= $p['jumlah_pendapatan'] ?>" disabled>
                           </div>
                       <?php endforeach;?>
                      
  
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