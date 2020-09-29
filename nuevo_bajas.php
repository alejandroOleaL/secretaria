<?php

	require 'includes/conexion.php';
	
	$id = $_GET['id'];
	
	$sql1 = "SELECT * FROM equipos
	INNER JOIN bajas
	ON bajas.id_baja = equipos.id_baja
	WHERE equipos.id_equipo='$id'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado1 = $mysqli->query($sql1);  //Guarda el resultado del query en la variable $resultado
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC); //Recorre la variable $resultado y lo guarda en $row

	$sql = "SELECT * FROM equipos 
	INNER JOIN resguardos_equipos
	ON resguardos_equipos.id_equipo = equipos.id_equipo
	INNER JOIN resguardos
	ON resguardos.id_resguardo = resguardos_equipos.id_resguardo
	INNER JOIN resguardos_personal
	ON resguardos_personal.id_resguardo = resguardos.id_resguardo
	INNER JOIN personal
	ON personal.id_personal = resguardos_personal.id_personal
	INNER JOIN ubicaciones
	ON ubicaciones.id_ubicacion = personal.id_ubicacion	
	INNER JOIN cargos
	ON cargos.id_cargo = personal.id_cargo
	INNER JOIN resguardo_autorizo
	ON resguardo_autorizo.id_resguardo = resguardos.id_resguardo
	INNER JOIN autorizo_personal
	ON autorizo_personal.id_autorizo = resguardo_autorizo.id_autorizo
	INNER JOIN areas
	ON areas.id_area = personal.id_area
	WHERE personal.id_personal='$id'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado = $mysqli->query($sql);  //Guarda el resultado del query en la variable $resultado
	$row = $resultado->fetch_array(MYSQLI_ASSOC); //Recorre la variable $resultado y lo guarda en $row
	
	$id_equipo = $row['id_equipo'];
	
		$sql1 = "SELECT * FROM equipos
	INNER JOIN bajas
	ON bajas.id_baja = equipos.id_baja
	WHERE equipos.id_equipo='$id_equipo'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado1 = $mysqli->query($sql1);  //Guarda el resultado del query en la variable $resultado
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC); //Recorre la variable $resultado y lo guarda en $row


?>


