<?php
	ini_set('display_errors', 1);

	require("../controladoresBD/UsuariosBD.php");
	require("../controladoresBD/EventosBD.php");
	require("../controladoresBD/ComentariosBD.php");

	session_start();

	if(isset($_GET['ev'])) {
		$idEv = $_GET['ev'];

		if(isset($_SESSION['id_user'])) {
			if($_SERVER['REQUEST_METHOD'] === 'POST') {
				ComentariosBD::nuevoComentario($idEv, $_SESSION['id_user'], $_POST['comentario']);
			}
		}

		header("Location: ../evento.php?ev=".$idEv);
		exit();
	}
?>
