<?php
	ini_set('display_errors', 1);
	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");
	require("controladoresBD/ComentariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	if (isset($_GET['cm'])) {
		$idCm = $_GET['cm'];
	} else {
		$idCm = -1;
	}

	$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);
	$datos = ComentariosBD::getComentario($idEv, $idCm);

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$comentario = $_POST['descripcion'];
		ComentariosBD::actualizarComentario($idCm, $comentario, $usuario['nickname']);
	}

	echo $twig->render('editarComentario.html', ['id_evento' => $idEv, 'id_comentario' => $idCm,
	                                             'datos' => $datos, 'usuario'=>$usuario]);
?>
