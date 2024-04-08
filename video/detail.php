<?php
require '../functions.php';
// tambahin sesuai array getnya
if (!isset($_GET["id"])) {
    header("Location: ../index.php");
    exit;
}
$id = $_GET["id"];
// $data_video_streaming = query("SELECT * FROM videos WHERE id='$id'");
$dvt = query("SELECT * FROM videos WHERE id = $id")[0];
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
    <div class="container py-5 text-center">
        <h1><?= $dvt["title"]; ?></h1>
        <img src="../img/661262eb23983.jpeg" alt="" width="200">
        <div class="row mt-3">
            <?php  ?>
            <p><?= $dvt["synopsis"] ?></p>
            <p>Tipe Video : <?= $dvt["vid_type"]; ?></p>
            <p>Episode : <?= $dvt["episodes"]; ?></p>
            <p>Tanggal Rilis : <?= date("d M, Y", strtotime($dvt["vid_release"])); ?></p>
            <p>Pemeran : <?= $dvt["cast"]; ?></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>