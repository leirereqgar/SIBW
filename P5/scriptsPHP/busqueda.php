<?php
ini_set('display_errors', 1);

require_once('../controladoresBD/EventosBD.php');

$query  = $_POST['query'];
$result='';
$res = EventosBD::buscar($query, 1);



	foreach ($res as $row)
	{
		$link = '<a href="evento.php?ev=' . $row['id'] . '">' . $row['nombre'] . '</a><br>';
		$link = preg_replace("/(" . $query . ")/i", "<span class='hl'>$1</span>", $link);
		$result .= $link;
	}

echo $result;
?>
