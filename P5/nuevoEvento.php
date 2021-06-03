<?php
	ini_set('display_errors', 1);
	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");
	require("controladoresBD/EventosBD.php");
	require("controladoresBD/ComentariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	if(isset($_SESSION['id_user'])) {
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);
		if(UsuariosBD::compararPermisos($usuario['tipo'], "gestor")){
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$evento['nombre'] = $_POST['nombre'];
				$evento['organizacion'] = $_POST['organizador'];
				$evento['fecha'] = $_POST['fecha'];
				$evento['descripcion'] = $_POST['descripcion'];
				$evento['logo'] = $_POST['logo'];
				$evento['imagen1'] = $_POST['imagen1'];
				$evento['imagen2'] = $_POST['imagen2'];

				EventosBD::insertarEvento($evento);

				header("Location: index.php");
				exit();
			}
		}
	}

	echo $twig->render('nuevoEvento.html', []);
?>
