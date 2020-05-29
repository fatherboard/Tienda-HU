<?php

/* Transfer Object */
class TOUser {

	private $userId;
	private $email;
	private $password;
	private $user_name;
	private $name;
    private $address;
    
	function __construct($userId='',$email='',$password='',$user_name='', $name='', $address=''){
		$this->userId = $userId;
		$this->email = $email;
		$this->password = $password;
		$this->user_name = $user_name;
		$this->name = $name;
		$this->address = $address;
	}

	public function set_email($correo){
		$this->email = $correo;
	}

	public function set_password($pass){
		$this->password = $pass;
	}

	public function set_user_name($user_name){
		$this->user_name = $user_name;
	}

	/* Get functions ################################################################# */

	public function get_user(){
		// devuelve un array con todos los datos de usuario
		$columna = [
		    "email" => $this->email,
		    "password" => $this->password,
		    "user_name" => $this->user_name,
		    "premium" => $this->premium,
		    "admin" => $this->admin
		];

		return $columna;
	}
	
	public function get_email(){
		return $this->email;
	}

	public function get_password(){
		return $this->password;
	}

	public function get_username(){
		return $this->user_name;
	}


	public function get_id(){
		return $this->userId;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_address(){
		return $this->address;
	}
}
?>