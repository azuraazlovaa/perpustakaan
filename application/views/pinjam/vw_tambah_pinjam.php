<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Peminjaman Buku
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pinjam/tambah'); ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <select name="id_anggota" required>
                                <?php foreach ($anggota as $a): ?>
                                    <option value="<?= $a['id_anggota']; ?>"><?= $a['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_anggota', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                        <label>Buku</label>
                        <select name="id_buku" required>
                            <?php foreach ($buku as $b): ?>
                                <option value="<?= $b['id_buku']; ?>"><?= $b['judul']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_buku', '<small class="text-danger p1-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" placeholder="Tanggal Pinjam">
                    <?= form_error('tgl_pinjam', '<small class="text-danger p1-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tgl_kembali">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" placeholder="Tanggal Kembali">
                    <?= form_error('tgl_kembali', '<small class="text-danger p1-3">', '</small>'); ?>
                </div>
                <a href="<?= base_url('Pinjam') ?>" class="btn btn-danger">Tutup</a>
                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah pinjam</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>