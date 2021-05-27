<?php
	ini_set('display_errors', 1);
	require_once("ControladorBD.php");

	class UsuariosBD {
		static function loginUsuario($nickname, $pass) {
			$mysqli = ControladorBD::conectar();
			$id = "";

			$res = $mysqli->query("SELECT * FROM usuarios WHERE nickname='". $nickname."'");

			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();

				if(password_verify($pass, $row['password']));
					$id = $row['id_user'];
			}

			return $id;
		}

		static function crearNuevoUsuario ($datos, $pass) {
			$mysqli = ControladorBD::conectar();

			$mysqli->query("INSERT INTO usuarios (nickname, nombre, apellidos, password, correo, tipo) ".
			               "VALUES ('" . $datos['nickname'] . "','" . $datos['nombre'] . "', '" . $datos['apellidos'] .
								"', '" . $pass . "', '" . $datos['correo'] . "', 'registrado') ");

			return UsuariosBD::loginUsuario($datos['nickname'], $pass);
		}

		static function verificarNickname($nickname) {
			$mysqli = ControladorBD::conectar();

			$res = $mysqli->query("SELECT * FROM usuarios WHERE nickname='" . $nickname . "'");

			return ($res->num_rows == 0);
		}

		static function verificarCorreo($correo) {
			$valido = true;
			$es_correo = preg_match('/^.+@.+\..+$/', $correo);

			if($es_correo) {
				$mysqli = ControladorBD::conectar();
				$res = $mysqli->query("SELECT * FROM usuarios WHERE correo='".$correo."'");

				if($res->num_rows > 0)
					$valido = false;
			}
			else {
				$valido = false;
			}

			return $valido;
		}

		static function actualizarNickname($id_user, $n_nick) {
			$mysqli = ControladorBD::conectar();
			print_r("UPDATE usuarios SET nickname='" . $n_nick . "' WHERE usuarios.id_user= '" . $id_user . "'");

			$mysqli->query("UPDATE usuarios SET nickname='" . $n_nick . "' WHERE usuarios.id_user= '" . $id_user . "'");
		}

		static function actualizarCorreo($id_user, $n_correo) {
			$mysqli = ControladorBD::conectar();

			$mysqli->query("UPDATE usuarios SET correo='" . $n_correo . "' WHERE usuarios.id_user= '" . $id_user . "'");
		}

		static function actualizarPassword($id_user, $n_pass) {
			$mysqli = ControladorBD::conectar();

			$mysqli->query("UPDATE usuarios SET password='" . $n_pass . "' WHERE usuarios.id_user= '" . $id_user . "'");
		}

		static function getUserByID($id_user) {
			$mysqli = ControladorBD::conectar();
			$row = "";

			$res = $mysqli->query("SELECT * FROM usuarios WHERE id_user='". $id_user."'");

			if($res->num_rows > 0) {
				$row = $res->fetch_assoc();
			}

			return $row;
		}

		static function compararPermisos($permiso, $requerido) {
			$mayor_igual = false;

			switch ($requerido) {
				case 'registrado':
					if(!$mayor_igual)
						$mayor_igual = $permiso == 'registrado';
				case 'moderador':
					if(!$mayor_igual)
						$mayor_igual = $permiso == 'moderador';
				case 'gestor':
					if(!$mayor_igual)
						$mayor_igual = $permiso == 'gestor';
				case 'superusuario':
					if(!$mayor_igual)
						$mayor_igual = $permiso == 'superusuario';
			}

			return $mayor_igual;
		}
	}

?>
