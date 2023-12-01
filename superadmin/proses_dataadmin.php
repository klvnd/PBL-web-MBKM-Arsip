<?php
include("/xampp/htdocs/PBL-web-MBKM-Arsip/koneksi.php");
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
    $query = "SELECT * FROM tb_dataadmin WHERE username = '$param'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 0) {
        var_dump(mysqli_affected_rows($conn));
        return true;
    }
}

function create($nama_admin, $username, $password)
{
    global $conn;
    if (validate($username)) {
        $query = "INSERT INTO tb_dataadmin VALUES (
            '',
            '$nama_admin',
            '$username',
            '$password'
        )";
        mysqli_query($conn, $query);
        header('Location: dataadmin.php');
    } else {
        echo "<script> alert('Akun telah terdaftar!'); document.location.href = 'dataadmin.php'; </script>";
    }
}

function validateUpdate($id, $username)
{
    global $conn;
    $query = "SELECT * FROM tb_dataadmin WHERE username = '$username'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if ($result == null) {
        return true;
    } else if ($result["username"] == $username && $result["id_admin"] == $id) {
        return true;
    } else {
        return false;
    }
}

function update($id, $nama_admin, $username, $password)
{
    global $conn;
    if (validateUpdate($id, $username)) {
        $query = "UPDATE tb_dataadmin SET 
                nama_admin = '$nama_admin',
                username = '$username',
                password = '$password'
                WHERE id_admin = '$id'
            ";
        mysqli_query($conn, $query);
        if (mysqli_error($conn) == null) {
            echo "<script> alert('Data berhasil diupdate!'); document.location.href = 'dataadmin.php'; </script>";
        } else {
            print(mysqli_error($conn));
        }
    } else {
        echo "<script> alert('Akun telah terdaftar!'); document.location.href = 'dataadmin.php'; </script>";
    }
}
?>