<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/DAOuser.php');
include_once('dao/DAOOrder.php');
include_once('dao/DAOProduct.php');
include_once('dao/DAOOProduct.php');

$dao_user = new DAOUser();
$user = $dao_user->search_username($_SESSION["username"]);
$username = $user->get_username();
$id = $user->get_id();
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
            <?php
            $dao_order = new DAOOrder();
            $dao_order_products = new DAOOProduct;
            $pedidos = $dao_order->show_user_orders($id);
            while (!empty($pedidos)) {
                $curr_order = array_shift($pedidos);
                //something to show the images
                $orderId = $curr_order->get_id();
                $orderTotal = $curr_order->get_subtotal();
                $orderDate = $curr_order->get_date();
            ?>

                <h3>• ID Pedido: </br><?php echo $orderId; ?></h3>
                <h3>• Total: </br><?php echo $orderTotal; ?></h3>
                <h3>• Fecha: </br><?php echo $orderDate; ?></h3>


                <?php

                $orderProducts = $dao_order_products->show_order_items($orderId);
                $filePath = "img/products/" . $prodId . ".png";
                if (file_exists($filePath)) { ?>
                    <div class="store"><img class="productPic" alt="foto_producto" src=" <?php echo $filePath ?>">
                    <?php } else { ?>
                        <img class="productPic" alt="foto_producto_noencontrado" src="img/notfound.jpg">
                <?php }


                echo '<h2 class="storeProduct">' . $prodName . '</h2>';
                echo "</br></br>";
                echo '<div class="description">';
                echo $prodDes;
                echo '</div>';
                echo "</br></br>";
                echo $prodPri . ' € <button class="primaryButton" onclick="window.location.href=\'add_carrito.php?id=' . $prodId . '\'">Añadir al carrito</button> ';
                echo "</br></br>";
                echo '</div>';
            }

                ?>
                    </div>
    </main>
</body>