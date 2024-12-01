<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ./auth");
    exit;
}
require './fungsi/functions.php';
$badgeNomor = query("SELECT * FROM ambilnomor");
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["backup"])) {
    backupData(); // Panggil fungsi backup hanya jika ada request POST untuk backup
    echo json_encode(["success" => true, "message" => "Backup berhasil."]);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <?php include './src/components/comp-admin/head.php'; ?>
</head>

<body>
    <!-- navbar -->
    <?php include './src/components/comp-admin/navbar.php'; ?>

    <!-- logo presisi -->
    <?php include './src/components/comp-admin/logoPresisi.php'; ?>

    <!-- dashboard jam hari tanggal -->
    <?php include './src/components/comp-admin/cardJam.php'; ?>

    <!-- table -->
    <?php include './src/components/comp-admin/table.php'; ?>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"Bf>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        className: 'btn btn-success btn-sm mx-1'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export to PDF',
                        className: 'btn btn-danger btn-sm mx-1'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        className: 'btn btn-primary btn-sm mx-1'
                    }
                ],
                language: {
                    paginate: {
                        next: '<i class="fas fa-circle-right"></i>',
                        previous: '<i class="fas fa-circle-left"></i>'
                    }
                }
            });
        });
    </script>

    <script>
        document.getElementById('backupButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Semua data akan dibackup!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, backup sekarang!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim request POST untuk backup
                    fetch('index.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'backup=true'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Berhasil!', data.message, 'success').then(() => {
                                    location.reload(); // Refresh halaman jika diperlukan
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat backup.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Gagal!', 'Tidak dapat memproses backup.', 'error');
                        });
                }
            });
        });
    </script>

    <!-- konfirmasi tombol hapus di table -->
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman hapus
                    window.location.href = `hapus.php?id=${id}`;
                }
            });
        }
    </script>

    <style>
        .dt-buttons {
            float: right;
            margin-left: 5px;
        }

        .jumbotron {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .kartu {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        /* @media print {
            .navbar {
                display: none ;
            }
        } */
    </style>

    <!-- java script timer -->
    <script src="time.js"></script>

    <!-- Js Bootstrap v.5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>