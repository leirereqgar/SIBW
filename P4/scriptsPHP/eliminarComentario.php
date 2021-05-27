<?php
	ini_set('display_errors', 1);

	require("../controladoresBD/UsuariosBD.php");
	require("../controladoresBD/EventosBD.php");
	require("../controladoresBD/ComentariosBD.php");

	session_start();

	if(isset($_GET['ev']) && isset($_GET['cm'])) {
		if(is_numeric($_GET['ev']) && is_numeric($_GET['cm'])){
			$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);

			if(UsuariosBD::compararPermisos($usuario['tipo'], "moderador"))
				ComentariosBD::eliminarComentario($_GET['cm']);

			header("Location: ../evento.php?ev=".$_GET['ev']);
			exit();
		}
	}
?>
