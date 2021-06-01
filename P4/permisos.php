<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	if(isset($_SESSION['id_user'])){
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);
	}
	$usuarios = UsuariosBD::getAllUsers();

	$usuario_modificar = '';
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id_modificar = $_POST['droplist'];

		if(!empty($id_modificar)) {
			$usuario_modificar = UsuariosBD::getUserByID($id_modificar);
		}
	}


	echo $twig->render('permisos.html', ['usuario' => $usuario, 'usuarios' => $usuarios,
	                                     'usuario_modificar' => $usuario_modificar]);
?>
