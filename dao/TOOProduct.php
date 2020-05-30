<?php

/* Transfer Object */
class TOOProduct {

	private $id;
	private $order;
	private $item;
	private $price;


	function __construct($id='',$order='',$item='',$price=''){
		$this->id = $id;
		$this->order = $order;
		$this->item = $item;
        $this->price = $price;
	}

	public function set_order($order){
		$this->order = $order;
	}

	public function set_item($item){
		$this->item = $item;
	}

	public function set_price($price){
		$this->price = $price;
    }
    

	/* Get functions ################################################################# */

	public function get_order_product(){
		// devuelve un array con todos los datos de producto
		$columna = [
		    "id" => $this->id,
		    "order" => $this->order,
		    "item" => $this->item,
            "price" => $this->price
		];

		return $columna;
	}
	
	public function get_id(){
		return $this->id;
	}

	public function get_order(){
		return $this->order;
	}

	public function get_item(){
		return $this->item;
    }
    
    public function get_price(){
		return $this->price;
	}
}
?>