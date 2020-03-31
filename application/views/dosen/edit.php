<style>
    body {
        background-color: #F5F5F5;
    }
</style>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <center>
                <div class="card-header" style="background-color: 	#008B8B;color:white">
                    Form Edit Data Dosen
                </div>
            </center>
            <div class="card rounded">
                <div class="card-header" style="background-color: #8FBC8F">
                    <div class="card-body">
                        <!-- untuk menampilkan pesan error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif ?>
                        <form action="" method="post">
                            <input type="hidden" name="id_dosen" value="<?= $dosen->id_dosen; ?>">
                            <!-- http://getbootstrap.com/docs/4.1/components/form/ -->
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" class="form-control" id="nip" name="nip" value="<?= $dosen->nip; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Nama">Nama Dosen</label>
                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= $dosen->nama_dosen; ?>">
                                <!-- <small class="form-text text-danger"><?= form_error('nama_dosen'); ?></small> -->
                            </div>
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= $dosen->jeniskelamin; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dosen->alamat; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $dosen->email ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary float-right"> Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>