<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Buku
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $buku['id_buku']; ?>">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" value="<?= $buku['judul']; ?>" class="form-control" id="judul" placeholder="Judul">
                            <?= form_error('judul', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" value="<?= $buku['pengarang']; ?>" class="form-control" id="pengarang" placeholder="Pengarang">
                            <?= form_error('pengarang', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" value="<?= $buku['kategori']; ?>" class="form-control" id="kategori" placeholder="Kategori">
                            <?= form_error('kategori', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" value="<?= $buku['penerbit']; ?>" class="form-control" id="penerbit" placeholder="Penerbit">
                            <?= form_error('penerbit', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" value="<?= $buku['tahun']; ?>" class="form-control" id="tahun" placeholder="Tahun">
                            <?= form_error('tahun', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('buku') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="update" class="btn btn-primary float-right">edit Buku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>