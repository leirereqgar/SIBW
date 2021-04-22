<?php
	require_once "./vendor/autoload.php";

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$nombreEvento = "Nombre por defecto";
	$fechaEvento = "Fecha por defecto";



	echo $twig->render('evento_imprimir.html', ['nombre' => $nombreEvento, 'fecha' => $fechaEvento]);
?>
