<?php
	ini_set('display_errors', 1);
	require('../controladoresBD/UsuariosBD.php');

	session_start();


	if(isset($_GET['usr']) && is_numeric($_GET['usr'])) {
		$usuario = UsuariosBD::getUserByID($_GET['usr']);
		UsuariosBD::actualizarPermisos($usuario['id_user'], $_POST['permiso']);

		header("Location: ../permisos.php");
	}

?>
