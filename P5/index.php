<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");
	require("controladoresBD/EventosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	$usuario = "";
	$edicion = false;

	if(isset($_SESSION['id_user'])){
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);

		if(UsuariosBD::compararPermisos($usuario['tipo'], "gestor"))
			$edicion = true;
	}


	$eventos = EventosBD::getAllEventos($edicion);

	echo $twig->render('index.html', ['eventos' => $eventos, 'usuario' => $usuario, 'edicion' => $edicion]);
?>
