<?php

/* Transfer Object */
class TOProduct {

	private $id;
	private $name;
	private $description;
	private $price;
    
	function __construct($id='',$name='',$description='',$price=''){
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	public function set_description($description){
		$this->description = $description;
	}

	public function set_price($price){
		$this->password = $price;
	}

	public function set_name($name){
		$this->name = $name;
	}

	/* Get functions ################################################################# */

	public function get_product(){
		// devuelve un array con todos los datos de producto
		$columna = [
		    "id" => $this->id,
		    "name" => $this->name,
		    "description" => $this->description,
		    "price" => $this->price
		];

		return $columna;
	}
	
	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_description(){
		return $this->description;
	}


	public function get_price(){
		return $this->price;
	}
}
?>