<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	if(isset($_SESSION['id_user'])){
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);
	}

	$superusuario = false;
	if(UsuariosBD::compararPermisos($usuario['tipo'], 'superusuario'))
		$superusuario = true;


	echo $twig->render('miCuenta.html', ['usuario' => $usuario, 'superusuario' => $superusuario]);
?>
