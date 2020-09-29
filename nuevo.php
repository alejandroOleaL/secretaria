<?php

	require 'includes/conexion.php';
	
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
			 <div class="row">
			 	<div class="col-sm-3">
					<img src="imagenes/escudo.png" width="220" id="img1">
				</div>
				<div class="col-sm-6">
					<h3 style="text-align:center">INGRESAR INFORMACION</h3>
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
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
			
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
						<div class="col-sm-3">
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
					<div class="col-sm-5">
						<label for="datosEquipo" class="col-sm-10 control-label">Datos del Equipo y Resguardo:</label>
					</div>
				</div>
					
				<div class="form-group">
					<label for="ejercicio" class="col-sm-2 control-label">Ejercicio Fiscal:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="ejercicio" name="ejercicio" placeholder="Ejercicio Fiscal">
					</div>
				</div>

				<div class="form-group">
					<label for="factura" class="col-sm-2 control-label">Número Factura:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="factura" name="factura" placeholder="Número Factura">
					</div>
				</div>
				
				<div class="form-group">
					<label for="clave_inventarial" class="col-sm-2 control-label">Clave Inventarial:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="clave_inventarial" name="clave_inventarial" placeholder="Clave Inventarial">
					</div>
				</div>

				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripción:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="caracteristicas" class="col-sm-2 control-label">Caracteristicas:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="caracteristicas" name="caracteristicas" placeholder="Caracteristicas" ></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="marca" class="col-sm-2 control-label">Marca:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="modelo" class="col-sm-2 control-label">Modelo:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="serie" class="col-sm-2 control-label">Serie:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="serie" name="serie" placeholder="Serie" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="color" name="color" placeholder="Color" >
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
					<label for="costo_unitario" class="col-sm-2 control-label">Costo Unitario:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="costo_unitario" name="costo_unitario" placeholder="Costo Unitario" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="iva" class="col-sm-2 control-label">IVA:</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="iva" name="iva" placeholder="IVA" >
					</div>
				</div>		

				<div class="form-group">
					<label for="costo_total" class="col-sm-2 control-label">Costo Total:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="costo_total" name="costo_total" placeholder="Costo Total" >
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
					<div class="col-sm-5">
						<label for="datosautorizo" class="col-sm-10 control-label">Datos del Personal Que Autorizó:</label>
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
						<button name="insertar" type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>