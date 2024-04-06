<?php
// tambahin sesuai array getnya
if (!isset($_GET["judul"]) || !isset($_GET["ep"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFLIX | <?= $_GET["judul"]; ?></title>
</head>

<body>
    <h1><?= $_GET["judul"]; ?></h1>
    <p>Episode : <?= $_GET["ep"]; ?></p>
    <a href="index.php">Balik</a>
</body>

</html>