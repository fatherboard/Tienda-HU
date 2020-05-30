<?php

/* Transfer Object */
class TOOrder {

	private $id;
	private $user;
	private $subtotal;
	private $date;
    
	function __construct($id='',$user='',$subtotal='',$date=''){
		$this->id = $id;
		$this->user = $user;
		$this->subtotal = $subtotal;
		$this->date = $date;
	}

	public function set_user($user){
		$this->user = $user;
	}

	public function set_subtotal($subtotal){
		$this->subtotal = $subtotal;
	}

	public function set_date($date){
		$this->date = $date;
	}

	/* Get functions ################################################################# */

	public function get_order(){
		// devuelve un array con todos los datos de producto
		$columna = [
		    "id" => $this->id,
		    "user" => $this->user,
		    "subtotal" => $this->subtotal,
		    "date" => $this->date
		];

		return $columna;
	}
	
	public function get_id(){
		return $this->id;
	}

	public function get_user(){
		return $this->user;
	}

	public function get_subtotal(){
		return $this->subtotal;
	}


	public function get_date(){
		return $this->date;
	}
}
?>