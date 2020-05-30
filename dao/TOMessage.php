<?php

/* Transfer Object */
class TOMessage {

	private $id;
	private $user;
	private $message;
	


	function __construct($id='',$user='',$message=''){
		$this->id = $id;
		$this->user = $user;
		$this->message = $message;
	}

	public function set_user($user){
		$this->user = $user;
	}

	public function set_message($message){
		$this->message = $message;
	}

	/* Get functions ################################################################# */

	public function get_order_product(){
		// devuelve un array con todos los datos de producto
		$columna = [
		    "id" => $this->id,
		    "user" => $this->user,
		    "message" => $this->message
		];

		return $columna;
	}
	
	public function get_id(){
		return $this->id;
	}

	public function get_user(){
		return $this->user;
	}

	public function get_message(){
		return $this->message;
    }
}
?>