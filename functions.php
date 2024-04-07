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
    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // query insert data
    $query = "INSERT INTO videos (title, vid_type, synopsis, episodes, cover) VALUES ('$title','$vid_type','$synopsis','$episodes','$gambar')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload()
{
    // menginput bio gambar pada $_FILES
    $namaFile = $_FILES['cover']['name'];
    $ukuranFile = $_FILES['cover']['size'];
    $error = $_FILES['cover']['error'];
    $tmpName = $_FILES['cover']['tmp_name']; //tmp name itu tempat penyimpanan sementara
    // cek apakah tidak ada gambar (error 4 itu errornya kalau gak ada gambar)
    if ($error === 4) {
        echo "<script> alert('pilih gambar dulu') </script>";
        return false;
    }
    // ekstensi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile); //explode itu memecah string berdasar delimiter
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('bukan gambar itu!" . $namaFile . "') </script>";
        return false;
    }
    // ukurannya besar kah?
    if ($ukuranFile > 10000000000) {
        # code...
        echo "<script>
        alert('Ukurannya terlalu besar!')
        </script>";
        return false;
    }
    // lolos
    // harus buat dulu manual foldernya
    // generate nama gambar baru, walaupun tampilannya sama
    $namaFileBaru = uniqid(); // uniqid() untuk string random
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM videos WHERE id = $id");
    return mysqli_affected_rows($db);
}
function ubah($data, $id)
{
    global $db;
    $title = htmlspecialchars($data["title"]);
    $vid_type = htmlspecialchars($data["vid_type"]);
    $synopsis = htmlspecialchars($data["synopsis"]);
    $episodes = htmlspecialchars($data["episodes"]);
    // $email = mysqli_real_escape_string($db, $email);
    // query insert data
    $query = "UPDATE videos SET title = '$title', vid_type = '$vid_type', synopsis = '$synopsis', episodes = '$episodes' WHERE id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
    // echo var_dump($id);
}

function cari($keyword)
{
    $query = "SELECT * FROM videos 
                WHERE
            title LIKE '%$keyword%' OR
            vid_type LIKE '%$keyword%' OR
            episodes LIKE '%$keyword%'
            ";
    return query($query);
}
