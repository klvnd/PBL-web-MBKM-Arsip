<?php 
require('../koneksi.php');
function moveFileSurat($file) {
    $namaFile = $file['name'];
    $tmp_name = $file['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'surat/' . $uniq);

    return $uniq;
}

function uploadSurat($dospem, $id) {
    global $conn;
    $idDospem = (int)$dospem;
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date('Y-m-d H:i:s');
    $getQuery = "SELECT * FROM tb_pengajuan WHERE id_akunmhs = $id";
    $result = mysqli_query($conn, $getQuery);
    if (mysqli_num_rows($result) !== 2) {
        $file = moveFileSurat($_FILES['suratpengantar']);
        $query = "INSERT INTO tb_pengajuan VALUES (
            '',
            '$id',
            '$idDospem',
            'Belum',
            '$file',
            '$dateNow',
            '$dateNow'
            )";
        mysqli_query($conn, $query);
        header('Location: pengajuan.php');
    } else {
        echo "<script> alert('Upload file tidak boleh melebihi 2 kali !'); document.location.href = 'pengajuan.php'; </script>";
    }
}

function getDospem() {
    global $conn;
    $query = "SELECT * FROM tb_dospem";
    $result = mysqli_query($conn, $query);
    $rows = [];
    if ($result == null) {
        $rows[] = [];
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

    return $rows;
}