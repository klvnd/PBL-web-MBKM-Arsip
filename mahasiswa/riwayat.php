<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
    <link rel="stylesheet" href="../NPM/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .bg-navy {
            background-color: #0A2640;
        }
        .bg-lightgrey {
            background-color: #E9ECEF;
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
            <div class="rounded-pill p-2 bg-white d-inline-block" style="width: 160px;">
                <p class="m-0 text-black text-center" style="font-weight: bold;">Username</p>
            </div>
        </div>
    </nav>
    
    <div class="p-5 text-center">
        <h1>Riwayat Pengajuan Magang</h1>
    </div>

    <div class="p-5 mx-5">
        <div class="card bg-lightgrey">
            <div class="card-body">
                <h4 class="p-4 w-25">Riwayat Pengajuan Surat Pengantar Magang</h4>
                <div class="p-4">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <button type="button" class="btn btn-danger btn-sm">Tidak diterima</button>
                                </th>
                                <td>
                                    <h6>Surat Pengantar</h6>
                                    <p class="text-secondary">Terkirim</p>
                                </td>
                                <td>
                                    <h6 class="text-danger">15:30 | 19 jan 2023</h6>
                                    <p class="text-secondary">45 Minutes Ago</p>
                                </td>
                                <td>
                                    <h6>
                                        Nama Dosen Pembimbing
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button type="button" class="btn btn-success btn-sm">Diterima</button>
                                </th>
                                <td>
                                    <h6>Surat Pengantar</h6>
                                    <p class="text-secondary">Terkirim</p>
                                </td>
                                <td>
                                    <h6 class="text-danger">11:20 | 22 jan 23</h6>
                                    <p class="text-secondary">60 Minutes Ago</p>
                                </td>
                                <td>
                                    <h6>
                                        Nama Dosen Pembimbing
                                    </h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 mx-auto" style="max-width: 800px;">
        <div class="card w-100 bg-navy">
            <div class="card-body text-white d-flex align-items-center">
                <div class="custom-icon px-3">
                    <i class="fas fa-download" style="font-size: 3em;"></i>
                </div>
                <div class="text-right px-3 ml-3">
                    <h2>Download Surat Pengantar Magang</h2>
                    <p>Yang telah ditandatangani</p>
                    <button type="button" class="btn rounded-5 bg-white text-black btn-sm"><h6>Download</h6></button>
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
</body>
</html>