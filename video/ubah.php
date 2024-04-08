<?php
require '../functions.php';

$id = $_GET["id"];
$dvt = query("SELECT * FROM videos WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambah
    if (ubah($_POST, $id) > 0) {
        # code...
        echo
        "<script>
            alert('data berhasil diubah!');
            document.location.href = '../index.php';
         </script>
        ";
    } else {
        // buat meriksa errrornya dimana
        mysqli_error($db);

        echo
        "<script>
            alert('data gagal diubah!');
            document.location.href = '../index.php';
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
    <title>Ubah Data Video Streaming</title>
</head>

<body>
    <h1>Ubah Data Video</h1>
    <form action="" method="post">
        <ul>
            <!-- required itu berarti harus ada -->
            <li>
                <label for="title">Judul : </label>
                <input type="text" name="title" id="title" value="<?= $dvt["title"]; ?>" required>
            </li>
            <li>
                <label for=" vid_type">Tipe : </label>
                <input type="text" name="vid_type" id="vid_type" value="<?= $dvt["vid_type"]; ?>" required>
            </li>
            <li>
                <label for=" vid_release">Tipe : </label>
                <input type="date" name="vid_release" id="vid_release" value="<?= $dvt["vid_release"]; ?>" required>
            </li>
            <li>
                <label for="synopsis">Sinopsis : </label>
                <input type="synopsis" name="synopsis" id="synopsis" value="<?= $dvt["synopsis"]; ?>" required>
            </li>
            <li>
                <label for="episode">episode : </label>
                <input type="number" name="episodes" id="episodes" value="<?= $dvt["episodes"]; ?>" required>
            </li>
            <li><button type="submit" name="submit">Ubah Data</button></li>
        </ul>
    </form>
</body>

</html>