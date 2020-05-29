<?php

include_once('DAO.php');
include_once('TOProducts.php');

/* Data Access Object */
class DAOProducts extends DAO
{

    /*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */

    public function __construct()
    {
        parent::__construct();
    }


    public function insert_Product($TOProducts)
    {
        $name = $TOProducts->get_email();
        $description = $TOProducts->get_password();
        $price = $TOProducts->get_username();
        $sql = "INSERT INTO products SET name='$name' , description='$description', price='$price'";

        if (!$this->insertarConsulta($sql))
            return false;
        else {
            return true;
        }
    }


    public function search_product($id)
    {
        $sql = sprintf("SELECT * FROM products WHERE id = $id");
        if (!$this->ejecutarConsulta($sql))
            return null;


        $result = $this->ejecutarConsulta($sql);
        $product = new TOUser($result['id'], $result['name'], $result['description'], $result['price']);
        return $product;
    }

    public function update_name($id, $name)
    {
        $sql = sprintf("UPDATE products SET name ='" . $name . "' WHERE id = '" . $id . "' ");
        $result = $this->insertarConsulta($sql);
        if ($result == null)
            return null;
        else
            return true;
    }

    public function update_description($id, $description)
    {
        $sql = sprintf("UPDATE products SET description = 	'" . $description . "' WHERE id = '" . $id . "' ");
        if (!$this->ejecutarConsulta($sql))
            return null;
        else {
            return true;
        }
    }

    public function update_price($id, $price)
    {
        $sql = sprintf("UPDATE products SET price = '" . $price . "' WHERE id = '" . $id . "'");
        if (!$this->ejecutarConsulta($sql))
            return null;
        else {
            return true;
        }
    }
}
