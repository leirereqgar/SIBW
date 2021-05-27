<?php
	ini_set('display_errors', 1);
	require('../controladoresBD/UsuariosBD.php');

	session_start();

	$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);

	$valores = array ('intento' => true, 'correo' => $_POST['correo'],
	                  'correo_valido' => false, 'nickname' => $_POST['nickname'],
	                  'nick_valido' => false);

	if(!empty($valores['nickname'])){

		$valores['nick_valido'] = UsuariosBD::verificarNickname($valores['nickname']);

		if($valores['nick_valido'])
			UsuariosBD::actualizarNickname($usuario['id_user'], $valores['nickname']);
	}

	if(!empty($valores['correo'])){
		$valores['correo_valido'] = UsuariosBD::verificarCorreo($valores['correo']);

		if($valores['correo_valido'])
			UsuariosBD::actualizarNickname($usuario['id_user'], $valores['correo']);
	}

	if(!empty($_POST['password']))
		UsuariosBD::actualizarPassword($usuario['id_user'], password_hash($_POST['password'], PASSWORD_BCRYPT));

	header("Location: ../miCuenta.php");
	exit();

?>
