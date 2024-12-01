<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../auth");
    exit;
}

require '../fungsi/functions.php';

// cek apakaah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        header('Location: ../');
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = '../';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include '../src/components/comp-tambahData/head.php'; ?>
</head>
<body>
    <!-- navbar -->
     <?php include '../src/components/comp-tambahData/navbar.php'; ?>
    
    <!-- card time -->
    <?php include '../src/components/comp-tambahData/cardTime.php'; ?>

    <!-- card form input data -->
    <?php include '../src/components/comp-tambahData/cardForm.php'; ?>

    <!-- java script jam -->
    <script src="../time.js"></script>

    <!-- java script bootstrap v5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>