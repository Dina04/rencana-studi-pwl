<style>
    body {
        background-color: #F5F5F5;
    }
</style>

<body>
    <div class="container mt-3">
        <?php if ($this->session->flashdata('hasil')) : ?>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('hasil'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="row mt-4">
                <div class="col-md-6">
                    <?php
                    $status_login = $this->session->userdata('status');
                    if ($status_login == 'admin') {
                    ?>
                        <a href="<?= base_url(); ?>dosen/tambah" class="btn btn-primary">Tambah Data Dosen</a>
                    <?php
                    } else {
                    ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-12">
                <h2>Daftar Dosen</h2>
                <table class="table table-striped table-bordered" id="listDosen">
                    <thead>
                        <tr style="background-color: #BDB76B">
                            <th scope="col">No</th>
                            <th scope="col">Nip</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dosen as $dsn) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dsn['nip'] ?></td>
                                <td><?= $dsn['nama_dosen'] ?></td>
                                <td><?= $dsn['jeniskelamin'] ?></td>
                                <td><?= $dsn['alamat'] ?></td>
                                <td><?= $dsn['email'] ?></td>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('status');
                                    if ($status_login == 'admin') {
                                    ?>
                                        <a href="<?= base_url() ?>dosen/edit/<?= $dsn['id_dosen'] ?>" class="btn btn-success">Edit</a>
                                        <a href="<?= base_url() ?>dosen/hapus/<?= $dsn['id_dosen'] ?>" onclick="return confirm('Apakah Anda Ingin Menghapus <?= $dsn['nama_dosen'] ?>?');" class="btn btn-danger">Hapus</a></td>
                            <?php
                                    } else {
                            ?>
                                <!-- <a href="<?= base_url(); ?>dosen/detail/<?= $ds->id_dosen  ?>" class="btn btn-primary btn-sm float-center">Detail</a>
                                <a href="<?= base_url(); ?>dosen/edit/<?= $ds->id_dosen  ?>" class="btn btn-success btn-sm float-right">Edit</a> -->
                            <?php
                                    }
                            ?>
                            </tr>

                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>