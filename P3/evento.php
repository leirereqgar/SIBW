<?php
	require_once "./vendor/autoload.php";
	include("controladoresBD/controladorBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$evento = getEvento($idEv);
	$comentarios = getComentarios($idEv);

	echo $twig->render('evento.html', ['id_evento' => $idEv, 'evento' => $evento,
	                                   'comentarios' => $comentarios]);
?>
