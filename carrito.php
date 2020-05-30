<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/DAOProduct.php');
include_once('dao/DAOUser.php');
include_once('dao/DAOOrder.php');
include_once('dao/DAOOProduct.php');

$dao_product = new DAOProduct();
$dao_user = new DAOUser();
$dao_order = new DAOOrder();
$dao_order_product = new DAOOProduct();

$userId = $dao_user->search_username($_SESSION['username'])->get_id();


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $key = array_search($id, $_SESSION['cart']);
    if (false !== $key) {
        unset($_SESSION['cart'][$key]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['realizarPedido'])) {
    $subtotal = $_POST['total'];
    $productIds = $_SESSION['cart'];
    $order = new TOOrder('', $userId, $subtotal, '');
    $dao_order->insert_order($order);
    $orderId = $dao_order->get_last_id();
    foreach($productIds as $product){
        $productPrice = $dao_product->get_product($product)->get_price();
        $order_product = new TOOProduct('', $orderId, $product, $productPrice);
        $dao_order_product->insert_Product($order_product);
    }
    unset($_SESSION['cart']);
    header('Location: perfil.php');
    
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>carrito</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet" />

</head>

<body>
    <?php require("includes/common/watermark.php") ?>
    <?php require("includes/common/navbar.php") ?>
    <main>
        <h2>Mi carrito</h2>

        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $idArray = $_SESSION['cart'];
            $ids = implode(',', $idArray);
            $inCart = $dao_product->get_products($ids);


            $total = 0;
            while (!empty($inCart)) {
                $curr_product = array_shift($inCart);
                //something to show the images
                $prodId = $curr_product->get_id();
                $prodName = $curr_product->get_name();
                $prodPri = $curr_product->get_price();
                

                $filePath = "img/products/" . $prodId . ".png";
                if (file_exists($filePath)) { ?>
                    <div class="cart"><img class="cartPic" alt="foto_producto" src=" <?php echo $filePath ?>">
                    <?php } else { ?>
                        <img class="cartPic" alt="foto_producto_noencontrado" src="img/notfound.jpg">
            <?php }

                $cnt = count(array_keys($idArray, $prodId));
                echo '<h2 class="cartName">' . $prodName;
                if ($cnt > 1) {
                    echo ' x' . $cnt;
                }
                $total += $prodPri * $cnt;
                echo '</h2>';
                echo '<h2 class="cartPrice"> ' . $prodPri * $cnt . ' €</h2>';
                echo '<div>';
                echo "<form action=\"\" method=\"post\">";
                echo '<input type="hidden" name="id" value=' . $prodId . ' />';
                echo "<input class=\"deleteButton\" type=\"submit\" name=\"borrar\" value=\"Borrar\" />";
                echo "</form>";
                echo '</div></div>';
            }
            echo '<h2 class="cartTotal">Total: ' . $total . ' €</h2>';
            echo "<form action=\"\" method=\"post\">";
            echo '<input type="hidden" name="total" value=' . $total . ' />';
            echo "<input class=\"primaryButton\" type=\"submit\" name=\"realizarPedido\" value=\"Realizar Pedido\" />";
            echo "</form>";
        }

        else {
            echo "Tu carrito está vacío";
        }
            ?>
    </main>

</body>