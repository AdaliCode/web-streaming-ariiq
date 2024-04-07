<?php
$nama_web_streaming = 'AFLIX';
$tipe_video_streaming = array('Film', 'Series', 'Anime', 'Variety Show Korea', 'Drama Korea');
require 'functions.php';
$data_video_streaming = query("SELECT * FROM videos");
// tombol cari ditekan
if (isset($_POST["cari"])) {
    // nama yang akan query harus sama dengan function cari
    $data_video_streaming = cari($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $nama_web_streaming; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary sticky-top">
        <div class="container my-3">
            <a class="navbar-brand" href=""><?= $nama_web_streaming; ?></a>
            <form class="d-flex" role="search" action="" method="post">
                <input class="form-control me-2" type="search" autofocus placeholder="taroh pencarian..." aria-label="Search" name="keyword" autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
            </form>
        </div>
    </nav>
    <div class="container py-5">
        <a href="video/tambah.php">Tambah Data Video</a>
        <div class="row mt-1">
            <table class="table table-bordered border-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Episode</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_video_streaming as $key => $dvs) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1; ?></th>
                            <td align="center"><img src="img/<?= $dvs["cover"]; ?>" alt="" width="200"></td>
                            <td><?= $dvs["title"]; ?></td>
                            <td><?= $dvs["vid_type"]; ?></td>
                            <td><?= $dvs["episodes"]; ?></td>
                            <td align="center">
                                <a href="video/ubah.php?id=<?= $dvs["id"]; ?>">Ubah</a> |
                                <a href="hapus.php?id=<?= $dvs["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>