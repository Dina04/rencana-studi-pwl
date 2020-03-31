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
                    <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
                </div>
            </div>
            <div class="col-lg-12">
                <h2>Daftar Mahasiswa</h2>
                <table class="table table-striped table-bordered" id="listMahasiswa">
                    <thead>
                        <tr style="background-color: #E9967A">
                            <th scope="col">No</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $mhs) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['jeniskelamin'] ?></td>
                                <td><?= $mhs['alamat'] ?></td>
                                <td><?= $mhs['jurusan'] ?></td>
                                <td><a href="<?= base_url() ?>mahasiswa/edit/<?= $mhs['id_mahasiswa'] ?>" class="btn btn-success">Edit</a>
                                    <a href="<?= base_url() ?>mahasiswa/hapus/<?= $mhs['id_mahasiswa'] ?>" onclick="return confirm('Apakah Anda Ingin Menghapus <?= $mhs['nama'] ?>?');" class="btn btn-danger">Hapus</a></td>
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