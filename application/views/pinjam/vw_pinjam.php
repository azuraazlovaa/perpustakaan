<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url() ?>Pinjam/tambah" class="btn btn-info mb-2">Tambah
                Peminjaman Buku</a></div>
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Anggota</td>
                        <td>Pinjam Buku</td>
                        <td>Tanggal Pinjam</td>
                        <td>Tanggal Kembali</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($pinjam as $p) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $p['nama']; ?></td> <!-- dari join anggota -->
                            <td><?= $p['judul']; ?></td> <!-- dari join buku -->
                            <td><?= $p['tgl_pinjam']; ?></td>
                            <td><?= $p['tgl_kembali']; ?></td>
                            <td>
                                <a href="<?= base_url('pinjam/hapus/') . $p['id_pinjam']; ?>" class="badge badge-danger">Hapus</a>
                                <a href="<?= base_url('pinjam/update/') . $p['id_pinjam']; ?>" class="badge badge-warning">Edit</a>
                                <a href="<?= base_url('pinjam/detail/') . $p['id_pinjam']; ?>" class="badge badge-info">Detail</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>