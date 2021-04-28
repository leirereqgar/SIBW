<?php
	function conectarBD() {
		$mysqli = new mysqli("localhost", "user", "contraseña", "BD");
		if ($mysqli->connect_errno) {
		echo ("Fallo al conectar: " . $mysqli->connect_error);
		}

		return $mysqli;
	}


	function getEvento($idEv) {
		$mysqli = conectarBD();

		$evento = array('nombre' => 'XXX', 'organizacion' => 'YYY',
		                'fecha'  => 'XXXX-XX-XX', 'descripcion' => 'Por defecto',
						    'imagen1' => 'nop', 'imagen2' => 'nop');


		if(is_numeric($idEv)){
			$res = $mysqli->query("SELECT nombre, organizacion, fecha, descripcion, imagen1, imagen2
				                    FROM eventos WHERE id=" . $idEv);
			if ($res->num_rows > 0) {

				$row = $res->fetch_assoc();

				$evento = array('nombre' => $row['nombre'],
				                'organizacion' => $row['organizacion'],
								    'fecha' => $row['fecha'],
								    'descripcion' => $row['descripcion'],
								    'imagen1' => $row['imagen1'],
								    'imagen2' => $row['imagen2']);
			}
		}


		return $evento;
	}

?>
