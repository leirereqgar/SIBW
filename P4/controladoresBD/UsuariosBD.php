<?php
	ini_set('display_errors', 1);
	require_once("controladorBD.php");

	class UsuariosBD {
		static function loginUsuario($nickname, $pass) {
			$mysqli = controladorBD::conectar();
			$id = "";

			$res = $mysqli->query("SELECT id_user, nickname, password FROM usuarios WHERE nickname=". $nickname.")");

			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();

				if(password_verify($pass, $row['password']));
					$id = $row['id_user'];
			}

			return $id;
		}

		static function crearNuevoUsuario ($nickname, $nombre, $apellidos,  $pass, $mail) {
			$mysqli = controladorBD::conectar();

			$mysqli->query("INSERT INTO `usuarios` (`id_user`, `nickname`, `nombre`, `apellidos`, `password`, `correo`, `tipo`) ".
			               "VALUES (NULL, '" . $nickname . "','" . $nombre . "', '" . $apellidos .
								"', '" . $pass . "', '" . $mail . "', 'registrado') ");

			return UsuariosBD::loginUsuario($nickname, $pass);
		}

		static function verificarNickname($nickname) {
			$mysqli = controladorBD::conectar();

			$res = $mysqli->query("SELECT * FROM usuarios WHERE nickname='" . $nickname . "'");

			return ($res->num_rows > 0);
		}

		static function verificarCorreo($correo) {
			$valido = true;
			$es_correo = preg_match('/^.+@.+\..+$/', $correo);

			if($es_correo) {
				$mysqli = controladorBD::conectar();
				$res = $mysqli->query("SELECT * FROM usuarios WHERE correo='".$correo."'");

				if($res->num_rows > 0)
					$valido = false;
			}
			else {
				$valido = false;
			}

			return $valido;
		}
	}

?>
