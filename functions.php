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


function tambah($data)
{
    global $db;
    $title = htmlspecialchars($data["title"]);
    $vid_type = htmlspecialchars($data["vid_type"]);
    $synopsis = htmlspecialchars($data["synopsis"]);
    $episodes = htmlspecialchars($data["episodes"]);
    // query insert data
    $query = "INSERT INTO videos (title, vid_type, synopsis, episodes) VALUES ('$title','$vid_type','$synopsis','$episodes')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM videos WHERE id = $id");
    return mysqli_affected_rows($db);
}
