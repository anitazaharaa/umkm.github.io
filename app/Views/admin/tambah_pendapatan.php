<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content') ?>


  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h4>Tambah Pendapatan UMKM</h4>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
              <div class="container">
                  <form action="/admin/user/simpan" method="post">
                      <?= csrf_field() ?>
                      <div class="form-group">
                            <label for="tanggal_laporan">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" required autofocus>
                     </div>
                      <?php
                        $kecamatan = ["Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karang Jaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju"];

                        foreach ($kecamatan as $name) :
                            $id = strtolower(str_replace(' ', '', $name));?>
                            <div class="form-group">
                                <label for="<?= $id ?>"><?= $name ?></label>
                                <input type="text" class="form-control" id="<?= $id ?>" name="<?= $id ?>" required>
                            </div>
                        <?php endforeach;?>

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
