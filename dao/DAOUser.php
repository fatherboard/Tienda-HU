<?php

include_once('DAO.php');
include_once('TOUser.php');

/* Data Access Object */
class DAOUser extends DAO {

	/*  El DAO utiliza el Trasfer Object (TO) para pasarnos la info
	 *  del user. Y nosotros podemos usar el TO para modificarlo, o crear uno,
	 *  y darselo al DAO para que lo use.
	 */
	
	public function __construct(){
		parent::__construct();
	}
	

	public function insert_User($TOUser){
		$mail = $mail = $TOUser->get_email();
        $pass = $TOUser->get_password();
        $username = $TOUser->get_username();
		$name = $TOUser->get_name();
		$address = $TOUser->get_address();
		$sql = "INSERT INTO user SET email='$mail' , password='$pass', username='$username', name='$name', address='$address'";
		
		if (!$this->insertarConsulta($sql))
			return false;
		else 
		{
			return true;
		}
	}

	
	public function search_userId($userId){
		$sql = sprintf("SELECT * FROM user WHERE id = $userId");
		if (!$this->ejecutarConsulta($sql))
			return null;
		
		
		$result = $this->ejecutarConsulta($sql);
		$user = new TOUser($result['id'],$result['email'],$result['password'],$result['username'], $result['name'], $result['address']);
		return $user;
		
	}

	public function search_username($username){
		$sql = sprintf("SELECT * FROM user WHERE username = '" .$username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id'],$result['email'],$result['password'],$result['username'], $result['name'], $result['address']);
			return $user;
		}	
	}

	public function update_email($username,$mail){
		$sql = sprintf("UPDATE user SET email ='" .$mail. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

	public function update_password($username,$pass){	
		$sql = sprintf("UPDATE user SET password = 	'" .$pass. "' WHERE username = '" .$username. "' ");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id'],$result['email'],$result['password'],$result['username'], $result['name'], $result['address']);
			return $user;
		}
	}

	public function update_user_name($old_username, $new_username){
		$sql = sprintf("UPDATE user SET username = '" .$new_username. "' WHERE username = '" . $old_username. "'");
		if (!$this->ejecutarConsulta($sql))
			return null;
		else 
		{
			$result = $this->ejecutarConsulta($sql);
			$user = new TOUser($result['id'],$result['email'],$result['password'],$result['username'], $result['name'], $result['address']);
			return $user;
		}
	}

	public function update_name($username, $new_name){
		$sql = sprintf("UPDATE user SET name = '" .$new_name. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

	public function update_address($username, $address){
		$sql = sprintf("UPDATE user SET address = '" .$address. "' WHERE username = '" .$username. "' ");
		$result = $this->insertarConsulta($sql);
		if ($result == null)
			return null;
		else 
			return true;
	}

}
