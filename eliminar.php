<!-- ELIMINAR  -->
<!-- Este script ayuda a eliminar los archivos conocidos como anexos -->

<?php

 	require 'includes/conexion.php'; //requiere el archivo de conexion
	
	
	$id = $_GET['id']; //Recibe por metodo GET el codigo de expediente
	$sql = "SELECT * FROM personal
	INNER JOIN resguardos_personal
	ON resguardos_personal.id_personal = personal.id_personal
	INNER JOIN resguardos
	ON resguardos.id_resguardo = resguardos_personal.id_resguardo
	INNER JOIN resguardos_equipos
	ON resguardos_equipos.id_resguardo = resguardos.id_resguardo
	INNER JOIN equipos
	ON equipos.id_equipo = resguardos_equipos.id_equipo
	INNER JOIN cargos
	ON cargos.id_cargo = personal.id_cargo
	INNER JOIN resguardo_autorizo
	ON resguardo_autorizo.id_resguardo = resguardos.id_resguardo
	INNER JOIN autorizo_personal
	ON autorizo_personal.id_autorizo = resguardo_autorizo.id_autorizo
	INNER JOIN areas
	ON areas.id_area = personal.id_area
	WHERE equipos.id_equipo = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC); //Recorre la variable $resultadocc y lo guarda en $rowcc
	
	$cargo = $row['id_cargo'];
	$personal = $row['id_personal'];
	$resguardo = $row['id_resguardo'];
	$equipo = $row['id_equipo'];
	$baja = $row['id_baja'];
	$autorizo = $row['id_autorizo'];
			
	$sqlc = "DELETE FROM cargos WHERE id_cargo = '$cargo'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadoc = $mysqli->query($sqlc); //Guarda el resultado en la variable $resultado
	
	$sqlp = "DELETE FROM personal WHERE id_personal = '$personal'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadop = $mysqli->query($sqlp);
	
	$sqlrp = "DELETE FROM resguardos_personal WHERE id_personal = '$personal'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadorp = $mysqli->query($sqlrp);
	
	$sqlr = "DELETE FROM resguardos WHERE id_resguardo = '$resguardo'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultador = $mysqli->query($sqlr);
	
	$sqlre = "DELETE FROM resguardos_equipos WHERE id_resguardo = '$resguardo'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadore = $mysqli->query($sqlre);
	
	$sqle = "DELETE FROM equipos WHERE id_equipo = '$equipo'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadoe = $mysqli->query($sqle);
	
	$sqla = "DELETE FROM resguardo_autorizo WHERE id_resguardo = '$resguardo'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadoa = $mysqli->query($sqla);
	
	$sqlb = "DELETE FROM autorizo_personal WHERE id_autorizo = '$autorizo'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadob = $mysqli->query($sqlb);
	
		$sqlbaja = "DELETE FROM bajas WHERE id_baja = '$baja'"; //Elimina el anexo de la tabla anexos con el id_anexo que corresponde a la variable $id
	$resultadobaja = $mysqli->query($sqlbaja);
	
?>
 
<html lang="es">
	<head>
		
		<!-- Librerias necesarias para el correcto funcionamiento del sistema -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultadoe) { ?>
					<h3>REGISTRO ELIMINADO</h3> <!-- Muestra este mensaje en caso de que el query  que se guardo en la variable $resultado se ha realizado correctamente -->
					<?php } else { ?>
					<h3>ERROR AL ELIMINAR</h3> <!-- Muestra este mensaje en caso de tener un error al momento de realizar el query que se guardo en la variable $resultado-->
					<?php } ?>
					
					<a href="welcome.php ?>" class="btn btn-primary">Regresar</a>
					<!-- Envia por metodo GET el codigo de expediente para regresar al expediente correspondiente -->
								
				</div>
			</div>
		</div>
	</body>
</html>