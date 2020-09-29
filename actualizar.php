<?php

	require 'includes/conexion.php';
	
	$clave = $_POST['clave_inventarial'];
	$nombre = $_POST['nombre']; 
	$ape_paterno = $_POST['a_paterno']; 
	$ape_materno = $_POST['a_materno']; 
		$nom_completo = $_POST['nombre'] . $_POST['a_paterno'] . $_POST['a_materno'];
	$num_empleado = $_POST['num_empleado']; 
	$domicilio = $_POST['domicilio']; 
	$ejercicio = $_POST['ejercicio']; 
	$area = $_POST['area'];
	$cargo = $_POST['cargo'];
	$categoria = $_POST['categoria'];
	$factura = $_POST['factura'];
	$id_ubicacion = $_POST['ubicacion'];
	$clave = $_POST['clave_inventarial'];
	$descripcion = $_POST['descripcion'];
	$caracteristicas = $_POST['caracteristicas'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$serie = $_POST['serie'];
	$color = $_POST['color'];
	$estado_fisico = $_POST['estado_fisico'];
	$costo_unitario = $_POST['costo_unitario'];
	$iva = $_POST['iva'];
	$costo_total = $_POST['costo_total'];
	$fecha_asig = $_POST['fecha_asig'];
	$personal = $_POST['autorizo'];
	$puesto = $_POST['puesto'];
	$observaciones = $_POST['observaciones'];
	
	$id_cargo = $_POST['id_cargo'];
	$id_personal = $_POST['id_personal'];
	$id_resguardo = $_POST['id_resguardo'];
	$id_equipo = $_POST['id_equipo'];
	$id_area = $_POST['area'];
	$id_autorizo = $_POST['id_autorizo'];
	
	$sqlc = "UPDATE cargos SET cargo='$cargo' WHERE id_cargo = '$id_cargo'";
	$resultadoc = $mysqli->query($sqlc);
	
	$sqlp = "UPDATE personal SET nom_completo='$nom_completo', nombre='$nombre', ape_paterno='$ape_paterno', ape_materno='$ape_materno', categoria='$categoria', num_empleado='$num_empleado', domicilio='$domicilio', id_ubicacion='$id_ubicacion', id_area='$id_area' WHERE id_personal = '$id_personal'";
	$resultadop = $mysqli->query($sqlp);
	
	$sqlr = "UPDATE resguardos SET clave_inventarial='$clave', ejercicio='$ejercicio', num_factura='$factura', costo_unitario='$costo_unitario', iva='$iva', costo_total='$costo_total' WHERE id_resguardo = '$id_resguardo'";
	$resultador = $mysqli->query($sqlr);
	
	$sqle = "UPDATE equipos SET descripcion='$descripcion', caracteristicas='$caracteristicas', marca='$marca', modelo='$modelo', serie='$serie', color='$color', estado_fisico='$estado_fisico', observaciones='$observaciones' WHERE id_equipo = '$id_equipo'";
	$resultadoe = $mysqli->query($sqle);
	
	$sql = "UPDATE resguardo_autorizo SET fecha_asig='$fecha_asig' WHERE id_resguardo = '$id_resguardo'";
	$resultado = $mysqli->query($sql);
	
	$sqlautorizo = "UPDATE autorizo_personal SET personal='$personal', puesto='$puesto' WHERE id_autorizo = '$id_autorizo'";
	$resultadoautorizo = $mysqli->query($sqlautorizo);
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
					<?php if($resultadoc || $resultadop || $resultador || $resultadoe) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
						<?php }  ?>
							<a href="consulta.php" class="btn btn-primary">Regresar</a>

					
				</div>
			</div>
		</div>
	</body>
</html>