<?php

include_once('DAO.php');
include_once('TOOrder.php');

/* Data Access Object */
class DAOOrder extends DAO
{

    /*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */

    public function __construct()
    {
        parent::__construct();
    }


    public function insert_Product($TOOrder)
    {
        $user = $TOOrder->get_user();
        $subtotal = $TOOrder->get_subtotal();
        $sql = "INSERT INTO orders SET user='$user' , subtotal='$subtotal'";

        if (!$this->insertarConsulta($sql))
            return false;
        else {
            return true;
        }
    }


    public function show_all_orders()
    {
        $sql = sprintf("SELECT * FROM orders ORDER BY id DESC");
        $query = $this->devolverConsulta($sql);
        $array = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $product = new TOOrder(
                $result['id'],
                $result['user'],
                $result['subtotal'],
                $result['date']
            );

            array_push($array, $product);
        }

        return $array;
    }

    public function search_order($id)
    {
        $sql = sprintf("SELECT * FROM orders WHERE id = $id");
        if (!$this->ejecutarConsulta($sql))
            return null;


        $result = $this->ejecutarConsulta($sql);
        $product = new TOOrder($result['id'], $result['name'], $result['description'], $result['price']);
        return $product;
    }

}
