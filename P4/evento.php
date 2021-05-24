<?php
ini_set('display_errors', 1);
	require_once "./vendor/autoload.php";
	include("controladoresBD/EventosBD.php");
	include("controladoresBD/ComentariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$sesion = false;

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$evento = EventosBD::getEvento($idEv);
	$comentarios = ComentariosBD::getComentarios($idEv);

	echo $twig->render('evento.html', ['id_evento' => $idEv, 'evento' => $evento,
	                                   'comentarios' => $comentarios, 'sesion' => $sesion]);
?>
