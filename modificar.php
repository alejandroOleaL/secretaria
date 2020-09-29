
<?php

	require 'includes/conexion.php'; //requiere del archivo de conexion
	
	$id = $_GET['id'];
	
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
	WHERE resguardos_personal.estado='1' and equipos.estado_baja='1' and resguardos.id_resguardo='$id'";
	$resultado = $mysqli->query($sql);  //Guarda el resultado del query en la variable $resultado
	$row = $resultado->fetch_array(MYSQLI_ASSOC); //Recorre la variable $resultado y lo guarda en $row
	
	$area = $row['id_area'];
	
	$queryper = "SELECT * FROM areas"; //Realiza una búsqueda para obtener datos del personal que esten relacionados con el id_tipo = 2
	$resultadoper = $mysqli->query($queryper);
		
	$ubicacion = $row['id_ubicacion'];
	
	$queryubica = "SELECT * FROM ubicaciones"; //Realiza una búsqueda para obtener datos del personal que esten relacionados con el id_tipo = 2
	$resultadoubica = $mysqli->query($queryubica);

?>


<html lang="es">
	<head>
		<!-- Librerias necesarias para el correcto funcionamiento del sistema -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery-3.2.1.js"></script>
		
		
	</head>
		
		<div class="container">
			<div class="container">
			 <div class="row">
			 	<div class="col-sm-3">
					<img src="imagenes/escudo.png" width="220" id="img1">
				</div>
				<div class="col-sm-6">
					<h2 style="text-align:center">MODIFICAR REGISTRO</h3>
				</div>
				<div class="col-sm-3">
					<img src="imagenes/secretaria.jpg" width="320" id="img1">
				</div>
			</div>

			
			<!-- Envia por POST el formulario al archivo update.php, autollenado se encuentra desactivado con off -->
			<form class="form-horizontal" method="POST" action="actualizar.php" autocomplete="off">
			
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
				
				<input type="hidden" id="id_cargo" name="id_cargo" value="<?php echo $row['id_cargo']; ?>"  />
				<input type="hidden" id="id_personal" name="id_personal" value="<?php echo $row['id_personal']; ?>"  />
				<input type="hidden" id="id_resguardo" name="id_resguardo" value="<?php echo $row['id_resguardo']; ?>"  />
				<input type="hidden" id="id_equipo" name="id_equipo" value="<?php echo $row['id_equipo']; ?>"  />
				<input type="hidden" id="id_autorizo" name="id_autorizo" value="<?php echo $row['id_autorizo']; ?>"  />

				<div class="form-group">
					<label for="domicilio" class="col-sm-2 control-label">Domicilio:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo $row['domicilio']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="num_empleado" class="col-sm-2 control-label">Número de Empleado:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="num_empleado" name="num_empleado" value="<?php echo $row['num_empleado']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="cargo" class="col-sm-2 control-label">Cargo:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $row['cargo']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">Categoria:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $row['categoria']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="area" class="col-sm-2 control-label">Areas:</label>
					<div class="col-sm-7">
						<select class="form-control" id="area" name="area">
							<?php while($rowP = $resultadoper->fetch_assoc()) { ?>
							<option value="<?php echo $rowP['id_area']; ?>" <?php if($rowP['id_area']==$area) { echo 'selected'; } ?>><?php echo $rowP['nombre_area']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="ubicacion" class="col-sm-2 control-label">Ubicaciones:</label>
					<div class="col-sm-3">
						<select class="form-control" id="ubicacion" name="ubicacion">
							<?php while($rowub = $resultadoubica->fetch_assoc()) { ?>
							<option value="<?php echo $rowub['id_ubicacion']; ?>" <?php if($rowub['id_ubicacion']==$ubicacion) { echo 'selected'; } ?>><?php echo $rowub['ubicacion']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-5">
						<label for="datosEquipo" class="col-sm-10 control-label">Datos del Equipo y Resguardo:</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="ejercicio" class="col-sm-2 control-label">Ejercicio Fiscal:</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="ejercicio" name="ejercicio" value="<?php echo $row['ejercicio']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="factura" class="col-sm-2 control-label">Número Factura:</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="factura" name="factura" value="<?php echo $row['num_factura']; ?>"  />
						</div>
				</div>		
				
				<div class="form-group">
					<label for="clave_inventarial" class="col-sm-2 control-label">Clave Inventarial:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="clave_inventarial" name="clave_inventarial" value="<?php echo $row['clave_inventarial']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripción:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label for="caracteristicas" class="col-sm-2 control-label">Caracteristicas:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="caracteristicas" name="caracteristicas" value="<?php echo $row['caracteristicas']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label for="marca" class="col-sm-2 control-label">Marca:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="marca" name="marca" value="<?php echo $row['marca']; ?>" />
					</div>
				</div>	
				
				<div class="form-group">
					<label for="modelo" class="col-sm-2 control-label">Modelo:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $row['modelo']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="serie" class="col-sm-2 control-label">Serie:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="serie" name="serie" value="<?php echo $row['serie']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="estado_fisico" class="col-sm-2 control-label">Estado Fisico:</label>
					<div class="col-sm-3">
						<select class="form-control" id="estado_fisico" name="estado_fisico">
							<option value="BUENO" <?php if($row['estado_fisico']=='BUENO') echo 'selected'; ?>>BUENO</option>
							<option value="REGULAR" <?php if($row['estado_fisico']=='REGULAR') echo 'selected'; ?>>REGULAR</option>
							<option value="MALO" <?php if($row['estado_fisico']=='MALO') echo 'selected'; ?>>MALO</option>	
							<option value="INSERVIBLE" <?php if($row['estado_fisico']=='INSERVIBLE') echo 'selected'; ?>>INSERVIBLE</option>								
						</select>
					</div>
				</div>	
				
				<div class="form-group">
					<label for="costo_unitario" class="col-sm-2 control-label">Costo Unitario:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="costo_unitario" name="costo_unitario" value="<?php echo $row['costo_unitario']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="iva" class="col-sm-2 control-label">IVA:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="iva" name="iva" value="<?php echo $row['iva']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="costo_total" class="col-sm-2 control-label">Costo Total:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="costo_total" name="costo_total" value="<?php echo $row['costo_total']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="fecha_asignacion" class="col-sm-2 control-label">Fecha de Asignación:</label>
					<div class="col-sm-2">
						<input type="date" class="form-control" id="fecha_asignacion" name="fecha_asig" value="<?php echo $row['fecha_asig']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="observaciones" class="col-sm-2 control-label">Observaciones:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="observaciones" name="observaciones" value="<?php echo $row['observaciones']; ?>" />
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
						<input type="text" class="form-control" id="autorizo" name="autorizo" value="<?php echo $row['personal']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label for="puesto" class="col-sm-2 control-label">Puesto:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $row['puesto']; ?>" />
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10"> 
							<a href="consulta.php" class="btn btn-danger">Regresar</a>
						<button type="submit" class="btn btn-primary">Modificar</button> <!-- Envia el formulario por POST -->
					</div>
						
					</div>
				</div>
			</form>
		</div>
	</body>
</html>