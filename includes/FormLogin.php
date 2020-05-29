<?php

include_once('includes/Form.php');
require_once('dao/DAOUser.php');

class FormLogin extends Form
{

	public function __construct()
	{
		parent::__construct('login', 'login');
	}

	protected function generaCampos()
	{
		$html  =
			'<div class="container">
			<h1>¿De vuelta a hu?</h1>

			<div>
			<input name="username" type="text" id="username" placeholder="Nombre de usuario" required="">
			</div>
			<div>
			<input name="password" type="password" id="password" placeholder="Contraseña" required="">
			</div>
			<div>
			<button class="primaryButton" type="submit" name="login" id="submit">ENTRAR</button>
            </div>
            </div>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{
		/* DEBUG
		echo $datos['username'];
		echo $datos['password'];
		*/

		$_SESSION['error_login'] = [];
		$username = isset($datos['username']) ? $datos['username'] : null;
		$password = isset($datos['password']) ? $datos['password'] : null;
		$dao_usuario = new DAOUser();

		if (empty($username)) {
			$_SESSION['error_login'][] = "El nombre de usuario no puede estar vacío";
		}

		if (empty($password)) {
			$_SESSION['error_login'][] = "El password no puede estar vacío.";
		}
		$userData = $dao_usuario->search_username($username);

		if (count($_SESSION['error_login']) == 0) {

			if ($userData == null) {
				$_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos.";
				return "entrar.php";
			} else {
				if ($userData instanceof TOUser) {
					$encrypted = $userData->get_password();
					if (password_verify($password, $encrypted)) {
						$_SESSION['login'] = '1';
						$_SESSION['username'] = $username;
						return "perfil.php";
					}
					else {
						$_SESSION['error_login'][] = "Usuario y/o contraseña no son correctooooos";
						return "entrar.php";
					}
				} 
			}
		} else {
			return "entrar.php";
		}
	}
}

?>