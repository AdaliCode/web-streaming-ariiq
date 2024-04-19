<?php
require '../functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script> 
            alert('user baru berhasil ditambahkan');
            document.location.href = 'login.php';
        </script>        
        ";
    } else {
        echo mysqli_error($db);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $nama_web_streaming; ?> | Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3">
                    <div class="card-body">
                        <h1 class="text-center">Halaman Registrasi</h1>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control border border-dark" name="username" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control border border-dark" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">Konfirmasi password</label>
                                <input type="password" class="form-control border border-dark" name="password2" id="password2">
                            </div>
                            <button type="submit" name="register" class="btn btn-primary">Registrasi</button>
                        </form>
                        <p class="mt-3">Sudah Login? Segeralah Lakukan <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>