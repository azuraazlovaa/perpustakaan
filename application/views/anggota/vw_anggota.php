<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url() ?>Anggota/tambah" class="btn btn-info mb-2">Tambah
                Anggota</a></div>
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>No HP</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($anggota as $us) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $us['nama']; ?></td>
                            <td><?= $us['alamat']; ?></td>
                            <td><?= $us['no_telp']; ?></td>
                            <td>
                                <a href="<?= base_url('anggota/hapus/') . $us['id_anggota']; ?>" class="badge badge-danger">Hapus</a>
                                <a href="<?= base_url('anggota/update/') . $us['id_anggota']; ?>" class="badge badge-warning">Edit</a>
                                <a href="<?= base_url('anggota/detail/') . $us['id_anggota']; ?>" class="badge badge-info">Detail</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>