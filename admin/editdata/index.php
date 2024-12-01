<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../auth");
    exit;
}

require '../fungsi/functions.php';

// ambil data di url
$id  = $_GET["id"];

// query data mahasiswa berdasarkan id-nya
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../src/components/comp-editData/head.php'; ?>
</head>

<body>
    <!-- Navbar -->
    <?php include '../src/components/comp-editData/navbar.php'; ?>

    <!-- dashboard -->
    <?php include '../src/components/comp-editData/title.php'; ?>

    <!-- form edit -->
    <?php include '../src/components/comp-editData/formEdit.php'; ?>

    <!-- code php menangani sweetalert -->
    <?php
    // cek apakaah tombol submit sudah di tekan atau belum
    if (isset($_POST["submit"])) {

        // cek apakah data berhasil di ubah atau tidak
        if (ubah($_POST) > 0) {
            echo "
                    <script>
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data berhasil di edit.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../'; // Pengalihan ke index.php
                            }
                        });
                    </script>
            ";
        } else {
            echo "
                    <script>
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data gagal dihapus.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../'; // Pengalihan ke index.php
                            }
                        });
                    </script>
            ";
        }
    }
    ?>

    <!-- java script bootstrap v5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>