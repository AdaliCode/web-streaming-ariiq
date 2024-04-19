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
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title><?= $nama_web_streaming; ?></title> -->
    <title>AFLIX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <!-- <a class="navbar-brand" href="index.php"><?= $nama_web_streaming; ?></a> -->
            <a class="navbar-brand" href="index.php">AFLIX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <form class="d-flex" role="search" action="index.php" method="get">
                    <input class="form-control me-2 border border-success" type="search" autofocus placeholder="taroh pencarian..." aria-label="Search" name="keyword" autocomplete="off">
                    <!-- <button class="btn btn-outline-success" type="submit" name="cari">Search</button> -->
                </form>
                <div class="navbar-nav ms-auto">
                    <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                    <?php if (!isset($_SESSION["login"])) : ?>
                        <a class="nav-link" href="user/registrasi.php">Registrasi</a>
                        <a class="nav-link" href="user/login.php">Login</a>
                    <?php else : ?>
                        <a class="nav-link" href="user/logout.php">Logout</a>
                    <?php endif; ?>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <h1 class="text-center">Daftar List VidStream</h1>
        <div class="row mt-3">
            <table class="table table-bordered border-dark table-striped">
                <thead align="center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Tanggal Rilis</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $i = 1 ?>
                    <?php foreach ($data_video_streaming as $key => $dvs) : ?>
                        <tr>
                            <th scope="row"><?= $i + $awalData ?></th>
                            <td align="center"><?= $dvs["title"]; ?></td>
                            <td align="center"><?= $dvs["vid_type"]; ?></td>
                            <td align="center"> <?= date("d M, Y", strtotime($dvs["vid_release"])); ?></td>
                            <td align="center">
                                <a href="video/detail.php?id=<?= $dvs["id"]; ?>" class="text-decoration-none text-dark">Detail</a>
                                <?php if (isset($_SESSION["login"])) : ?>
                                    | <a href="video/ubah.php?id=<?= $dvs["id"]; ?>" class="text-decoration-none text-warning">Ubah</a> |
                                    <a href="video/hapus.php?id=<?= $dvs["id"]; ?>&img=<?= $dvs["cover"]; ?>" onclick="return confirm('yakin?');" class="text-decoration-none text-danger">Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?> -->
                </tbody>
            </table>
        </div>
        <?php if (isset($_SESSION["login"])) : ?>
            <a href="video/tambah.php">Tambah Data Video</a>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>