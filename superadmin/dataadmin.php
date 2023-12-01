<?php
require('proses_dataadmin.php');
$user = read("SELECT * FROM tb_dataadmin");
if (isset($_POST["create"])) {
    create($_POST['nama_admin'], $_POST['username'], $_POST['password']);
    }
if (isset($_POST["edit"])) {
    update($_POST['id_admin'], $_POST['nama_admin'], $_POST['username'], $_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data admin - Superadmin</title>
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
            <div class="col-md-3 col-lg-2 bg-white p-0">
                <div class="my-3 mx-3">
                    <img src="../images/MBKM Arsip.png" width="180" height="34" alt="">
                </div>
                <h6 class="text-secondary px-4">Data Master</h6>
                <div class="m-lg-3 bg text-white">
                    <div class="rounded-2 bg-primary d-flex gap-3 align-items-center p-2" style="width: 180px;">
                        <embed src="../icon/admin.svg" type="">
                        <a href="#" class="nav-link">Data Admin</a>
                    </div>
                </div>
            </div>
            <!-- headbar -->
            <div class="col-md-9 col-lg-10 p-0">
                <header>
                    <nav class="navbar navbar-light mb-0 bg-white">
                        <div class="container-fluid d-flex justify-content-end">
                            <a href="../landingpage.html">
                                <button type="button" class="btn btn-dark">
                                    <embed src="../icon/out.svg" type="">
                                </button>
                            </a>
                            <div class="mx-2">
                                <img src="../images/profile.png" alt="">
                            </div>
                            <div class="text-end">
                                <h6 class="mb-0">Username</h6>
                                <p class="mb-0">superadmin</p>
                            </div>
                        </div>
                    </nav>
                </header>
                <!-- Main content goes here -->
                <div class=" p-4">
                    <div class="d-flex flex-row">
                        <div class="mt-2 mx-5">
                            <div class="input-group rounded" style="width: 280px;">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="card d-flex justify-content-center align-items-center" style="width: 15rem; height: 2.5rem;">
                                <div class="card-body">
                                    <div class="d-flex flex-row mt-3">
                                        <div class="p-2">
                                            <h5 class="card-title">Data Admin</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-light">
                                <embed src="../icon/refresh.svg" type="">
                            </button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <embed src="../icon/plus.svg" type="">
                                Add New
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Nama Admin:</label>
                                                    <input type="text" class="form-control" id="" name="nama_admin" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Username:</label>
                                                    <input type="text" class="form-control" id="" name="username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                                    <input type="password" class="form-control" id="" name="password" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="create">Create</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mx-5" style="max-height: 510px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>                                  
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Admin</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php if ($user == null) { ?>
                                <tbody>
                                <tr>
                                    <td colspan="5" style="text-align: center;">Tidak ada data</td>
                                </tbody>
                            <?php } else { ?>
                            <?php foreach ($user as $value) : ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $value["nama_admin"] ?></td>
                                    <td><?= $value["username"] ?></td>
                                    <td><?= $value["password"] ?></td>
                                    <td>
                                    <a href="delete_dataadmin.php?id=<?= $value["id_admin"] ?>" class="btn btn-danger">Delete</a>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $value['id_admin']?>">
                                        Edit
                                        </button>
                                </td>
                            </tr>
                        </tbody>
                        <?php $i++ ?>
                        <div class="modal fade" id="edit<?= $value['id_admin']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <div class="mb-3" hidden>
                                                    <label for="recipient-name" class="col-form-label">ID Admin:</label>
                                                    <input type="text" value="<?= $value['id_admin'] ?>" class="form-control" id="" name="id_admin" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Nama Admin:</label>
                                                    <input type="text" value="<?= $value['nama_admin'] ?>" class="form-control" id="" name="nama_admin" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Username:</label>
                                                    <input type="text" value="<?= $value['username'] ?>" class="form-control" id="" name="username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                                    <input type="password" value="<?= $value['password'] ?>" class="form-control" id="" name="password" required>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
