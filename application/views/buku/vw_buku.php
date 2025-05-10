<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url() ?>Buku/tambah" class="btn btn-info mb-2">Tambah
                buku</a></div>
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Judul</td>
                        <td>Pengarang</td>
                        <td>kategori</td>
                        <td>penerbit</td>
                        <td>Tahun</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($buku as $us) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $us['judul']; ?></td>
                            <td><?= $us['pengarang']; ?></td>
                            <td><?= $us['kategori']; ?></td>
                            <td><?= $us['penerbit']; ?></td>
                            <td><?= $us['tahun']; ?></td>
                            <td>
                                <a href="<?= base_url('buku/hapus/') . $us['id_buku']; ?>" class="badge badge-danger">Hapus</a>
                                <a href="<?= base_url('buku/update/') . $us['id_buku']; ?>" class="badge badge-warning">Edit</a>
                                <a href="<?= base_url('buku/detail/') . $us['id_buku']; ?>" class="badge badge-info">Detail</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>