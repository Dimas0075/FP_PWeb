<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOEFL</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>
    <nav>
        <!-- dikelompokkan ke navigasi menggunakan elemen "nav" karena termasuk dalam navigasi -->
        <ul>
            <li><a href="<?= BASEURL; ?>">Home</a></li>
            <li><a href="<?= BASEURL; ?>/mahasiswa">Peserta</a></li>
            <!-- <li><a href="<?= BASEURL; ?>/admin">Admin</a></li> -->
            <li style="float:right"><a href="<?= BASEURL; ?>/login">Login</a></li>
            <li style="float:right"><a href="#" role="button" data-toggle="modal" data-target="#formModal">Daftar</a></li>
        </ul>
    </nav>