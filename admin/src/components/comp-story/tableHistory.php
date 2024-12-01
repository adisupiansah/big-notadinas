<div class="container-fluid p-4">
    <div class="d-flex justify-content-start align-items-start py-4 ">
        <a href="../" class="btn btn-primary btn-sm"></i>Dashboard</a>

    </div>
    <div class="table-responsive">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl surat</th>
                    <th>Kepada</th>
                    <th>No ND keluar</th>
                    <th>Perihal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($backup as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['kepada']; ?></td>
                        <td><?= $data['no_ndkeluar']; ?></td>
                        <td><?= $data['perihal']; ?></td>
                        <td>
                            <a class="text-decoration-none text-warning" href="ubah.php?id=<?= $data["id"]; ?>"><i class="fa-solid fa-pen"></i></a>
                            <a class="text-decoration-none text-danger" href="hapus.php?id=<?= $data["id"];  ?>" onclick="return confirm('Yakin?');"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>