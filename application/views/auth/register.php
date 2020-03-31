<?=
    form_open('auth/proses_register');
?>
<style>
    body {
        background-color: #F5F5F5;
    }
</style>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded">
                            <div class="card-header" style="background-color:#BDB76B; color:white ">
                                <center>
                                    <h4 class="mb-0">Register</h4>
                                </center>
                            </div>
                            <div class="card rounded">
                                <div class="card-header" style="background-color: #F5F5DC">
                                    <div class="card-body">
                                        <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" id="password" required="" autocomplete="new-password">
                                                <div class="invalid-feedback">Enter your password too!</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="notelp">No Telepon</label>
                                                <input type="number" class="form-control" name="notelp" id="notelp" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status" id="status" required>
                                                    <option selected>Pilih Status</option>
                                                    <option value="mahasiswa">Mahasiswa</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                            Already Have an Account? <a href="<?= base_url(); ?>auth/login">Login Here</a>
                                            <button type="submit" class="btn btn-success float-right" name="submit">Register</button>
                                        </form>
                                    </div>
                                    <!--/card-block-->
                                </div>
                                <!--/form card login-->
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/col-->
                </div>
                <!--/row-->
            </div>
            <!--/container-->
            <?= form_close();
            ?>
</body>