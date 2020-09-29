<?php

	require 'includes/conexion.php';
	
	//Datos del personal nuevo
	$nombre = $_POST['nombre']; 	
	$ape_paterno = $_POST['a_paterno']; 
	$ape_materno = $_POST['a_materno']; 
	$nom_completo = $_POST['nombre'] . " " . $_POST['a_paterno'] . " " . $_POST['a_materno'];
	$cargo = $_POST['cargo']; 
	$id_resguardo = $_POST['id_resguardo']; 
	$categoria = $_POST['categoria']; 
	$num_empleado = $_POST['num_empleado']; 
	$estado_fisico = $_POST['estado_fisico']; 
	$domicilio = $_POST['domicilio']; 
	$ubicacion = $_POST['ubicacion'];
	$fecha_asignacion = $_POST['fecha_asig']; 
	$autorizo = $_POST['autorizo']; 
	$puesto = $_POST['puesto']; 
	$observaciones = $_POST['observaciones']; 
	$id_area = $_POST['area']; 
    $id_personal = $_POST['id_personal_nuevo']; 	
	$estado = '1';
	$estado_cambio = '2';
			
		if(!empty($_POST['n_area']))
		{
			$nom_area = $_POST['n_area'];
		$sqlarea = "INSERT INTO areas (nombre_area) VALUES ('$nom_area')"; 
		$resultadoarea = $mysqli->query($sqlarea); 
		$area = mysqli_insert_id($mysqli);
		} else{
				$area = $_POST['area'];
		}
		
		if(!empty($_POST['n_ubicacion']))
		{
			$nom_ubica = $_POST['n_ubicacion'];
		$sqlubica = "INSERT INTO ubicaciones (ubicacion) VALUES ('$nom_ubica')"; 
		$resultadoubica = $mysqli->query($sqlubica); 
		$ubicacion = mysqli_insert_id($mysqli);
		} else{
				$ubicacion = $_POST['ubicacion'];
		}
		
	
		$sqlp = "INSERT INTO cargos (cargo) VALUES ('$cargo')"; 
	$resultadop = $mysqli->query($sqlp); 
	$row_p = mysqli_insert_id($mysqli);
	
	//query busca el personal en caso de que ya exista
		$sqlpersonal = "SELECT * FROM personal
		WHERE personal.nom_completo='$nom_completo'"; 
		$resultadopersonal = $mysqli->query($sqlpersonal);  //Guarda el resultado del query en la variable $resultado
		$rowpersonal = $resultadopersonal->fetch_array(MYSQLI_ASSOC);
		
		if(isset($rowpersonal)){
			$nombrepersonal = $rowpersonal['nom_completo'];
			$id_personal = $rowpersonal['id_personal'];
			
				//si coinciden los nombres asigna el id del personal
			if($nom_completo = $nombrepersonal) {
				$row_pers = $id_personal;
			}
			
		}	//en caso de que no inserta un nuevo personal
		else{
			$nombre = $_POST['nombre']; 
			$sqlpers = "INSERT INTO personal (nom_completo, nombre, ape_paterno, ape_materno, categoria, num_empleado, domicilio, id_cargo, id_ubicacion, id_area) VALUES ('$nom_completo', '$nombre', '$ape_paterno', '$ape_materno', '$categoria', '$num_empleado', '$domicilio', '$row_p', '$ubicacion', '$area')"; 
			$resultadopers = $mysqli->query($sqlpers); 
			$row_pers = mysqli_insert_id($mysqli);
		}
	
		$sqluba = "INSERT INTO autorizo_personal (personal, puesto) VALUES ('$autorizo', '$puesto')"; 
		$resultadoba = $mysqli->query($sqluba); 
		$row_ba = mysqli_insert_id($mysqli);

		//actualiza el estado que indica que pasa a un estado antiguo
		$sqlr = "UPDATE resguardos_personal SET estado='$estado_cambio' WHERE id_resguardo = '$id_resguardo'";
		$resultador = $mysqli->query($sqlr); 
		
		//inserta el nuevo cambio
		$sqlresp = "INSERT INTO resguardos_personal (id_resguardo, id_personal, estado) VALUES ('$id_resguardo', '$row_pers', '$estado')"; 
		$resultadoresp = $mysqli->query($sqlresp); 
		
		$sqlra = "INSERT INTO resguardo_autorizo (id_resguardo, id_autorizo, fecha_asig) VALUES ('$id_resguardo', '$row_ba', '$fecha_asignacion')"; 
		$resultadora = $mysqli->query($sqlra); 
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultador || $resultadoresp) { ?>
						<h3>CAMBIO DE RESGUARDO EXITOSO</h3>
						<?php } else { ?>
						<h3>ERROR AL REALIZAR EL CAMBIO</h3>
						<?php }  ?>
							<a href="consulta.php" class="btn btn-primary">Regresar</a>

					
				</div>
			</div>
		</div>
	</body>
</html>