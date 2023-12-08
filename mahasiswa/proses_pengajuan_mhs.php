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
    $file = moveFileSurat($_FILES['suratpengantar']);
    $query = "INSERT INTO tb_pengajuan VALUES (
        '',
        '$id',
        '$idDospem',
        'Belum',
        '$file'
        )";
    mysqli_query($conn, $query);
    header('Location: pengajuan.php');
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