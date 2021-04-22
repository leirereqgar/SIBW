<?php
	require_once "./vendor/autoload.php";

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$nombreEvento = "Nombre por defecto";
	$fechaEvento = "Fecha por defecto";
	$orgEvento = "Organizador por defecto";

	if ($_GET['ev'] == 1) {
		$nombreEvento = "Evento 1";
		$orgEvento = "Oganizacion 1";
		$fechaEvento = "Miércoles";
	} else if ($_GET['ev'] == 2) {
		$nombreEvento = "Evento 2";
		$orgEvento = "Organizacion 2";
		$fechaEvento = "Jueves";
	}


	echo $twig->render('evento.html', ['nombre' => $nombreEvento, 'organizador' => $orgEvento, 'fecha' => $fechaEvento]);
?>
