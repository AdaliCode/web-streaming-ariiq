<?php
require 'functions.php';
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambah
    if (tambah($_POST) > 0) {
        # code...
        echo
        "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
         </script>
        ";
    } else {
        echo
        "<script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
         </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Video Streaming</title>
</head>

<body>
    <h1>Tambah Data Video</h1>
    <form action="" method="post">
        <ul>
            <!-- required itu berarti harus ada -->
            <li>
                <label for="title">Judul : </label>
                <input type="text" name="title" id="title" required>
            </li>
            <li>
                <label for="vid_type">Tipe : </label>
                <input type="text" name="vid_type" id="vid_type" required>
            </li>
            <li>
                <label for="synopsis">Sinopsis : </label>
                <input type="synopsis" name="synopsis" id="synopsis" required>
            </li>
            <li>
                <label for="episode">episode : </label>
                <input type="number" name="episodes" id="episodes" required>
            </li>
            <li><button type="submit" name="submit">Tambah Data</button></li>
        </ul>
    </form>
</body>

</html>