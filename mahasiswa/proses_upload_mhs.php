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

function updateFilePdf($img, $path)
{
    $namaFile = $img['name'];
    $tmp_name = $img['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'laporan/' . $uniq);
    unlink('laporan/' . "$path");
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

function updateFileExcel($img, $path)
{
    $namaFile = $img['name'];
    $tmp_name = $img['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'logbook/' . $uniq);
    unlink('logbook/' . "$path");
    return $uniq;
}

function upload($id)
{
    global $conn;
    $d = date("Y-m-d");
    $setQuery = "SELECT * FROM tb_datamhs WHERE id_mahasiswa = '$id'";
    $result = mysqli_query($conn, $setQuery);
    if (mysqli_num_rows($result) === 0) {
        $laporanFile = filePdf($_FILES['uploadLaporan']);
        $logbookFile = fileExcel($_FILES['uploadLogbook']);
        $query = "INSERT INTO tb_datamhs VALUES (
            '',
            '$id',
            '$d',
            '$laporanFile',
            '$logbookFile'
            )";
        mysqli_query($conn, $query);
        header('Location: upload.php');
    } else {
        $value = mysqli_fetch_assoc($result);
        $newFileLaporan = updateFilePdf($_FILES['uploadLaporan'], $value['laporanakhir']);
        $newFileLogbook = updateFileExcel($_FILES['uploadLogbook'], $value['logbook']);
        $updateQuery = "UPDATE tb_datamhs SET
        laporanakhir = '$newFileLaporan',
        logbook = '$newFileLogbook'
        WHERE id_mahasiswa = '$id'
        ";
        mysqli_query($conn, $updateQuery);
        header('Location: upload.php');
    }
}
