<?php
require '../functions.php';
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambah
    if (tambah($_POST) > 0) {
        echo
        "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../index.php';
         </script>
        ";
    } else {
        echo
        "<script>
            alert('data gagal ditambahkan!');
            document.location.href = '../index.php';
         </script>
        ";
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $nama_web_streaming; ?> | Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center">Tambah Data VidStream</h1>
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class=" mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="vid_type" class="form-label">Tipe</label>
                        <input type="text" class="form-control" id="vid_type" name="vid_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input class="form-control" type="file" id="cover" name="cover">
                    </div>
                    <div class="mb-3">
                        <label for="vid_release" class="form-label">Tanggal Rilis</label>
                        <input type="date" class="form-control" id="vid_release" name="vid_release" required>
                    </div>
                    <div class="mb-3">
                        <label for="episodes" class="form-label">Jumlah Episode</label>
                        <input type="number" class="form-control" id="episodes" name="episodes" required>
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Sinopsis</label>
                        <textarea class="form-control" id="synopsis" rows="10" name="synopsis"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>