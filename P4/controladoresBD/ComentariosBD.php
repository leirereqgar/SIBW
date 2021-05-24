<?php
	require_once("controladorBD.php");

	class ComentariosBD {
		static function getComentarios($idEv) {
			$mysqli = controladorBD::conectar();

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
