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

function upload($path, $new)
{
    $namaFile = $new['name'];
    $tmp_name = $new['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, '../mahasiswa/surat/' . $uniq);
    unlink('../mahasiswa/surat/' . "$path");
    return $uniq;
}

function update($id, $file, $status)
{
    global $conn;
    if ($status === "Tolak") {
        $query = "UPDATE tb_pengajuan SET
        status =  'Tolak'
        WHERE id_ajuan = '$id'";
        mysqli_query($conn, $query);
        header('Location: pengajuan_admn.php');
    } else if ($status === "Sudah") {
        $newPath = upload($file, $_FILES['suratpengantar']);
        $query = "UPDATE tb_pengajuan SET
        suratpengantar = '$newPath',
        status =  'Sudah'
        WHERE id_ajuan = '$id'";
        mysqli_query($conn, $query);
        header('Location: pengajuan_admn.php');
    } else {
        header('Location: pengajuan_admn.php');
    }
}
