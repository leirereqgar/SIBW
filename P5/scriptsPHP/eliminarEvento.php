<?php
	ini_set('display_errors', 1);

	require("../controladoresBD/UsuariosBD.php");
	require("../controladoresBD/EventosBD.php");

	session_start();

	if(isset($_SESSION['id_user'])) {
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);

		if(UsuariosBD::compararPermisos($usuario['tipo'], "gestor"))
			EventosBD::eliminarEvento($_GET['ev']);

		header("Location: ../index.php");
		exit();
	}
?>
