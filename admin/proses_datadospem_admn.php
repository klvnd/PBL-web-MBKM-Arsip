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

function validate($param)
{
    global $conn;
    $query = "SELECT * FROM tb_dospem WHERE nip = '$param'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 0) {
        var_dump(mysqli_affected_rows($conn));
        return true;
    }
}

function create($nip, $nama_dosen)
{
    global $conn;
    if (validate($nip)) {
        $query = "INSERT INTO tb_dospem VALUES (
            '',
            '$nip',
            '$nama_dosen'
        )";
        mysqli_query($conn, $query);
        header('Location: datadospem_admn.php');
    } else {
        echo "<script> alert('Dosen telah terdaftar!'); document.location.href = 'datadospem_admn.php'; </script>";
    }
}

function validateUpdate($id, $nip)
{
    global $conn;
    $query = "SELECT * FROM tb_dospem WHERE nip = '$nip'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if ($result == null) {
        return true;
    } else if ($result["nip"] == $nip && $result["id_dospem"] == $id) {
        return true;
    } else {
        return false;
    }
}

function update($id, $nip, $nama_dosen)
{
    global $conn;
    if (validateUpdate($id, $nip)) {
        $query = "UPDATE tb_dospem SET 
                nama_dosen = '$nama_dosen',
                nip = '$nip'
                WHERE id_dospem = '$id'
            ";
        mysqli_query($conn, $query);
        if (mysqli_error($conn) == null) {
            echo "<script> alert('Data berhasil diupdate!'); document.location.href = 'datadospem_admn.php'; </script>";
        } else {
            print(mysqli_error($conn));
        }
    } else {
        echo "<script> alert('Dosen telah terdaftar!'); document.location.href = 'datadospem_admn.php'; </script>";
    }
}
