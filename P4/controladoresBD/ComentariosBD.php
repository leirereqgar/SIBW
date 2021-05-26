<?php
	require_once("ControladorBD.php");

	class ComentariosBD {
		static function getComentarios($idEv) {
			$mysqli = ControladorBD::conectar();

			$result = array();
			$indice = 0;
			if(is_numeric($idEv)){
				$query = "SELECT * FROM comentarios WHERE id_evento=" . $idEv;
				foreach ($mysqli->query($query) as $row) {
					$result[$indice] = $row;
					$indice++;
				}
			}

			return $result;
		}
	}
?>
