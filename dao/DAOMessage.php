<?php

include_once('DAO.php');
include_once('TOMessage.php');

/* Data Access Object */
class DAOMessage extends DAO
{

    /*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */

    public function __construct()
    {
        parent::__construct();
    }


    public function insert_message($TOMessage)
    {
        $user = $TOMessage->get_user();
        $message = $TOMessage->get_message();
        $sql = "INSERT INTO messages SET user='$user' , content='$message'";

        if (!$this->insertarConsulta($sql))
            return false;
        else {
            return true;
        }
    }
}
