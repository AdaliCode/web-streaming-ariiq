<?php
session_start();
// require '../functions.php';
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
