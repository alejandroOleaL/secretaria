<?php

$mysqli = new mysqli('localhost', 'root', '','bd_secretaria');

if($mysqli->connect_error) {
	
	die('Error en la conexion' . $mysqli->connect_error);
	
}

mysqli_set_charset($mysqli, "utf8");

?>