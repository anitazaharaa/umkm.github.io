  <?= $this->extend('layout/template_navbar') ?>

  <?= $this->section('content') ?>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0">
              <h4>Tambah Kategori</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3 mx-2">
                <div class="container">
                    <form action="<?= base_url('kategori/simpan') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required autofocus>
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
  <?= $this->endSection() ?>
  