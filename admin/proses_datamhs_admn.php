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