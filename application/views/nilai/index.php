<style>
    body {
        background-color: #F5F5F5;
    }
</style>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <h2>Daftar Nilai</h2>
                <table class="table table-striped table-bordered" id="listMatakuliah">
                    <thead>
                        <tr style="background-color: #DEB887">
                            <th scope="col">No</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Nama Matakuliah</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Sks</th>
                            <th scope="col">Nilai</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $nl) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $nl['nama_dosen'] ?></td>
                                <td><?= $nl['matakuliah'] ?></td>
                                <td><?= $nl['nama'] ?></td>
                                <td><?= $nl['sks'] ?></td>
                                <td><?= $nl['nilai'] ?></td>
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