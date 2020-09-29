<?php

	require 'includes/conexion.php';
	
	$num_folio = $_POST['factura']; 
	$id_baja = $_POST['id_baja']; 
	$id_equipo = $_POST['id_equipo']; 
	$fecha_factura = $_POST['fecha_factura']; 
	$valor_adq = $_POST['valor_adq']; 
	$estado_fisico = $_POST['estado_fisico']; 
	$justificacion = $_POST['justificacion']; 
	$observaciones = $_POST['observaciones']; 
	$autorizo = $_POST['autorizo']; 
	$puesto = $_POST['puesto']; 
	$estado = '2';

	$sqlp = "INSERT INTO autorizo_personal (personal, puesto) VALUES ('$autorizo', '$puesto')"; 
	$resultadop = $mysqli->query($sqlp); 
	$row_p = mysqli_insert_id($mysqli);
	
	$sqlb = "UPDATE bajas SET num_folio='$num_folio', fecha_factura='$fecha_factura', valor_adq='$valor_adq', justificacion='$justificacion', observaciones='$observaciones', id_autorizo='$row_p' WHERE id_baja = '$id_baja'";
	$resultadob = $mysqli->query($sqlb);

	$sqle = "UPDATE equipos SET estado_fisico='$estado_fisico', estado_baja='$estado' WHERE id_equipo = '$id_equipo'";
	$resultadoe = $mysqli->query($sqle);
	
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
					<?php if($resultadob || $resultadoe) { ?>
						<h3>REGISTRO DADO DE BAJA</h3>
						<?php } else { ?>
						<h3>ERROR AL DAR DE BAJA</h3>
						<?php }  ?>
							<a href="consulta.php" class="btn btn-primary">Regresar</a>

					
				</div>
			</div>
		</div>
	</body>
</html>