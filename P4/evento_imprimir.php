<?php
	require_once "./vendor/autoload.php";
	include("controladoresBD/EventosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$evento = EventosBD::getEvento($idEv);

	echo $twig->render('evento_imprimir.html', ['evento' => $evento,'id_evento' => $idEv]);
?>
