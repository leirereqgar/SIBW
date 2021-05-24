<?php
	class controladorBD {
		static function conectar() {
			$mysqli = new mysqli("localhost", "leirereqgar", "albedrio", "SIBW");

			if ($mysqli->connect_errno)
				echo ("Fallo al conectar: " . $mysqli->connect_error);

			return $mysqli;
		}
	}

?>
