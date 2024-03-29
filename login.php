<?php 
require('./proses_login.php');
if(isset($_POST['submit'])) {
    login($_POST['username'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBKM Arsip / Log In</title>
    <link rel="stylesheet" href="NPM/node_modules/bootstrap/dist/css/bootstrap.css">
</head>

<body>
    <section class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-6 vh-100 d-flex align-items-center justify-content-center">
                    <div class="col-7 row ">
                        <div class="d-grid gap-5">
                            <img src="images/MBKM Arsip.png" class="mx-auto d-block" alt="...">
                            <h2 class="d-flex align-items-center justify-content-center">Log In</h2>
                        </div>
                        
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label"><p class="text-secondary">Username</p></label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label label for="exampleInputPassword1" class="form-label"><p class="text-secondary">Password</p></label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                            </div>
                            <div class="d-grid col-6 mx-auto">
                                <button class="btn btn-primary" type="submit" name="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="images/magang-stock image(1).jpg"
                    alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <script src="NPM/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
