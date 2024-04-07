<?php
// koneksi ke database
// nama host, username, password, nama database,
$db = mysqli_connect("localhost", "root", "", "data_vidsstream_ariiq");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
