<?php
		$mysqli = new MySQLi("localhost", "root","", "proyecto");
		if ($mysqli -> connect_errno) {
			die( "Fallo en la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
		}

?>