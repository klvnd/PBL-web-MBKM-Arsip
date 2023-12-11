<?php 
require("./proses_pengajuan_mhs.php");
include('../proses_login.php');
check();
$dospem = getDospem();
if(isset($_POST["submit"])) {
    uploadSurat($_POST["dospem"], $_SESSION['user']['id_akunmhs']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan</title>
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
                    <?php echo $_SESSION['user']['nama_mhs'] ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="position: absolute;">
                    <!-- <li><a class="dropdown-item" href="akun.php" style="font-weight: bold;">
                        <embed src="../icon/user0.svg" type="" class="mr-2 px-3">
                        Akun
                    </a></li> -->
                    <li><a class="dropdown-item" href="../proses_login.php?logout=true" style="font-weight: bold;">
                        <embed src="../icon/out1.svg" type="" class="mr-2 px-3">
                        Sign Out
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mx-auto p-5 text-center" style="max-width: 700px;">
        <h1>Pengajuan Magang</h1>
        <p class="w-75 mx-auto">Mahasiswa dibatasi 2x pengajuan surat magang dan pemilihan jatah durasi magang ex: 1 semester/2 semester</p>
    </div>

    <div class="p-5 mx-5">
        <div class="card bg-navy">
            <div class="card-body text-white text-center">
                <h1 class="p-4 mx-auto w-50">Upload Surat Pengantar Magang Yang Telah Anda Isi</h1>
                <div class="p-4 d-flex align-items-center justify-content-center">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                            <input class="form-control" type="file" name="suratpengantar" id="formFile" accept=".doc, .docx">
                            <p class="pb-3 mx-auto">*File yang dapat diupload hanya berformat .doc atau .docx</p>
                    </div>
                    <div class="mb-3">
                    <select name="dospem" class="form-select" id="dospem" required>
                        <option value="" disabled selected>Pilih Dosen Pembimbing</option>
                        <?php foreach ($dospem as $value) :?>
                            <option value="<?= $value['id_dospem'] ?>"><?= $value['nama_dosen'] ?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                    <button class="btn btn-success rounded-5 m-lg-3 text-black" type="submit" name="submit">Upload</button>
                </form>    
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="mx-auto p-5" style="max-width: 700px;">
        <h1 class="text-center">Atau buat Surat Pengantar Secara Otomatis</h1>
        <div class="text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Form Surat Pengantar</button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Surat Pengantar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama :</label>
                                <input type="text" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">NIM :</label>
                                <input type="number" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tingkat / Semester :</label>
                                <input type="number" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Program Studi :</label>
                                <select class="form-select" id="programStudi" aria-label="Program Studi">
                                    <option selected disabled>Select Program Studi</option>
                                    <option value="programStudi1">(D3) Teknologi Informasi</option>
                                    <option value="programStudi2">(D3) Keuangan dan Perbankan</option>
                                    <option value="programStudi3">(D3) Administrasi Bisnis</option>
                                    <option value="programStudi4">(D4) Manajemen Perhotelan</option>
                                    <option value="programStudi5">(D4) Desain Grafis</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">No. Telp / HP :</label>
                                <input type="number" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Instansi / Perusahaan :</label>
                                <input type="text" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Rencana magang pada tanggal :</label>
                                <input type="date" class="form-control" id="">
                                <label for="recipient-name" class="col-form-label">s/d :</label>
                                <input type="date" class="form-control" id="">
                            </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Create Surat</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
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

    <script>
        function showConfirmation() {
            var confirmUpload = confirm("Are you sure you want to upload?");
            if (confirmUpload) {
                // Add logic for handling the upload here
                alert("File uploaded successfully!");
            } else {
                alert("Upload canceled.");
            }
        }
    </script>
</body>

</html>
