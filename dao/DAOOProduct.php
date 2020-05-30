<?php

include_once('DAO.php');
include_once('TOOProduct.php');

/* Data Access Object */
class DAOOProduct extends DAO
{

    /*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */

    public function __construct()
    {
        parent::__construct();
    }


    public function insert_Product($TOOProduct)
    {
        $order = $TOOProduct->get_order();
        $item = $TOOProduct->get_item();
        $price = $TOOProduct->get_price();
        $sql = "INSERT INTO orders_products SET order_id='$order' , item='$item' , price='$price'";

        if (!$this->insertarConsulta($sql))
            return false;
        else {
            return true;
        }
    }


    public function show_order_items($id)
    {
        $sql = sprintf("SELECT * FROM orders_products WHERE order_id=$id ORDER BY item DESC");
        $query = $this->devolverConsulta($sql);
        $array = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $product = new TOOProduct(
                $result['id'],
                $result['order_id'],
                $result['item'],
                $result['price']
            );

            array_push($array, $product);
        }

        return $array;
    }
}
