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
                    Form Tambah Data Dosen
                </div>
            </center>
            <div class="card rounded">
                <div class="card-header" style="background-color: #8FBC8F">
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo validation_errors() ?>
                            </div>
                        <?php endif ?>
                        <form action="" method="post">
                            <!-- http://getbootstrap.com/docs/4.1/components/form/ -->
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input type="number" class="form-control" id="nip" name="nip">
                            </div>
                            <div class="form-group">
                                <label for="nama_dosen">Nama Dosen</label>
                                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                            </div>
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data Dosen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>