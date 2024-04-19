<?php
session_start();
$tipe_video_streaming = array('Film', 'Series', 'Anime', 'Variety Show Korea', 'Drama Korea');
// require 'functions.php';
$sql = "* FROM videos";
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $sql = "* FROM videos WHERE title LIKE '%$keyword%' OR vid_type LIKE '%$keyword%' OR episodes LIKE '%$keyword%'";
    // $data_video_streaming = cari($_POST["keyword"]);
}
// $jumlahDataPerHalaman = 5;
// $jumlahData = count(query("SELECT {$sql}"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //butuh
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1; //butuh
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// $data_video_streaming = query("SELECT {$sql} LIMIT $awalData, $jumlahDataPerHalaman");
