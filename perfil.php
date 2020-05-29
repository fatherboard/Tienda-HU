<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/DAOuser.php');
$dao_user = new DAOUser();
$user = $dao_user->search_username($_SESSION["username"]);
$username = $user->get_username();
$name = $user->get_name();
$email = $user->get_email();
$address = $user->get_address();
?>

<!DOCTYPE html>
<html>

<head>

    <title>profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet" />

</head>

<body>

    <?php require("includes/common/navbar.php") ?>
    <main>
        <div class="personal">
            <h1 class="title">Mis Datos</h1>
            <h3 class="point">• Nombre de usuario: </br><?php echo $username; ?></h3>
            <h3 class="point">• Nombre completo: </br><?php echo $name; ?></h3>
            <h3 class="point">• Email: </br><?php echo $email; ?></h3>
            <h3 class="point">• Dirección de envío: </br><?php echo $address; ?></h3>
        </div>
        <button class="primaryButton" onclick="window.location.href='/page2'">Cambiar información perosnal</button>

        <div class="orders">
            <h1 class="title">Mis Pedidos</h1>



        </div>



    </main>







</body>