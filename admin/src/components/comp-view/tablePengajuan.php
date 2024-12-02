<div class="container-fluid p-4">
    <div class=" py-4">
        <a href="../" class="btn btn-sm btn-primary">Dashboard</a>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped text-center" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Safung</th>
                    <th>Tanggal pengajuan</th>
                    <th>Hal</th>
                    <th>No pengajuan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($nomor as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['satfung']; ?></td>
                        <td><?= $data['tgl_ambilnomor']; ?></td>
                        <td><?= $data['Hal']; ?></td>
                        <td><?= $data['no_ndkeluar']; ?></td>
                    </tr>

                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><a class="btn btn-sm btn-danger" href="delete.php" onclick="return confirm('apakah anda ingin menghapus data ini ?');">delete data</a></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>