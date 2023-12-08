<?php
include("../koneksi.php");

function read($query)
{
    global $conn;
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

function upload($path, $new) {
    $namaFile = $new['name'];
    $tmp_name = $new['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, '../mahasiswa/surat/' . $uniq);
    unlink('../mahasiswa/surat/' . "$path");
    return $uniq;
}

function update($id, $file) {
    global $conn;
    $newPath = upload($file, $_FILES['surat']);
    $query = "UPDATE tb_pengajuan SET
    suratpengantar = '$newPath',
    status =  'Sudah'
    WHERE id_ajuan = '$id'";
    mysqli_query($conn, $query);
    header('Location: pengajuan_admn.php');
}