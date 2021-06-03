<?php
ini_set('display_errors', 1);

require_once('../controladoresBD/EventosBD.php');

$query  = $_POST['query'];
$result = [];
$res    = EventosBD::buscar($query, 1);

foreach ($res as $row)
{
	$event = array(
		'id' => $row['id'],
		'nombre' => $row['nombre']
	);
	array_push($result, $event);
}

echo json_encode($result);
?>
