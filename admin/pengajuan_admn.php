<?php
require('proses_pengajuan_admn.php');
include('../proses_login.php');
check();
function splitTanggal($date)
{
    $split = explode(" ", $date);
    $tanggal = explode("-", $split[0]);
    return $tanggal[2] . "/" . $tanggal[1] . "/" . $tanggal[0];
}
$array = ['Sudah', 'Tolak'];
$user = read("SELECT P.*, D.nama_dosen, M.nama_mhs FROM tb_pengajuan P 
INNER JOIN tb_dospem D ON P.id_dospem = D.id_dospem
INNER JOIN tb_dataakunmhs M ON P.id_akunmhs = M.id_akunmhs
");
if (isset($_POST["upload"])) {
    update($_POST['id_ajuan'], $_POST['path'], $_POST['status']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Magang - Admin</title>
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
                <div class="m-lg-3 bg">
                    <div class="rounded-2 bg-white d-flex gap-3 align-items-center p-2" style="width: 180px;">
                        <embed src="../icon/mhs0.svg    " type="">
                        <a href="datamhs_admn.php" class="nav-link">Data Mahasiswa</a>
                    </div>
                </div>
                <div class="m-lg-3 bg">
                    <div class="rounded-2 bg-white d-flex gap-3 align-items-center p-2" style="width: 180px;">
                        <embed src="../icon/admin0.svg" type="">
                        <a href="datadospem_admn.php" class="nav-link">Data Dosen Pembimbing</a>
                    </div>
                </div>
                <div class="m-lg-3 bg text-white">
                    <div class="rounded-2 bg-primary d-flex gap-3 align-items-center p-2" style="width: 180px;">
                        <embed src="../icon/doc0.svg" type="">
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
                                            <h5 class="card-title">Pengajuan Magang</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <a href="pengajuan_admn.php">
                                <button type="button" class="btn btn-light">
                                    <embed src="../icon/refresh.svg" type="">
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="mt-2" style="max-height: 510px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Dosen Pembimbing</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Surat Pengantar</th>
                                    <!-- <th scope="col">Tandatangani</th> -->
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php if ($user == null) { ?>
                                <tbody>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">Tidak ada data</td>
                                    </tr>
                                </tbody>
                            <?php } else {
                                $belum = "Belum Tertandangani"
                            ?>
                                <?php foreach ($user as $value) : ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $value["nama_mhs"] ?></td>
                                            <td><?= splitTanggal($value['updated_at']) ?></td>
                                            <td><?= $value["nama_dosen"] ?></td>
                                            <td>
                                                <button type="button" <?= $value['status'] == 'Sudah' ? print "class='btn btn-success mx-2'" : (($value['status'] == 'Belum') ? "class='btn btn-secondary mx-2'" : "class='btn btn-danger mx-2'") ?> disabled><?php echo $value['status'] == "Belum" ? "Belum Tertandatangani" : (($value['status'] == 'Sudah') ? "Tertandatangani" : "Perlu Direvisi") ?></button>
                                            </td>
                                            <td>
                                                <a <?= $value['suratpengantar'] === '' ? print 'href=""' : print 'href="ms-word:ofe|u|http://localhost/PBL-web-MBKM-Arsip/mahasiswa/surat/' . $value['suratpengantar'] . '"' ?> class="btn btn-success mx-2">view</a>
                                                <embed src="../icon/download.svg" type="">
                                                .doc /.docx
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success" onclick="clickFileChoose(<?php echo $i ?>)" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_ajuan'] ?>">
                                                    Edit
                                                </button>
                                            </td>
                                            <div class="modal fade" id="edit<?= $value['id_ajuan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="edit">Edit</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Status:</label>
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <input type="text" name="" class="indexInput" value="<?= $i ?>" hidden>
                                                                    <input type="text" name="id_ajuan" class="idInput" value="<?= $value['id_ajuan'] ?>" hidden>
                                                                    <input type="text" name="asd" class="statusInput" value="<?= $value['status'] ?>" hidden>
                                                                    <input type="text" name="path" value="<?= $value['suratpengantar'] ?>" hidden>
                                                                    <select name="status" class="form-select inputSelect" onchange="hiddenFileChoose(<?php echo $i ?>)" id="status<?= $i ?>" required>
                                                                        <option value="Belum" disabled selected>Pilih Status</option>
                                                                        <?php foreach ($array as $item) : ?>
                                                                            <option <?php
                                                                                    echo "value='$item'";
                                                                                    echo  "value='$item'"; ?>><?php if ($item == "Sudah") {
                                                                                                                    echo "Terima";
                                                                                                                } else {
                                                                                                                    echo "Perlu Revisi";
                                                                                                                } ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                            </div>
                                                            <div class="fileChoose" hidden>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label">Upload (Yang sudah ditandatangani):</label>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input class="form-control fileAccept" type="file" name="suratpengantar" id="formFile" accept=".doc, .docx">
                                                                    <p class="pb-3 mx-auto">*File yang dapat diupload hanya berformat .doc atau .docx</p>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" onclick="clickFileChoose(<?php echo $i ?>)" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="upload">Edit</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
    <script>
        function clickFileChoose(index) {
            const getValue = document.getElementsByClassName('statusInput')
            const getIndex = document.getElementsByClassName('indexInput')
            const options = document.getElementById(`status${index}`).options
            const getHidden = document.getElementsByClassName(`fileChoose`)
            const getInput = document.getElementsByClassName(`fileAccept`)
            for (let i = 0; i < getIndex.length; i++) {
                if (getIndex[i].value === index.toString()) {
                    if (getValue[i].value === 'Sudah') {
                        options.selectedIndex = 1
                        getHidden[i].hidden = false
                        getInput[i].required = true
                        break
                    } else if (getValue[i].value === 'Tolak') {
                        options.selectedIndex = 2
                        getInput[i].required = false
                        getHidden[i].hidden = true
                        break
                    } else if (getValue[i].value === 'Belum') {
                        options.selectedIndex = 0
                        getInput[i].required = false
                        getHidden[i].hidden = true
                        break
                    }
                    break
                }
            }

        }

        function hiddenFileChoose(index) {
            const getSelect = document.getElementsByClassName('form-select')
            const getIndex = document.getElementsByClassName('indexInput')
            const getHidden = document.getElementsByClassName(`fileChoose`)
            const getInput = document.getElementsByClassName(`fileAccept`)
            for (let i = 0; i < getIndex.length; i++) {
                if (getIndex[i].value === index.toString()) {
                    if (getSelect[i].value === 'Sudah') {
                        getHidden[i].hidden = false
                        getInput[i].required = true
                    } else {
                        getHidden[i].hidden = true
                        getInput[i].required = false
                    }
                    break
                }
            }
        }
    </script>
</body>
</body>

</html>