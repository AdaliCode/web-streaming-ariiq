<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title><?= $nama_web_streaming; ?></title> -->
    <title>AFLIX | <?= $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- logo -->
    <link rel="icon" href="&#x1F923">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <!-- <a class="navbar-brand" href="index.php"><?= $nama_web_streaming; ?></a> -->
            <a class="navbar-brand" href="<?= BASEURL; ?>">AFLIX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <form class="d-flex" role="search" action="<?= BASEURL; ?>/index.php" method="get">
                    <!-- <form class="d-flex" role="search" action="<?= BASEURL; ?>/video/search" method="post"> -->
                    <input class="form-control me-2 border border-success" type="search" autofocus placeholder="taroh pencarian..." aria-label="Search" name="keyword" autocomplete="off" id="keyword">
                    <!-- <input type="hidden" name="page"> -->
                    <!-- <button class="btn btn-primary" type="submit" id="tombolari">Cari</button> -->

                    <!-- menampilkan data pencarian -->
                    <!-- <datalist id="keyword">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </datalist> -->
                </form>
                <div class="navbar-nav ms-auto">
                    <?php if (!isset($_SESSION["login"])) : ?>
                        <a class="nav-link" href="<?= BASEURL; ?>/register">Registrasi</a>
                        <a class="nav-link" href="<?= BASEURL; ?>/login">Login</a>
                    <?php else : ?>
                        <a class="nav-link" href="<?= BASEURL; ?>/login/logout">Logout</a>
                    <?php endif; ?>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>