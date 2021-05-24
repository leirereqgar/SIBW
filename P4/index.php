<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	include("controladoresBD/EventosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$sesion = false;

	if(!isset($_SESSION)){
		$sesion = false;
	}
	else {
		$sesion = true;
	}

	$eventos = EventosBD::getAllEventos();

	echo $twig->render('index.html', ['eventos' => $eventos, 'sesion' => $sesion]);
?>
