<?php
	ini_set('display_errors', 1);

	require_once "./vendor/autoload.php";
	include("controladorBD.php");

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	$eventos = getAllEventos();

	echo $twig->render('index.html', ['eventos' => $eventos]);
?>
