<?= $this->extend('layout/template_navbar') ?>

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
                  <form action="/admin/laporan/simpan" method="post">
                      <?= csrf_field() ?>
                      <div class="form-group">
                            <label for="tanggal_laporan">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" required autofocus>
                     </div>
                      <?php
                        $kecamatan = ["Bantarkalong", "Bojongasih", "Bojonggambir", "Ciawi", "Cibalong", "Cigalontang", "Cikalong", "Cikatomas", "Cineam", "Cipatujah", "Cisayong", "Culamega", "Gunungtanjung", "Jamanis", "Jatiwaras", "Kadipaten", "Karangjaya", "Karangnunggal", "Leuwisari", "Mangunreja", "Manonjaya", "Padakembang", "Pagerageung", "Pancatengah", "Parungponteng", "Puspahiang", "Rajapolah", "Salawu", "Salopa", "Sariwangi", "Singaparna", "Sodonghilir", "Sukahening", "Sukaraja", "Sukarame", "Sukaratu", "Sukaresik", "Tanjungjaya", "Taraju"];
                        $harga = 10000;
                        foreach ($kecamatan as $name) :
                             ?>
                            <div class="form-group">
                                <label for="<?= $name ?>"><?= $name ?></label>
                                <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= $harga = $harga + 50000 ?>" required>
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
