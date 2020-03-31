<?=
    form_open('auth/proses_login');
?>
<style>
    body {
        background-color: #F5F5F5;
    }
</style>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <!-- form card login -->
                        <div class="card rounded">
                            <div class="card-header" style="background-color:#BDB76B; color:white ">
                                <center>
                                    <h4 class="mb-0">Login</h4>
                                </center>
                            </div>
                            <div class="card rounded">
                                <div class="card-header" style="background-color: #F5F5DC">
                                    <div class="card-body">
                                        <?php if (validation_errors()) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= validation_errors() ?>
                                            </div>
                                        <?php endif ?>

                                        <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" required="">
                                                <div class="invalid-feedback">Oops, you missed to one.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" id="password" required="" autocomplete="new-password">
                                                <div class="invalid-feedback">Enter your password too!</div>
                                            </div>
                                            Don't have an account? <a href="<?= base_url(); ?>auth/register">Register Here</a>
                                            <button type="submit" class="btn btn-success float-right" id="btnLogin">Login</button>
                                        </form>
                                    </div>
                                    <!--/card-block-->
                                </div>
                                <!--/form card login-->
                                <div class="alert alert-info" role="alert">
                                    <?php
                                    if (isset($pesan)) {
                                        echo $pesan;
                                    } else {
                                        echo "Masukkan username dan password anda";
                                    }
                                    ?>
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