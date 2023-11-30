<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_magang");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_errno());
}

?>