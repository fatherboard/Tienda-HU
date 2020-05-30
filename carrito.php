<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/DAOProduct.php');
$dao_product = new DAOProduct();
?>

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
    <?php require("includes/common/watermark.php") ?>
    <?php require("includes/common/navbar.php") ?>
    <main>
        <h2>Mi carrito</h2>

        <?php
        if (isset($_SESSION['cart'])) {
            
            $ids = implode(',', $_SESSION['cart']);
            $inCart = $dao_product->get_products($ids);

            if (!empty($inCart)) {
                $total = 0;
                while (!empty($inCart)) {
                    $curr_product = array_shift($inCart);
                    //something to show the images
                    $prodId = $curr_product->get_id();
                    $prodName = $curr_product->get_name();
                    $prodPri = $curr_product->get_price();
                    $total += $prodPri;

                    $filePath = "img/products/" . $prodId . ".png";
                    if (file_exists($filePath)) { ?>
                        <div class="cart"><img class="cartPic" alt="foto_producto" src=" <?php echo $filePath ?>">
                        <?php } else { ?>
                            <img class="cartPic" alt="foto_producto_noencontrado" src="img/notfound.jpg">
            <?php }


                    echo '<h2 class="cartName">' . $prodName . ' </h2>';
                    echo '<h2 class="cartPrice"> ' . $prodPri . '€</h2>';
                    echo '</div>';
                }
                echo '<h2 class="cartTotal">Total: ' . $total . '€</h2>';
                echo '<button class="primaryButton" onclick="window.location.href=\'add_carrito.php?id=' . $prodId . '\'">Realizar pedido</button>';
            }
        }
            ?>
    </main>

</body>