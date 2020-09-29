<?php

	require 'includes/conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM personal
	INNER JOIN resguardos_personal
	ON resguardos_personal.id_personal = personal.id_personal
	INNER JOIN resguardos
	ON resguardos.id_resguardo = resguardos_personal.id_resguardo
	INNER JOIN resguardos_equipos
	ON resguardos_equipos.id_resguardo = resguardos.id_resguardo
	INNER JOIN equipos
	ON equipos.id_equipo = resguardos_equipos.id_equipo
	INNER JOIN ubicaciones
	ON ubicaciones.id_ubicacion = personal.id_ubicacion	
	INNER JOIN cargos
	ON cargos.id_cargo = personal.id_cargo
	INNER JOIN areas
	ON areas.id_area = personal.id_area
	WHERE resguardos.id_resguardo='$id'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado = $mysqli->query($sql);  //Guarda el resultado del query en la variable $resultado
	$personal_antiguo = $resultado->fetch_array(MYSQLI_ASSOC); //Recorre la variable $resultado y lo guarda en $row
	
		$where = "";
		
		if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		
		$where="WHERE personal.nom_completo REGEXP '^$valor'";
	}
	
		$sql = "SELECT * FROM  personal $where "; 
		$resultado = $mysqli->query($sql); 
		$row = $resultado->fetch_array(MYSQLI_ASSOC); 
		
		if(isset($row)){
			$area = $row['id_area'];
		
			$ubicacion = $row['id_ubicacion'];
	
			$queryubica = "SELECT * FROM ubicaciones";
			$resultadoubica = $mysqli->query($queryubica);
	
			$cargo = $row['id_cargo'];
		
			$querycargo = "SELECT * FROM cargos WHERE id_cargo=$cargo";
			$resultadocargo = $mysqli->query($querycargo);
			$rowcargo = $resultadocargo->fetch_array(MYSQLI_ASSOC); 
		
		}else{ ?>
		
			echo'<script type="text/javascript">
			alert("No se encontro al personal, ingrese correctamente");
			window.location.href="nuevo.php";
			</script>';
			
		<?php }
	
	$queryper = "SELECT * FROM areas"; 
	$resultadoper = $mysqli->query($queryper);

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
					<h2 style="text-align:center">CAMBIO DE RESGUARDO</h3>
				</div>
				<div class="col-sm-3">
					<img src="imagenes/secretaria.jpg" width="320" id="img1">
				</div>
			</div>
			
			<div class="form-group">
				<div class="row">
				</div>
			</div>
			
			<div class="container">
				<div class="row">
				<form class="form-horizontal" method="POST" action="guardar_cambios.php" autocomplete="off">
					<div class="col-sm-9">
						<div class="form-group">
							<div class="col-sm-5">
								<label for="datosPersonal" class="col-sm-10 control-label">Datos del Resguardo anterior:</label>
							</div>
						</div>
					
						<div class="form-group">
							<label for="nombre" class="col-sm-3 control-label">Clave Inventarial:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $personal_antiguo['clave_inventarial']; ?>"  disabled/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="nombre" class="col-sm-3 control-label">Personal anterior:</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $personal_antiguo['nom_completo']; ?>"  disabled/>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div>
			
			<div class="container">
			 <div class="row">
				<div class="form-group">								
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="form-group">
							<label for="campo" class="col-sm-2 control-label">Buscar personal:</label>
							<div class="col-sm-4">
								<input input type="text" class="form-control" id="campo" name="campo"  />
							</div>
						</div>
					
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-primary"/>
					<a href="welcome.php"class="btn btn-info">Regresar al menu principal</a>
					</form>
				</div>
			 </div>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar_cambios.php" autocomplete="off">
			
					
					<input type="hidden" id="id_resguardo" name="id_resguardo" value="<?php echo $personal_antiguo['id_resguardo']; ?>"  />
					<input type="hidden" id="id_personal" name="id_personal_antiguo" value="<?php echo $personal_antiguo['id_personal']; ?>"  />
					
					<input type="hidden" id="id_personal" name="id_personal_nuevo" value="<?php echo $row['id_personal']; ?>"  />
					
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
				
				<div class="form-group">
					<label for="domicilio" class="col-sm-2 control-label">Domicilio:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo $row['domicilio']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="num_empleado" class="col-sm-2 control-label">Número de Empleado:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="num_empleado" name="num_empleado" value="<?php echo $row['num_empleado']; ?>"  />
						</div>
				</div>
				
				<div class="form-group">
					<label for="cargo" class="col-sm-2 control-label">Cargo:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $rowcargo['cargo']; ?>"  />
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
						<option value="1">Seleccionar Area:</option>
							<?php while($rowP = $resultadoper->fetch_assoc()) { ?>
							<option value="<?php echo $rowP['id_area']; ?>" <?php if($rowP['id_area']==$area) { echo 'selected'; } ?>><?php echo $rowP['nombre_area']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="n_area" class="col-sm-4 control-label">En caso de no encontrar el área ingresar:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="n_area" name="n_area" placeholder="Nueva Area">
						</div>
				</div>
				
				<div class="form-group">
					<label for="ubicaciones" class="col-sm-2 control-label">Ubicaciones:</label>
					<div class="col-sm-3">
						<select class="form-control" id="ubicacion" name="ubicacion">
							<option value="1">Seleccionar Ubicación:</option>
							<?php while($rowu = $resultadoubica->fetch_assoc()) { ?>
							<option value="<?php echo $rowu['id_ubicacion']; ?>" <?php if($rowu['id_ubicacion']==$ubicacion) { echo 'selected'; } ?>><?php echo $rowu['ubicacion']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="n_ubicacion" class="col-sm-4 control-label">En caso de no encontrar la ubicación ingresar:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="n_ubicacion" name="n_ubicacion" placeholder="Nueva Ubicación">
						</div>
				</div>
				
				<div class="form-group">
					<label for="estado_fisico" class="col-sm-2 control-label">Estado Fisico:</label>
					<div class="col-sm-3">
						<select class="form-control" id="estado_fisico" name="estado_fisico"> 
							<option value="BUENO">BUENO</option>
							<option value="REGULAR">REGULAR</option>	
							<option value="MALO">MALO</option>		
							<option value="INSERVIBLE">INSERVIBLE</option>									
						</select>
					</div>
				</div>	
				
				<div class="form-group">
					<label for="observaciones" class="col-sm-2 control-label">Observaciones:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="fecha_asig" class="col-sm-2 control-label">Fecha de Asignación:</label>
					<div class="col-sm-2">
						<input type="date" class="form-control" id="fecha_asig" name="fecha_asig">
					</div>
				</div>
				
				<div class="form-group">
					<label for="autorizo" class="col-sm-2 control-label">Autorizó:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="autorizo" name="autorizo" placeholder="Autorizó" >
					</div>
				</div>	
				
				<div class="form-group">
					<label for="puesto" class="col-sm-2 control-label">Puesto:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto" >
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
							<a href="welcome.php"class="btn btn-danger">Regresar</a>
						<button name="insertar" type="submit" class="btn btn-primary">Realizar Cambio</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>