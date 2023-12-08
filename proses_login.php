<?php 
require('/xampp/htdocs/PBL-web-MBKM-Arsip/koneksi.php');

session_start();

function check()
{
    if (!isset($_SESSION["user"])) {
        header('Location: /PBL-web-MBKM-Arsip/login.php');
    }
}

if(isset($_GET['logout'])) {
    session_unset();
    check();
}

function login($username, $password)
{
    global $conn;
    $superAdmin = "SELECT * FROM tb_superadmin WHERE username = '$username'";
    $admin = "SELECT * FROM tb_dataadmin WHERE username = '$username'";
    $mhs = "SELECT * FROM tb_dataakunmhs WHERE username = '$username'";
    if(mysqli_query($conn, $admin)->num_rows == 1) {
        $row = mysqli_fetch_assoc(mysqli_query($conn, $admin));
        if ($password === $row['password']) {
            $_SESSION["user"] = $row;
            header('Location: ./admin/datamhs_admn.php');
        } else {
            echo "<script> alert('Password salah !'); document.location.href = 'login.php'; </script>";
        }
    } else if (mysqli_query($conn, $mhs)->num_rows == 1) {
        $row = mysqli_fetch_assoc(mysqli_query($conn, $mhs));
        if ($password === $row['password']) {
            $_SESSION["user"] = $row;
            header('Location: ./mahasiswa/homepage.php');
        } else {
            echo "<script> alert('Password salah !'); document.location.href = 'login.php'; </script>";
        }
    } else if (mysqli_query($conn, $superAdmin)->num_rows == 1) {
        $row = mysqli_fetch_assoc(mysqli_query($conn, $superAdmin));
        if ($password === $row['password']) {
            $_SESSION["user"] = $row;
            header('Location: ./superadmin/dataadmin.php');
        } else {
            echo "<script> alert('Password salah !'); document.location.href = 'login.php'; </script>";
        }
    } else {
        echo "<script> alert('Username salah !'); document.location.href = 'login.php'; </script>";
    }
}
?>