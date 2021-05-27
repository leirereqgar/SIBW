<?php
	ini_set('display_errors', 1);
	require_once "./vendor/autoload.php";
	require("controladoresBD/UsuariosBD.php");
	require("controladoresBD/EventosBD.php");
	require("controladoresBD/ComentariosBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	session_start();

	if (isset($_GET['ev'])) {
		$idEv = $_GET['ev'];
	} else {
		$idEv = -1;
	}

	$usado = false;

	if(isset($_SESSION['id_user'])) {
		$usuario = UsuariosBD::getUserByID($_SESSION['id_user']);
		if($idEv > -1 && UsuariosBD::compararPermisos($usuario['tipo'], "gestor")){
			$evento = EventosBD::getEvento($idEv);

			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$usado = true;

				$evento['nombre'] = $_POST['nombre'];
				$evento['organizacion'] = $_POST['organizacion'];
				$evento['fecha'] = $_POST['fecha'];
				$evento['descripcion'] = $_POST['descripcion'];
				$evento['logo'] = $_POST['logo'];
				$evento['imagen1'] = $_POST['imagen1'];
				$evento['imagen2'] = $_POST['imagen2'];

				EventosBD::actualizarEvento($evento);

				header("Location: evento.php?ev=" . $evento['id']);
				exit();
			}
		}
	}

	echo $twig->render('editarEvento.html', ['id_evento' => $idEv, 'evento' => $evento,
	                                         'usuario' => $usuario]);
?>
