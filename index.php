<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="img/hu16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/hu32.png" sizes="32x32">

</head>

<body>
    <?php require("includes/common/watermark.php") ?>
    <?php require("includes/common/navbar.php") ?>
    <main>
        <h1>hu skateboarding</h1>
        <img class="portada" src="img/resources/portada.jpg" alt="guy skating">
        <h3 class="centrado">Desde 2020 haciendo el mejor material de skate.</h3>
    </main>
</body>