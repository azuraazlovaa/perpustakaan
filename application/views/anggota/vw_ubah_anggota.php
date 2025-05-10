<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Anggota
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $anggota['id_anggota']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Anggota</label>
                            <input type="text" name="nama" value="<?= $anggota['nama']; ?>" class="form-control" id="nama" placeholder="Nama Anggota">
                            <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="Laki-laki" <?php if ($anggota['jenis_kelamin'] == "Laki-laki") {
                                                                echo "selected";
                                                            } ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($anggota['jenis_kelamin'] == "Perempuan") {
                                                                echo "selected";
                                                            } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?= $anggota['alamat']; ?>" class="form-control" id="alamat" placeholder="Alamat">
                            <?= form_error('alamat', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No HP</label>
                            <input type="text" name="no_telp" value="<?= $anggota['no_telp']; ?>" class="form-control" id="no_telp" placeholder="No HP">
                            <?= form_error('no_telp', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('anggota') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="update" class="btn btn-primary float-right">edit Anggota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>