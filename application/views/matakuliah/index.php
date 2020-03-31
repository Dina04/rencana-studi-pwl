<style>
    body {
        background-color: #F5F5F5;
    }
</style>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <h2>Daftar Matakuliah</h2>
                <table class="table table-striped table-bordered" id="listMatakuliah">
                    <thead>
                        <tr style="background-color: #B0E0E6">
                            <th scope="col">No</th>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Nama Matakuliah</th>
                            <th scope="col">Sks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matakuliah as $mk) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $mk['kode_mk'] ?></td>
                                <td><?= $mk['matakuliah'] ?></td>
                                <td><?= $mk['sks'] ?></td>
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