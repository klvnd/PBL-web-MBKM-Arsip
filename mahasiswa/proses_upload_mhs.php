<?php
include("../koneksi.php");
function filePdf($img)
{
    $namaFile = $img['name'];
    $tmp_name = $img['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'laporan/' . $uniq);

    return $uniq;
}

function fileExcel($img)
{
        $namaFile = $img['name'];
        $tmp_name = $img['tmp_name'];
        $split = explode('.', $namaFile);
        $ekstensi = strtolower(end($split));
        $uniq = uniqid() . '.' . $ekstensi;
        move_uploaded_file($tmp_name, 'logbook/' . $uniq);

        return $uniq;
}

function upload($id)
{
    global $conn;
    $d = date("Y-m-d");
    $a = filePdf($_FILES['uploadLaporan']);
    $b = fileExcel($_FILES['uploadLogbook']);
    $query = "INSERT INTO tb_datamhs VALUES (
        '',
        '$id',
        '$d',
        '$a',
        '$b'
        )";
    mysqli_query($conn, $query);
    header('Location: upload.php');
}