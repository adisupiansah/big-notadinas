<div class="container-fluid p-4">
    <div class="d-flex justify-content-center align-items-center py-4 ">
        <a href="./tambahdata" class="btn btn-primary btn-sm"><i class="fa-solid fa-folder-plus"></i> input data</a>
        <div class="d-flex justify-content-end align-items-end py-4 ms-auto">
            <a href="./story" class="btn btn-success btn-sm mx-3">Arsip ND</a>
            <div class="position-relative">
                <a href="./view" class="btn btn-sm btn-warning">pengajuan</a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php
                    // Menghitung jumlah data
                    $jumlahBadge = count($badgeNomor);
                    echo $jumlahBadge; // Menampilkan jumlah di badge
                    ?>
                    <span class="visually-hidden">0</span>
                </span>
            </div>
        </div>
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
                <?php foreach ($mahasiswa as $data) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['kepada']; ?></td>
                        <td><?= $data['no_ndkeluar']; ?></td>
                        <td><?= $data['perihal']; ?></td>
                        <td>
                            <a class="text-decoration-none text-warning" href="./editdata?id=<?= $data["id"]; ?>"><i class="fa-solid fa-pen"></i></a>
                            <a class="text-decoration-none text-danger pointer" onclick="confirmDelete(<?= $data['id']; ?>)">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
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
                    <th class="d-flex">
                        <button class="btn btn-success btn-sm" id="backupButton">backup</button>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>