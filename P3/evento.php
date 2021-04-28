<?php
	require_once "./vendor/autoload.php";
	include("controladorBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$evento = getEvento($idEv);

	echo $twig->render('evento.html', ['evento' => $evento,'id_evento' => $idEv]);
?>
