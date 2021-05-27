<?php
	ini_set('display_errors', 1);
	require('../controladoresBD/UsuariosBD.php');

	session_start();

	$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);
	$valores = array ('intento' => true, 'correo' => $_POST['n_correo'],
	                  'correo_valido' => false, 'nickname' => $_POST['n_nickname'],
	                  'nick_valido' => false);

	if(!empty($valores['n_nickname'])){
		$valores['nick_valido'] = UsuariosBD::verificarNickname($valores['n_nickname']);

		if($valores['nick_valido'])
			UsuariosBD::actualizarNickname($usuario['id_user'], $valores['n_nickname']);
	}

	if(!empty($valores['n_correo'])){
		$valores['correo_valido'] = UsuariosBD::verificarCorreo($valores['n_correo']);

		if($valores['correo_valido'])
			UsuariosBD::actualizarNickname($usuario['id_user'], $valores['n_correo']);
	}

	if(!empty($_POST['n_password']))
		UsuariosBD::actualizarPassword($usuario['id_user'], password_hash($_POST['n_password'], PASSWORD_BCRYPT));

	//header("Location: ../miCuenta.php");
	//exit();

?>
