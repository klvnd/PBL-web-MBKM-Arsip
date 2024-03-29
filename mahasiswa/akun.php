<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Mahasiswa</title>
    <link rel="stylesheet" href="../NPM/node_modules/bootstrap/dist/css/bootstrap.css">
    <style>
        .bg-navy {
            background-color: #0A2640
        }
    </style>
</head>

<body class="bg-navy">
    <header>
        <nav class="p-lg-3 navbar navbar-light mx-3">
            <a class="navbar-brand" href="#">
                <img src="../images/MBKM Arsip1.png" width="200" height="34" alt="">
            </a>
            <div class="">
                <a href="../mahasiswa/homepage.php" class="container btn text-white d-flex align-items-center">
                    <embed src="../icon//back.svg" type="" class="mr-2">
                    <p class="mb-0 ms-2">Back to the Homepage</p>
                </a>
            </div>                   
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white position-relative" href="akun.php">
                                <embed src="../icon/user.svg" type="" class="mr-2 px-3">
                                Akun
                                <div class="m-lg-3">
                                    <div class="rounded-pill p-2 bg-white d-inline-block" style="width: 160px;">
                                        <p class="m-0 text-black text-center" style="font-weight: bold;">Username</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <div class="border-bottom border-white"></div>
                        <li class="nav-item">
                            <a class="nav-link active text-white position-relative" href="../landingpage.html">
                                <embed src="../icon/out.svg" type="" class="mr-2 px-3">
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="text-white col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="card rounded-5 p-3">
                    <div>
                        <button type="button" class="rounded-pill btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                            </svg>
                            Edit
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nama :</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Gender :</label>
                                            <select class="form-select" id="programStudi" aria-label="Program Studi">
                                                <option selected disabled>Select gender</option>
                                                <option value="">Laki-Laki</option>
                                                <option value="">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Tempat, tanggal lahir :</label>
                                            <input type="date" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nationality :</label>
                                            <input type="Text" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Address line :</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">City :</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">State :</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Country :</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Phone Number :</label>
                                            <input type="number" class="form-control" id="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Email :</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="mx-4">
                        <h5>Personal Details</h5>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-3 col-lg-2">
                            <div class="pt-4">
                                <img src="../images/user.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h6>Name</h6>
                            <p>Muhammad Syarif</p>
                            <h6>Gender</h6>
                            <p>Male</p>
                            <h6>Date of Birth</h6>
                            <p>August 27th, 1999</p>
                            <h6>Nationality</h6>
                            <p>Indonesia</p>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h5>Address</h5>
                            <h6>Address Line</h6>
                            <p>No 35 Jimmy Ebi Street</p>
                            <h6>City</h6>
                            <p>Malang</p>
                            <h6>State</h6>
                            <p>Jawa Timur</p>
                            <h6>Country</h6>
                            <p>Indonesia</p>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h5>Contact Details</h5>
                            <h6>Phone Number</h6>
                            <p>081282765588</p>
                            <h6>Email</h6>
                            <p>Syarif@gmail.com</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5 fixed-bottom">
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
    
    <!-- Bootstrap JavaScript -->
    <script src="../NPM/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
