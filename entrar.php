<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html>

<head>

    <title>homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet" />

</head>

<body>
    <?php require("includes/common/navbar.php") ?>

    <main>
        <?php
        require("includes/FormLogin.php");
        require("includes/FormRegister.php");
        $formLogin = new FormLogin();
        $formRegister = new FormRegister();
      
        echo '<div class="split left">
                <div class="upperLeft">
                <a href="index.php">
                <- Volver
                </a>
                </div>
                <div class="centered">';
        $html = $formLogin->gestiona();
        echo '</div></div>';

        echo '<div class="split right">
                <div class="centered">';
        $html = $formRegister->gestiona();
        echo '</div></div>';

        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['error_login'])) {
            if (count($_SESSION['error_login']) > 0) {
                echo '<ul class="errores">';
            }

            foreach ($_SESSION['error_login'] as $error) {
                echo "<li>$error</li>";
            }

            if (count($_SESSION['error_login']) > 0) {
                echo '</ul>';
            }
            unset($_SESSION['error_login']);
        } ?>


    </main>



</body>