<?php


	require 'includes/conexion2.php'; //requiere del archivo de conexion
	

	$estado = $_POST['estado']; 
	$editor = $_POST['editor1']; 

	
	$sqlp = "INSERT INTO ejemplo (estado, contenido) VALUES ('$estado', '$editor')"; 
	$resultadop = $mysqli->query($sqlp); 
	


?>

<html lang="es">
	<head>
		<!-- Librerias necesarias para el correcto funcionamiento del sistema -->
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
					<?php if($resultadop) { ?>
						<h3>REGISTRO GUARDADO</h3> <!-- Muestra este mensaje en caso de que algunos de los querys que se guardaron en las variables de resultados se han realizado correctamente -->
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3> <!-- Muestra este mensaje en caso de tener un error al momento de realizar algunos de los querys que se guardaron en las variables de resultados-->
					<?php } ?>
						<a href="welcome.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>