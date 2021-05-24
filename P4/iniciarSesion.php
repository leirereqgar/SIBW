<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	include("controladoresBD/UsuariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$valores = array('nickname' => '', 'intento' => false);

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$valores['nickname'] = $_POST['nickname'];
		$valores['intento'] = true;

		$id = UsuariosBD::loginUsuario($valores['nickname'], $_POST['pass']);

		if (!empty($id)) {
			session_start();
			$_SESSION['id_usuario'] = $id;

			header("Location: index.php");
			exit();
		}
	}


	echo $twig->render('iniciarSesion.html', ['valores' => $valores]);
?>
