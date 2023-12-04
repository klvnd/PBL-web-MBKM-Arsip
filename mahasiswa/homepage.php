<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
                    Username
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="position: absolute;">
                    <li><a class="dropdown-item" href="akun.php" style="font-weight: bold;">
                        <embed src="../icon/user0.svg" type="" class="mr-2 px-3">
                        Akun
                    </a></li>
                    <li><a class="dropdown-item" href="../landingpage.html" style="font-weight: bold;">
                        <embed src="../icon/out1.svg" type="" class="mr-2 px-3">
                        Sign Out
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="bg-navy">
        <div class="p-5 text-center text-white">
            <h1>Magang</h1>
            <p class="p-5 w-50 mx-auto">Fakultas menerapkan magang sesuai dengan kebijakan Merdeka Belajar Kampus Merdeka (MBKM), dimana memberikan kesempatan kepada mahasiswa untuk belajar di luar kampus selama 2 semester dan dapat dikonversi 20 sks untuk setiap semester.</p>

        </div>
    </div>
    <h1>Homepage</h1>

    <script src="../NPM/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>