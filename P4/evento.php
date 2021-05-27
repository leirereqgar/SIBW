<?php
	ini_set('display_errors', 1);
	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");
	require("controladoresBD/EventosBD.php");
	require("controladoresBD/ComentariosBD.php");

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

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$evento = EventosBD::getEvento($idEv);
	$comentarios = ComentariosBD::getComentarios($idEv);

	echo $twig->render('evento.html', ['id_evento' => $idEv, 'evento' => $evento,
	                                   'comentarios' => $comentarios,
	                                   'usuario' => $usuario, 'edicion' => $edicion]);
?>
