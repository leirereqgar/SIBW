<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	$superusuario = false;
	$usuario = UsuariosBD::getUserByID($_GET['usr']);

	if(isset($_SESSION['id_user'])){
		$mi_usuario = UsuariosBD::getUserByID($_SESSION['id_user']);

		$superusuario = UsuariosBD::compararPermisos($mi_usuario['tipo'], 'superusuario');
	}


	echo $twig->render('otraCuenta.html', ['usuario' => $usuario, 'superusuario' => $superusuario]);
?>
