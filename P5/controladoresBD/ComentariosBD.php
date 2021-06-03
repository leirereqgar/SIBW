<?php
	require_once("ControladorBD.php");

	class ComentariosBD {
		static function getComentarios($idEv) {
			$mysqli = ControladorBD::conectar();

			$result = array();
			$indice = 0;
			if(is_numeric($idEv)){
				//$query = "SELECT * FROM comentarios WHERE id_evento=" . $idEv;
				$query = "SELECT DISTINCT comentarios.*, usuarios.* ".
				         "FROM comentarios, usuarios " .
				         "WHERE comentarios.id_evento='" . $idEv . "' ".
				         "AND comentarios.id_usuario = usuarios.id_user ".
				         "ORDER BY comentarios.fecha DESC";
				foreach ($mysqli->query($query) as $row) {
					$result[$indice] = $row;
					$indice++;
				}
			}

			return $result;
		}

		static function getComentario($idEv, $idCm) {
			$mysqli = ControladorBD::conectar();

			if(is_numeric($idEv) && is_numeric($idCm)){
				$res = $mysqli -> query("SELECT DISTINCT comentarios.*, usuarios.* ".
				                        "FROM comentarios, usuarios " .
				                        "WHERE comentarios.id_evento='" . $idEv . "' ".
				                        "AND comentarios.id_comentario='".$idCm."' ".
				                        "AND comentarios.id_usuario = usuarios.id_user ".
				                        "ORDER BY comentarios.fecha DESC");
			}

			return $res->fetch_assoc();
		}

		static function nuevoComentario($idEv, $usuario, $comentario) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("INSERT INTO comentarios (id_evento, id_usuario, fecha, texto_comentario)".
			                 "VALUES ('".$idEv."', '".$usuario."', '". date("Y-m-d"). "', '". $comentario."')");
		}

		static function actualizarComentario($idCm, $texto, $usuario) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("UPDATE comentarios SET ".
			                 "fecha = '" . date("Y-m-d") . "', ".
			                 "texto_comentario = '" . $texto . "', ".
			                 "editado = 'Editado por ". $usuario."' ".
			                 "WHERE comentarios.id_comentario='". $idCm."'");
		}

		static function eliminarComentario ($idComentario) {
			$mysqli = ControladorBD::conectar();

			$mysqli -> query("DELETE FROM comentarios WHERE id_comentario=".$idComentario);
		}
	}
?>
