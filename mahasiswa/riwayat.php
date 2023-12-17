<?php
include('../proses_login.php');
include('./proses_riwayat_mhs.php');
include('./utils.php');
check();
$id = $_SESSION['user']['id_akunmhs'];
$data = read("SELECT P.*, D.nama_dosen, M.* FROM tb_pengajuan P 
INNER JOIN tb_dospem D ON P.id_dospem = D.id_dospem 
INNER JOIN tb_datamhs M ON P.id_akunmhs = M.id_mahasiswa
WHERE id_akunmhs = '$id'");
?>
<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml">

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
                        <a class="nav-link text-white" href="upload.php">Upload</a>
                    </div>
                    <div class="col mx-3">
                        <a class="nav-link text-white" href="riwayat.php">Riwayat</a>
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

    <div class="p-5 text-center">
        <h1>Riwayat</h1>
    </div>

    <div class="p-5 mx-5">
        <div class="card bg-lightgrey">
            <div class="card-body">
                <h4 class="p-4 w-25">Daftar Riwayat</h4>
                <div class="p-4">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Dosen Pembimbing</th>
                                <th scope="col">Surat Pengantar Magang</th>
                                <th scope="col">Laporan Akhir Magang</th>
                                <th scope="col">Logbook</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <?php $a = ""; ?>
                        <?php if ($data == null) { ?>
                            <tbody>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Tidak Ada Data</td>
                                </tr>
                            </tbody>
                        <?php } else { ?>
                            <?php foreach ($data as $value) : ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td scope="row">
                                            <button type="button" style="cursor: default;" <?= $value['status'] === 'Tolak' ? print "class='btn btn-danger btn-sm'" : (($value['status'] === 'Sudah') ? print "class='btn btn-success btn-sm'" : print "class='btn btn-secondary btn-sm'") ?>><?php echo $value['status'] === 'Belum' ? "Belum Diterima" : (($value['status'] === 'Sudah') ? "Diterima" : "Perlu Revisi") ?></button>
                                        </td>
                                        <td>
                                            <h6>
                                                <?php echo $value['nama_dosen'] ?>
                                            </h6>
                                        </td>
                                        <td>
                                            <a href="ms-word:ofe|u|http://localhost/PBL-web-MBKM-Arsip/mahasiswa/surat/<?= $value['suratpengantar'] ?>" class="btn btn-success mx-5">View</a>
                                        </td>
                                        <td>
                                            <a href="./laporan/<?= $value['laporanakhir'] ?>" class="btn btn-success mx-5">View</a>
                                        </td>
                                        <td>
                                            <a href="ms-excel:ofe|u|http://localhost/PBL-web-MBKM-Arsip/mahasiswa/logbook/<?= $value['logbook'] ?>" class="btn btn-success mx-2">View</a>
                                        </td>
                                        <td>
                                            <?= splitTanggal($value['updated_at']) ?>
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
        <div class="p-5 mx-auto" style="max-width: 800px;">
            <div class="card w-100 bg-navy">
                <div class="card-body text-white d-flex align-items-center">
                    <div class="custom-icon px-3">
                        <i class="fas fa-download" style="font-size: 3em;"></i>
                    </div>
                    <div class="text-right px-3 ml-3">
                        <h2>Download Surat Pengantar Magang</h2>
                        <p>Yang telah ditandatangani</p>
                        <input type="text" id="getDate" value="<?php print getDiffDate($data[0], $data[1]) ?>" hidden>
                        <a href="./surat/<?php print getDiffDate($data[0], $data[1]) ?>" onclick="clickDownload()" id="href" class="btn rounded-5 bg-white text-black btn-sm">
                            <h6>Download</h6>
                        </a>
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
        <script>
            function clickDownload() {
                const getDate = document.getElementById('getDate')
                const getLink = document.getElementById('href')
                if (getDate.value === '') {
                    getLink.href = 'riwayat.php'
                }
            }
        </script>
</body>

</html>