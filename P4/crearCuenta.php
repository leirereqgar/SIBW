<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$valores = array('nickname' => '', 'nombre' => '',
	                 'apellidos' => '', 'correo' => '',
	                  		'nick_valido' => false,
						  'correo_valido' => false, 'intento' => false);

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$valores['nickname'] = $_POST['nickname'];
		$valores['nombre'] = $_POST['nombre'];
		$valores['apellidos'] = $_POST['apellidos'];
		$valores['correo'] = $_POST['correo'];
		$valores['intento'] = true;

		if (!empty($valores['nickname']))
			$valores['nick_valido'] = UsuariosBD::verificarNickname($valores['nickname']);
		if (!empty($valores['correo']))
			$valores['correo_valido'] = UsuariosBD::verificarCorreo($valores['correo']);

		if (!empty($valores['nombre']) && !empty($valores['apellidos']) &&
				$valores['nick_valido'] && $valores['correo_valido']){
			$id = UsuariosBD::crearNuevoUsuario($valores, password_hash($_POST['pass'],PASSWORD_BCRYPT));

			session_start();
			$_SESSION['id_user'] = $id;
			header("Location: index.php");
			exit();
		}
	}

	echo $twig->render('crearUsuario.html', ['valores' => $valores]);
?>
