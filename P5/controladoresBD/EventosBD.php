<?php
	require_once("ControladorBD.php");

	class EventosBD {

		static function buscar($busqueda, $gestor) {
			$mysqli = ControladorBD::conectar();

			$result = array();
			$indice = 0;
			if($gestor)
				$query = "SELECT * FROM eventos WHERE nombre LIKE '%" . $busqueda . "%'";
			else
				$query = "SELECT * FROM eventos WHERE nombre LIKE '%" . $busqueda . "%' AND publicado=1";

			foreach ($mysqli->query($query) as $row) {
				$result[$indice] = $row;
				$indice++;
			}

			return $result;
		}

		static function getEvento($idEv) {
			$mysqli = ControladorBD::conectar();

			$evento = array('nombre' => 'XXX', 'organizacion' => 'YYY',
			                'fecha'  => 'XXXX-XX-XX', 'descripcion' => 'Por defecto',
			                'logo' => 'nop', 'imagen1' => 'nop', 'imagen2' => 'nop', 'publicado' => 0);


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
					                'imagen2' => $row['imagen2'],
					                'publicado' => $row['publicado']);
				}
			}
			return $evento;
		}

		static function getAllEventos($edicion) {
			$mysqli = ControladorBD::conectar();

			$result = array();
			$indice = 0;

			$query = "SELECT id, nombre, logo FROM eventos";

			if (!$edicion)
				$query .= " WHERE publicado = true";

			foreach ($mysqli->query($query) as $row) {
				$result[$indice] = $row;
				$indice++;
			}

			return $result;
		}

		static function insertarEvento($evento) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("INSERT INTO eventos (nombre, organizacion, fecha, descripcion, logo, imagen1, imagen2)" .
			                 "VALUES ('" . $evento['nombre'] . "', " .
			                 "'" . $evento['organizacion'] . "', " .
			                 "'" . $evento['fecha'] . "', " .
			                 "'" . $evento['descripcion'] . "', " .
			                 "'" . $evento['logo'] . "', " .
			                 "'" . $evento['imagen1'] . "', " .
			                 "'" . $evento['imagen2'] . "')");
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
			                 "imagen2 = '" . $evento['imagen2'] . "', " .
								  "publicado = '" . $evento['publicado'] . "' " .
			                 "WHERE eventos.id='" . $evento['id'] . "'");
		}

		static function eliminarEvento($idEv) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("DELETE FROM eventos WHERE eventos.id=" . $idEv);
		}
	}

?>
