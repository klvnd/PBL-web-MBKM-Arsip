<?php
include("/xampp/htdocs/PBL-web-MBKM-Arsip/koneksi.php");
function changeName($img)
{
    $namaFile = $img['name'];
    $tmp_name = $img['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'img/img/' . $uniq);

    return $uniq;
}

function upload()
{
    $a = var_dump($_FILES['uploadLaporan']);
    echo "<script>alert('asd')</script>";
}
?>