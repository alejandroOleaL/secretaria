<?php

	require 'includes/conexion.php';

	$query = "SELECT * FROM areas";
	$resultado = $mysqli->query($query);
	
		$id_all=1;

?>

<html lang="es">
	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/jquery-1.12.4.min.js"></script>

	
	<body>
	
		<div class="container">
			<div class="container">
				 <div class="row">
						<div class="col-sm-3">
							<img src="imagenes/escudo.png" width="220" id="img1">
						</div>
					<div class="col-sm-6">
						<h2 style="text-align:center">Secretaría De Contraloria Y Transparencia Gubernamental</h2>
						<h3 style="text-align:center">Delegación Administrativa</h3>
						<h4 style="text-align:center">Resguardos Internos</h4>
					</div>
					<div class="col-sm-3">
						<img src="imagenes/secretaria.jpg" width="320" id="img1">
					</div>
				</div>
			</div>
			
			<div class="row">
				<a href="consulta.php" class="btn btn-danger">Regresar</a>
				<?php { ?><a href="pdf1.php?id=<?php echo $id_all; ?>"> <?php }?><span class="btn btn-warning">Imprimir Todo</span></a>
			</div>
			<br>
			<div class="form-group">	
			<form class="form-horizontal" method="POST" action="pdf_global.php" autocomplete="off">
				<div class="form-group">
					<label for="area" class="col-sm-2 control-label">Area:</label>
					<div class="col-sm-7">
						<select class="form-control" id="area" name="area">
							<option value="11">Seleccionar Area:</option>
							<?php while($row = $resultado->fetch_assoc()) { ?>
							<option value="<?php echo $row['id_area']; ?>"><?php echo $row['nombre_area']; ?></option>
							<?php } ?>
						</select>
					</div>
					<button name="insertar" type="submit" class="btn btn-primary">Imprimir</button>
				</div>
				</form>
				
				<form class="form-horizontal" method="POST" action="pdf_global1.php" autocomplete="off">
					<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" >
						</div>
						<button name="insertar" type="submit" class="btn btn-primary">Imprimir</button>
					</div>
				</form>
				
				<form class="form-horizontal" method="POST" action="pdf_global2.php" autocomplete="off">
				<div class="form-group">
					<label for="factura" class="col-sm-2 control-label">Número Factura:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="factura" name="factura" placeholder="Número Factura">
					</div>
					<button name="insertar" type="submit" class="btn btn-primary">Imprimir</button>
				</div>
				</form>
				</div>
				
			</div>
			<br>
	</body>
</html>
