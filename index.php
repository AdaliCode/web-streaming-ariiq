<?php
$nama_web_streaming = 'AFLIX';
$tipe_video_streaming = array('Film', 'Series', 'Anime', 'Variety Show Korea', 'Drama Korea');
require 'functions.php';
$data_video_streaming = query("SELECT * FROM videos");
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
    <div class="container py-5">
        <h1 class="text-center"><?= $nama_web_streaming; ?></h1>
        <div class="row my-3">
            <?php foreach ($data_video_streaming as $key => $dvs) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card border border-dark">
                        <div class="card-body text-center">
                            <h3><?= $dvs['title']; ?> - 2024</h3>
                            <a href="detail.php?judul=<?= $dvs['title']; ?>&ep=<?= $dvs['episodes'] ?>">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <form action="tambah.php" method="post">
            Masukkan Judul Video : <input type="text" name="judul">
            <button type="submit" name="submit">Kirim!</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>