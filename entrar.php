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
    <link rel="icon" type="image/png" href="img/hu16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/hu32.png" sizes="32x32">

</head>

<body>

    <main>
        <?php
        require("includes/FormLogin.php");
        require("includes/FormRegister.php");
        $formLogin = new FormLogin();
        $formRegister = new FormRegister();
        echo '<svg class="entrarBackground" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79.42 61.85"><defs><style>.cls-1{fill:#ffb317;}</style></defs><title>Untitled-1</title><polygon points="1.98 14.01 2.98 14.01 2.98 14.01 1.98 14.01 1.98 14.01"/><path d="M91,27.38v0Z" transform="translate(-79.02 -16.99)"/><path d="M80,15.92Z" transform="translate(-79.02 -16.99)"/><path d="M92,5" transform="translate(-79.02 -16.99)"/><path d="M151.8,75.3l-6.27.85.72-4.83-.16,0A23.64,23.64,0,0,1,132,78.65c-6.11.83-12.85-.76-10.4-11.27l3.71-16,.38-1.51.22-.94,5-21.81L98.43,31.57l-3,13.08.16,0a20.6,20.6,0,0,1,6-4.53,23.64,23.64,0,0,1,7.6-2.52c5.21-.71,13,.62,10.61,10.93l-4.14,17.81-7.08,1,4-17.19c1.12-4.82-.25-8.59-6.94-7.68a15.93,15.93,0,0,0-10.76,6.74,7.11,7.11,0,0,0-1.09,2.66L89.53,69.87l-7.08,1,10.2-43.9,7.08-1,55-7.3-16.05,4.58-.9,3.85-2,8.83L128.84,65.5c-1.32,5.69,0,9.21,6.48,8.33a16.27,16.27,0,0,0,10.48-6.21,9.36,9.36,0,0,0,1.29-2.89l4.26-18.35,7.08-1-5.05,21.76C152.66,70.27,152.09,73,151.8,75.3Z" transform="translate(-79.02 -16.99)"/><path class="cls-1" d="M148.37,73.61l-6.27.86.72-4.84-.16,0A23.59,23.59,0,0,1,128.52,77c-6.11.84-12.84-.76-10.4-11.27l3.71-16,.38-1.51.22-.94,5-21.81L95,29.88,92,43l.16,0a20.51,20.51,0,0,1,6-4.53,23.74,23.74,0,0,1,7.59-2.52c5.22-.71,13,.63,10.61,10.94l-4.14,17.8-7.08,1,4-17.19c1.12-4.82-.25-8.59-6.94-7.67a15.92,15.92,0,0,0-10.76,6.73,7.11,7.11,0,0,0-1.09,2.66L86.1,68.19l-7.08,1,10.2-43.9,7.08-1,55-7.3-16.05,4.58-.9,3.85-2.05,8.83-6.87,29.56c-1.32,5.69,0,9.21,6.48,8.34a16.32,16.32,0,0,0,10.48-6.22,9.3,9.3,0,0,0,1.29-2.88l4.26-18.35,7.08-1L150,65.5C149.23,68.59,148.66,71.3,148.37,73.61Z" transform="translate(-79.02 -16.99)"/></svg>';
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
        }
        
        if (isset($_SESSION['error_registro'])) {
            if (count($_SESSION['error_registro']) > 0) {
                echo '<ul class="errores">';
            }

            foreach ($_SESSION['error_registro'] as $error) {
                echo "<li>$error</li>";
            }

            if (count($_SESSION['error_registro']) > 0) {
                echo '</ul>';
            }
            unset($_SESSION['error_registro']);
        }
        ?>


    </main>



</body>