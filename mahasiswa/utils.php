<?php
function splitTanggal($date)
{
    $split = explode(" ", $date);
    $tanggal = explode("-", $split[0]);
    return $tanggal[2] . "/" . $tanggal[1] . "/" . $tanggal[0];
}

function getDiffDate($data1, $data2)
{
    $dateTime1 = strtotime($data1['updated_at']);
    $dateTime2 = strtotime($data2['updated_at']);
    if ($data1['status'] === "Sudah" && $data2['status'] === "Sudah") {
        if ($dateTime1 > $dateTime2) {
            return $data1['suratpengantar'];
        } else {
            return $data2['suratpengantar'];
        }
    } else if ($data1['status'] === 'Sudah') {
        return $data1['suratpengantar'];
    } else if ($data2['status'] === 'Sudah') {
        return $data2['suratpengantar'];
    } else {
        return '';
    }
}
