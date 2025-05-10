<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Peminjaman Buku
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $pinjam['id_pinjam']; ?></h2>

                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Anggota</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $pinjam['nama']; ?></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Pinjam Buku</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $pinjam['judul']; ?></div> <!-- Ganti id_buku jadi judul -->
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Tanggal Pinjam</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $pinjam['tgl_pinjam']; ?></div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Tanggal Kembali</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $pinjam['tgl_kembali']; ?></div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('Pinjam') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>