<html lang="es">
	<head>
 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="lib/jquery-3.2.1.js"></script>
				
	</head>
		<div class="container">
					<div class="container">
			 <div class="row">
			 	<div class="col-sm-3">
					<img src="imagenes/escudo.png" width="220" id="img1">
				</div>
				<div class="col-sm-6">
					<h2 style="text-align:center">BAJAS</h3>
				</div>
				<div class="col-sm-3">
					<img src="imagenes/secretaria.jpg" width="320" id="img1">
				</div>
			</div>
			
			<div class="form-group">
				<div class="row">
				</div>
			</div>
			
			<form class="form-horizontal" method="POST" action="actualizar_bajas.php" autocomplete="off">
			
				<div class="form-group">
					<div class="col-sm-4">
						<label for="datosPersonal" class="col-sm-10 control-label">Datos del Personal:</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="a_paterno" class="col-sm-2 control-label">Apellido Paterno:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="a_paterno" name="a_paterno" value="<?php echo $row['ape_paterno']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="a_materno" class="col-sm-2 control-label">Apellido Materno:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="a_materno" name="a_materno" value="<?php echo $row['ape_materno']; ?>"  />
						</div>
				</div>
				
				<input type="hidden" id="id_ubicacion" name="id_ubicacion" value="<?php echo $row['id_ubicacion']; ?>"  />
				<input type="hidden" id="id_cargo" name="id_cargo" value="<?php echo $row['id_cargo']; ?>"  />
				<input type="hidden" id="id_personal" name="id_personal" value="<?php echo $row['id_personal']; ?>"  />
				<input type="hidden" id="id_resguardo" name="id_resguardo" value="<?php echo $row['id_resguardo']; ?>"  />
				<input type="hidden" id="id_equipo" name="id_equipo" value="<?php echo $row['id_equipo']; ?>"  />
		
				<div class="form-group">
					<div class="col-sm-5">
						<label for="datosEquipo" class="col-sm-10 control-label">Datos del Equipo y Resguardo:</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="ejercicio" class="col-sm-2 control-label">Ejercicio Fiscal:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="ejercicio" name="ejercicio" value="<?php echo $row['ejercicio']; ?>"  />
						</div>
				</div>

				<div class="form-group">
					<label for="factura" class="col-sm-2 control-label">Número de Folio / Factura:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="factura" name="factura" value="<?php echo $row['num_factura']; ?>"  />
						</div>
				</div>			
				
				<div class="form-group">
					<label for="clave_inventarial" class="col-sm-2 control-label">Clave Inventarial:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="clave_inventarial" name="clave_inventarial" value="<?php echo $row['clave_inventarial']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripción y Caracteristicas:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label for="marca" class="col-sm-2 control-label">Marca:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="marca" name="marca" value="<?php echo $row['marca']; ?>" />
					</div>
				</div>	
				
				<div class="form-group">
					<label for="serie" class="col-sm-2 control-label">Serie:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="serie" name="serie" value="<?php echo $row['serie']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>" />
					</div>
				</div>	
				
				<div class="form-group">
					<label for="costo_unitario" class="col-sm-2 control-label">Costo Unitario:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="costo_unitario" name="costo_unitario" value="<?php echo $row['costo_unitario']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="iva" class="col-sm-2 control-label">IVA:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="iva" name="iva" value="<?php echo $row['iva']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="costo_total" class="col-sm-2 control-label">Costo Total:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="costo_total" name="costo_total" value="<?php echo $row['costo_total']; ?>" />
					</div>
				</div>
				
				<input type="hidden" id="id_baja" name="id_baja" value="<?php echo $row1['id_baja']; ?>"  />
				
				<div class="form-group">
					<div class="col-sm-5">
						<label for="datos baja" class="col-sm-10 control-label">Datos relacionados a la baja de equipo:</label>
					</div>
				</div>
					
				<div class="form-group">
					<label for="fecha_factura" class="col-sm-2 control-label">Fecha/ Factura:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fecha_factura" name="fecha_factura" placeholder="Fecha/ Factura">
					</div>
				</div>
				
				<div class="form-group">
					<label for="valor_adq" class="col-sm-2 control-label">Valor de Adq. O de Factura:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="valor_adq" name="valor_adq" placeholder="Valor de Adquisición O De Factura">
					</div>
				</div>
					
				<div class="form-group">
					<label for="estado_fisico" class="col-sm-2 control-label">Estado Fisico:</label>
					<div class="col-sm-2">
						<select class="form-control" id="estado_fisico" name="estado_fisico">
							<option value="BUENO" <?php if($row['estado_fisico']=='BUENO') echo 'selected'; ?>>BUENO</option>
							<option value="REGULAR" <?php if($row['estado_fisico']=='REGULAR') echo 'selected'; ?>>REGULAR</option>
							<option value="MALO" <?php if($row['estado_fisico']=='MALO') echo 'selected'; ?>>MALO</option>	
							<option value="INSERVIBLE" <?php if($row['estado_fisico']=='INSERVIBLE') echo 'selected'; ?>>INSERVIBLE</option>								
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="justificacion" class="col-sm-2 control-label">Jutificación:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="justificacion" name="justificacion" placeholder="Justificación" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="observaciones" class="col-sm-2 control-label">Observaciones:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-5">
						<label for="datosautorizo" class="col-sm-10 control-label">Datos del Personal Que Autorizó:</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="autorizo" class="col-sm-2 control-label">Autorizó:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="autorizo" name="autorizo" placeholder="Autorizó">
					</div>
				</div>
				
				<div class="form-group">
					<label for="puesto" class="col-sm-2 control-label">Puesto:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
							<a href="welcome.php"class="btn btn-danger">Regresar</a>
						<button name="insertar" type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>