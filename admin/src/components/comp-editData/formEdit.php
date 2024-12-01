<section>
    <div class="container">
        <div class="card p-3 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                            <div class="mb-4 row">
                                <label for="tanggal" class="col-sm-6 col-form-label">Tanggal</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= $mhs['tanggal']; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="kepada" class="col-sm-6 col-form-label">Kepada</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="kepada" name="kepada" required value="<?= $mhs['kepada']; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="no_ndkeluar" class="col-sm-6 col-form-label">No Nd Keluar</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="no_ndkeluar" name="no_ndkeluar" required value="<?= $mhs['no_ndkeluar']; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="perihal" class="col-sm-6 col-form-label">Perihal</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="perihal" name="perihal" required value="<?= $mhs['perihal']; ?>">
                                </div>
                            </div>
                            <button class="btn btn-success text-end d-flex" type="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>