<?php

	require 'includes/conexion.php';
	
	$resguardo = $_GET['id'];
	$estado = '2';
		
	$sqlu = "UPDATE resguardos SET estado='$estado' WHERE id_resguardo = '$resguardo'";
	$resultadou = $mysqli->query($sqlu);
	
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
					<?php if($resultadou) { ?>
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