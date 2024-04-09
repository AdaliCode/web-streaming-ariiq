<?php
session_start();
require '../functions.php';
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username, bukan cookie yang dicopy
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}
if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
// cek apakah tombol submit udh dipencet
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek adakah username di table users
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' ");

    // mysqli_num_rows ngecek berapa baris yang dikembalikan dari query
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            // cek remember me
            if (isset($_POST['remember'])) {
                # buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
            header("Location: ../index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3">
                    <div class="card-body">
                        <h1 class="text-center">Halaman Login</h1>
                        <?php if (isset($error)) : ?>
                            <p style="color: red; font-style: italic;" class="text-center">Error : Username atau Pass Salah</p>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control border border-dark" name="username" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control border border-dark" name="password" id="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </form>
                        <p class="mt-3">Belum Login? <a href="registrasi.php">Registrasi</a> atuh!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>