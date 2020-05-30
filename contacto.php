<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/DAOMessage.php');
include_once('dao/DAOUser.php');
$dao_product = new DAOMessage();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dao_user = new DAOUser();
    $dao_message = new DAOMessage();
    $userId = $dao_user->search_username($_SESSION['username'])->get_id();
    $message = htmlspecialchars(trim(strip_tags($_POST['message'])));
    $packet = new TOMessage('', $userId, $message);
    $dao_message->insert_message($packet);
    $dao_user->disconnect();
    header('Location: index.php?mensajeEnviado');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>tienda</title>
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
        <h1>Contactar con hu</h1>
        <h3>Te enviaremos la respuesta a tus dudas o propuestas al email vinculado a tu cuenta.</h3>
        </br>
        <?php

        if (isset($_SESSION['login']) && $_SESSION['login']) {
                echo "<form action=\"\" method=\"post\">";
                echo '<textarea name="message" rows="10" cols="200" placeholder="Dudas, sugerencias, problemas... ¡Ayúdanos a mejorar!"></textarea>';
                echo "<input class=\"primaryButton\" type=\"submit\" name=\"enviar\" value=\"Enviar\" />";
                echo "</form>";
        } else {
            echo "Necesitas estar logueado para enviarnos mensajes desde la plataforma";
        }
        
        ?>
    </main>

</body>