<?php
require('./proses_datamhs_admn.php');
include('../proses_login.php');
check();
$user = read("SELECT M.*, A.nama_mhs FROM tb_datamhs M INNER JOIN tb_dataakunmhs A ON M.id_mahasiswa = A.id_akunmhs");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Admin</title>
    <link rel="stylesheet" href="../NPM/node_modules/bootstrap/dist/css/bootstrap.css">
    <style>
        .bg-lightgrey {
            background-color: #E9ECEF;
        }
    </style>
</head>

<body class="bg-lightgrey">
    <div class="container-fluid">
        <div class="row">
    
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-white p-0 vh-100">
                <div class="my-3 mx-3">
                    <img src="../images/MBKM Arsip.png" width="180" height="34" alt="">
                </div>
                <h6 class="text-secondary px-4">Data Master</h6>
                <div class="m-lg-3 bg text-white">
                    <div class="rounded-2 bg-primary d-flex gap-3 align-items-center p-2" style="width: 180px;">
                        <embed src="../icon/mhs.svg" type="">
                        <a href="datamhs_admn.php" class="nav-link">Data Mahasiswa</a>
                    </div>
                </div>
                <div class="m-lg-3 bg">
                    <div class="rounded-2 bg-white d-flex gap-3 align-items-center p-2" style="width: 180px;">
                            <embed src="../icon/admin0.svg" type="">
                        <a href="datadospem_admn.php" class="nav-link">Data Dosen Pembimbing</a>
                    </div>
                </div>
                <div class="m-lg-3 bg">
                    <div class="rounded-2 bg-white d-flex gap-3 align-items-center p-2" style="width: 180px;">
                            <embed src="../icon/doc.svg" type="">
                        <a href="pengajuan_admn.php" class="nav-link">Pengajuan Magang</a>
                    </div>
                </div>
                <div class="m-lg-3 bg">
                    <div class="rounded-2 bg-white d-flex gap-3 align-items-center p-2" style="width: 180px;">
                            <embed src="../icon/admin0.svg" type="">
                        <a href="dataakunmhs_admn.php" class="nav-link">Akun Mahasiswa</a>
                    </div>
                </div>
            </div>
    
            <!-- headbar -->
            <div class="col-md-9 col-lg-10 p-0">
                <header>
                    <nav class="navbar navbar-light mb-0 bg-white">
                        <div class="container-fluid d-flex justify-content-end">
                                <a type="button" href="../proses_login.php?logout=true" class="btn btn-dark">
                                    <embed src="../icon/out.svg" type="">
                                </a>
                            <div class="mx-2">
                                <img src="../images/profile.png" alt="">
                            </div>
                            <div class="text-end">
                            <h6 class="mb-0"><?php echo $_SESSION['user']['nama_admin'] ?></h6>
                                <p class="mb-0">admin</p>
                            </div>
                        </div>
                    </nav>
                </header>
    
                <!-- Main content goes here -->
                <div class=" p-4">
                    <div class="d-flex flex-row mx-4">
                        <div class="p-2">
                            <div class="input-group rounded" style="width: 280px;">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="card d-flex justify-content-center align-items-center" style="width: 15rem; height: 2.5rem;">
                                <div class="card-body">
                                    <div class="d-flex flex-row mt-2">
                                        <div class="p-2">
                                            <h5 class="card-title">Data Mahasiswa</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <a href="datamhs_admn.php">
                                <button type="button" class="btn btn-light">
                                    <embed src="../icon/refresh.svg" type="">
                                </button>
                            </a>
                            
                        </div>
                    </div>
                    <div class="mt-2 mx-5" style="max-height: 510px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Laporan Akhir Magang</th>
                                    <th scope="col">Logbook</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php if ($user == null) { ?>
                            <tbody>
                            <tr>
                                <td colspan="5" style="text-align: center;">Tidak ada data</td>
                            </tr>
                            </tbody>
                            <?php } else { ?>
                            <?php foreach ($user as $value) : ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $value["nama_mhs"] ?></td>
                                    <td><?= $value["tanggal"] ?></td>
                                    <td>
                                        <a class="btn btn-success mx-2" <?= $value['laporanakhir'] === '' ? print 'href=""' : print 'href="../mahasiswa/laporan/' . $value['laporanakhir'] . '"'?>>view</a>
                                        <embed src="../icon/download.svg" type="">
                                        .pdf
                                    </td>
                                    <td>
                                        <a class="btn btn-success mx-2" <?= $value['logbook'] === '' ? print 'href=""' : print 'href="ms-excel:ofe|u|http://localhost/PBL-web-MBKM-Arsip/mahasiswa/logbook/' . $value['logbook'] . '"'?>>view</a>
                                        <embed src="../icon/download.svg" type="">
                                        .xls / .xlsx
                                    </td>
                                    <td>
                                    <a class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit">
                                        Edit
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $i++ ?>
                            <?php endforeach ?>
                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <footer class="bg-light text-end fixed-bottom">
        <div class="container-fluid" style="width: 100%;">
            <div class="">
                <p class="mb-0 p-3">
                    Copyright: MBKM Arsip 2023
                </p>
            </div>
        </div>
    </footer>

    <script src="../NPM/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>
