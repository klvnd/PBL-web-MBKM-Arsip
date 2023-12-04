<?php
include("../koneksi.php");
function changeName($img)
{
    $namaFile = $img['name'];
    $tmp_name = $img['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'img/' . $uniq);

    return $uniq;
}

function upload()
{
    global $conn;
    $a = changeName($_FILES['uploadLaporan']);
    $b = changeName($_FILES['uploadLogbook']);
    $query = "INSERT INTO tb_datamhs VALUES (
        '',
        'asd',
        '0000-00-00',
        '$a',
        '$b'
        )";
    mysqli_query($conn, $query);
    header('Location: upload.php');
}