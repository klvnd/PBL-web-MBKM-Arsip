<?php
require("/xampp/htdocs/PBL-web-MBKM-Arsip/koneksi.php");
$id = $_GET["id"];
$query = "DELETE FROM tb_dataakunmhs WHERE id_akunmhs = '$id'";

mysqli_query($conn, $query);
if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Data berhasil dihapus!'); document.location.href = 'dataakunmhs_admn.php' </script>";
} else {
    echo "<script> alert('Data gagal dihapus!'); </script>";
    print(mysqli_affected_rows($conn));
}
?>