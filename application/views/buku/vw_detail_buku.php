<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Buku
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?=$buku['judul']; ?></h2>
                    <div class="row">
                        <div class="col-md-4">Pengarang</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?=$buku['pengarang']; ?></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">Kategori</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?=$buku['kategori']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Penerbit</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?=$buku['penerbit']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Tahun</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?=$buku['tahun']; ?></div>
                    </div>
                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('buku') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>