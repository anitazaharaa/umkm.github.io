<?= $this->extend('layout/template_navbar') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('produk/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="id_kategori">
                                <option value="">---Pilih Kategori----</option>
                                <?php foreach ($kategori as $kat): ?>
                                    <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga">
                        </div>
                        
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile p-3">
                <div class="form-group">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; height: auto;">
                        </div>
                <div class="form-group">
                            <label for="foto_produk">Foto Produk</label>
                            <input type="file" class="form-control" name="foto_produk" id="foto_produk" accept="image/*" onchange="previewImage(event)">
                </div>
                </form>       
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('sweetalert') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="/js/hapusalert.js"></script>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

<?= $this->endSection() ?>