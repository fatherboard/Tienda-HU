<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/DAOProduct.php');
$dao_product = new DAOProduct();
$products = $dao_product->show_all_products();
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

        <h1>Nuestros Productos</h1>
        <?php
        while (!empty($products)) {
            $curr_product = array_shift($products);
            //something to show the images
            $prodId = $curr_product->get_id();
            $prodName = $curr_product->get_name();
            $prodDes = $curr_product->get_description();
            $prodPri = $curr_product->get_price();


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
        $dao_product->disconnect();
            ?>

    </main>

</body>