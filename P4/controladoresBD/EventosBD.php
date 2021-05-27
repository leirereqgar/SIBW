<?php
	require_once("ControladorBD.php");

	class EventosBD {

		static function getEvento($idEv) {
			$mysqli = ControladorBD::conectar();

			$evento = array('nombre' => 'XXX', 'organizacion' => 'YYY',
			                'fecha'  => 'XXXX-XX-XX', 'descripcion' => 'Por defecto',
			                'logo' => 'nop', 'imagen1' => 'nop', 'imagen2' => 'nop');


			if(is_numeric($idEv)){
				$res = $mysqli->query("SELECT * FROM eventos WHERE id=" . $idEv);
				if ($res->num_rows > 0) {

					$row = $res->fetch_assoc();

					$evento = array('id' => $row['id'],
					                'nombre' => $row['nombre'],
					                'organizacion' => $row['organizacion'],
					                'fecha' => $row['fecha'],
					                'descripcion' => $row['descripcion'],
					                'logo' => $row['logo'],
					                'imagen1' => $row['imagen1'],
					                'imagen2' => $row['imagen2']);
				}
			}
			return $evento;
		}

		static function getAllEventos() {
			$mysqli = ControladorBD::conectar();

			$result = array();
			$indice = 0;
			foreach ($mysqli->query("SELECT id, nombre, logo FROM eventos") as $row) {
				$result[$indice] = $row;
				$indice++;
			}

			return $result;
		}

		static function actualizarEvento($evento) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("UPDATE eventos SET " .
			                 "nombre='" . $evento['nombre'] . "', " .
			                 "organizacion = '" . $evento['organizacion'] . "', " .
			                 "fecha = '" . $evento['fecha'] . "', " .
			                 "descripcion = '" . $evento['descripcion'] . "', " .
			                 "logo = '" . $evento['logo'] . "', " .
			                 "imagen1 = '" . $evento['imagen1'] . "', " .
			                 "imagen2 = '" . $evento['imagen2'] . "' " .
			                 "WHERE eventos.id='" . $evento['id'] . "'");
		}

		static function eliminarEvento($idEv) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("DELETE FROM eventos WHERE eventos.id=" . $idEv);
		}
	}

?>
