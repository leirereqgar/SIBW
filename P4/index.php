<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	include("controladoresBD/UsuariosBD.php");
	include("controladoresBD/EventosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	$usuario = "";

	if(isset($_SESSION['id_user']))
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);


	$eventos = EventosBD::getAllEventos();

	echo $twig->render('index.html', ['eventos' => $eventos, 'usuario' => $usuario]);
?>
