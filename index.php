<?php
$nama_web_streaming = 'AFLIX';
$tipe_video_streaming = array('Film', 'Series', 'Anime', 'Variety Show Korea', 'Drama Korea');
$data_video_streaming = array(
    array(
        'judul_video' => 'Running Man', 'tipe_video' => 'Variety Show Korea', 'release' => 2010, 'Sinposis' => 'Running Man adalah acara varietas-realita yang dibintangi oleh Yu Jae Seok dan selebriti lainnya. Di tiap episodenya mereka harus menyelesaikan misi di area terkenal untuk memenangkan lomba. Misi-misinya hampir selalu membuat mereka berlari, dari situlah muncul nama acaranya, dan acara yang menegangkan ini penuh dengan keseruan ketika semua anggota timnya berjuang agar selamat.', 'Pemeran' => 'Yoo Jae Suk, Jee Seok Jin, Kim Jong Kook, Haha, Song Jihyo', 'Episode' => 698
    ),
    array(
        'judul_video' => 'Parasyte: The Grey', 'tipe_video' => 'Drama Korea', 'release' => date("F j, Y", mktime(0, 0, 0, 4, 5, 2024)), 'Sinposis' => 'When unidentified parasites violently take over human hosts and gain power, humanity must rise to combat the growing threat.', 'Pemeran' => 'Jeon So Nee, Kim In Kwon', 'Episode' => 6
    )
);
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
                <div class="col">
                    <div class="card border border-dark">
                        <div class="card-body text-center">
                            <h3><?= $dvs['judul_video']; ?> - <?= $dvs['release']; ?></h3>
                            <a href="detail-video.php?judul=<?= $dvs['judul_video']; ?>&ep=<?= $dvs['Episode']; ?>">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>