<?php
session_start();
require '../fungsi/functions.php';

$nomor = query("SELECT * FROM ambilnomor ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include '../src/components/comp-view/head.php'; ?>
</head>

<body>

    <!-- navbar -->
    <?php include '../src/components/comp-view/navbar.php'; ?>

    <!-- logo presisi -->
    <?php include '../src/components/comp-view/cardPresisi.php'; ?>

    <!-- table -->
    <?php include '../src/components/comp-view/tablePengajuan.php'; ?>

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