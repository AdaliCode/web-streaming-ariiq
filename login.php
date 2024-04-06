<?php
// cek apakah tombol submit udh dipencet
if (isset($_POST["submit"])) {
    if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
        header("Location: admin.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login Admin</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username atau Pass Salah</p>
    <?php endif; ?>
    <ul>
        <form action="admin.php" method="post">
            <li>
                <!-- label dan input bisa berhubungan dengan menggunakan label for dan input id -->
                <!-- jangan lupa kunjungi snippet -->
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <!-- label dan input bisa berhubungan dengan menggunakan label for dan input id -->
                <!-- jangan lupa kunjungi snippet -->
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
        </form>
    </ul>
</body>

</html>