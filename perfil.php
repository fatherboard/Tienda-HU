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
    <link rel="icon" type="image/png" href="img/hu16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/hu32.png" sizes="32x32">

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
        

        <div class="orders">
            <h1 class="title">Mis Pedidos</h1>
            <?php
            $dao_order = new DAOOrder();
            $dao_order_products = new DAOOProduct;
            $dao_product = new DAOProduct();
            $pedidos = $dao_order->show_user_orders($id);
            while (!empty($pedidos)) {
                $curr_order = array_shift($pedidos);
                //something to show the images
                $orderId = $curr_order->get_id();
                $orderTotal = $curr_order->get_subtotal();
                $orderDate = $curr_order->get_date();
            ?>
                <div class="order-frame">
                    <div class="order">
                        <h3 class="order-element">• Nº Pedido: </br><?php echo $orderId; ?></h3>
                        <h3 class="order-element">• Total: </br><?php echo $orderTotal; ?> €</h3>
                        <h3 class="order-element">• Fecha: </br><?php echo $orderDate; ?></h3>
                    </div>

                    <?php

                    $orderProducts = $dao_order_products->show_order_items($orderId);

                    while (!empty($orderProducts)) {
                        $curr_item = array_shift($orderProducts);
                        $itemId = $curr_item->get_item();
                        $itemPrice = $curr_item->get_price();
                        $itemName = $dao_product->get_product($itemId)->get_name();

                        $filePath = "img/products/" . $itemId . ".png";
                        if (file_exists($filePath)) { ?>
                            <div class="profileOrder"><img class="orderPic" alt="foto_producto" src=" <?php echo $filePath ?>">
                            <?php } else { ?>
                                <img class="orderPic" alt="foto_producto_noencontrado" src="img/notfound.jpg">
                    <?php }


                        echo '<h4>' . $itemName . ' </h4>';
                        echo '<h4 class="itemPrice">' . $itemPrice . ' €</h4>';
                        echo "</br></br>";
                        echo '</div>';
                    }
                    echo '</div>';
                }
                $dao_user->disconnect();
                    ?>
                            </div>
    </main>
</body>