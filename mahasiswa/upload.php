<?php
require('proses_upload_mhs.php');
include('../proses_login.php');
check();
if (isset($_POST["submit"])) {
    upload($_SESSION['user']['id_akunmhs']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="../NPM/node_modules/bootstrap/dist/css/bootstrap.css">
    <style>
        .bg-navy {
            background-color: #0A2640;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-navy pt-5 px-5 pb-3">
        <div>
            <img src="../images/MBKM Arsip1.png" width="200" height="34" alt="">
        </div>
        <div class="navbar-nav ml-auto flex-row">
            <div class="container">
                <div class="row">
                    <div class="col mx-3">
                        <a class="nav-link text-white" href="homepage.php">Home</a>
                    </div>
                    <div class="col mx-3">
                        <a class="nav-link text-white" href="pengajuan.php">Pengajuan</a>
                    </div>
                    <div class="col mx-3">
                        <a class="nav-link text-white" href="riwayat.php">Riwayat</a>
                    </div>
                    <div class="col mx-3">
                        <a class="nav-link text-white" href="upload.php">Upload</a>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <a class="btn bg-white dropdown-toggle rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: bold; position: static;">
                    <?php echo $_SESSION['user']['nama_mhs']?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="position: absolute;">
                    <li><a class="dropdown-item" href="akun.php" style="font-weight: bold;">
                            <embed src="../icon/user0.svg" type="" class="mr-2 px-3">
                            Akun
                        </a></li>
                    <li><a class="dropdown-item" href="../proses_login.php?logout=true" style="font-weight: bold;">
                            <embed src="../icon/out1.svg" type="" class="mr-2 px-3">
                            Sign Out
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-5 text-center">
        <h1>Fitur Upload</h1>
    </div>

    <div class="p-5 mx-auto" style="max-width: 1300px;">
        <div class="card bg-navy">
            <div class="card-body text-white text-center">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h2 class="p-5">Upload Laporan Akhir Magang</h2>
                        <h2 class="p-5">Upload Logbook</h2>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="p-5">
                                <input class="form-control" type="file" id="formFile" name="uploadLaporan" accept="application/pdf" required>
                            </div>
                            <div class="p-5">
                                <input class="form-control" type="file" id="formFile" name="uploadLogbook" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                            </div>
                    </div>
                </div>
                <div class="p-3">
                    <button class="btn btn-success rounded-5 text-black p" style="font-size: 20px;" type="submit" name="submit">
                        <h4>Upload</h4>
                    </button>
                    <button type="submit" id="submit" hidden></button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container-fluid text-white bg-black">
            <div class="row align-items-center">
                <a class="col-lg-5 p-lg-4 navbar-brand text-lg-left" href="#">
                    <img src="../images/MBKM Arsip1.png" width="200" height="34" alt="">
                </a>
                <p class="col-lg m-lg-auto mb-0">
                    Copyright: MBKM Arsip 2023
                </p>
            </div>
        </div>
    </footer>

    <script src="../NPM/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        function showConfirmation() {
            var confirmUpload = confirm("Are you sure you want to upload?");
            if (confirmUpload) {
                // Add logic for handling the upload here
                $("#submit").click();
                alert("File uploaded successfully!");
            } else {
                alert("Upload canceled.");
            }
        }
    </script>
</body>

</html>