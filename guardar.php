<!-- GUARDAR  -->
<!-- Este script ayuda a guardar todos los datos que se ingresaron en el formulario que corresponde al tipo de solicitud "FAMILIAS Y USUARIOS EN GENERAL" -->

<?php
	
	require 'includes/conexion.php'; //requiere del archivo de conexion
	
	//Variable para ver si hay ya existe la clave inventarial
	$clave_ingresada = false;
	
	$clave = $_POST['clave_inventarial'];
	$nombre = $_POST['nombre']; 
	$ape_paterno = $_POST['a_paterno']; 
	$ape_materno = $_POST['a_materno']; 
	$nom_completo = $_POST['nombre'] . " " . $_POST['a_paterno'] . " " . $_POST['a_materno'];
	$num_empleado = $_POST['num_empleado']; 
	$domicilio = $_POST['domicilio']; 
	$ejercicio = $_POST['ejercicio']; 
	$cargo = $_POST['cargo'];
	$categoria = $_POST['categoria'];
	$factura = $_POST['factura'];
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
	$estado = '1';
	$dato = 'nulo';

	//Query para saber si la clave ya fue ingresada
	$sql = "SELECT clave_inventarial FROM resguardos
	WHERE resguardos.clave_inventarial='$clave'"; 
	$resultado = $mysqli->query($sql);  //Guarda el resultado del query en la variable $resultado
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
	$clave_2 = $row['clave_inventarial'];
	
	if($clave_2 == null){
		$clave_2 = 'vacio';
	}
	
	if($clave_2 !== $clave) {
		
		//en caso de se ingreso una nueva area ejecuta el query
		if(!empty($_POST['n_area']))
		{
			$nom_area = $_POST['n_area'];
			$sqlarea = "INSERT INTO areas (nombre_area) VALUES ('$nom_area')"; 
			$resultadoarea = $mysqli->query($sqlarea); 
			$area = mysqli_insert_id($mysqli);
		} else{ //sino recibe el area
				$area = $_POST['area'];
		}
		
		//en caso de se ingreso una nueva ubicacion area ejecuta el query
		if(!empty($_POST['n_ubicacion']))
		{
			$nom_ubica = $_POST['n_ubicacion'];
			$sqlubica = "INSERT INTO ubicaciones (ubicacion) VALUES ('$nom_ubica')"; 
			$resultadoubica = $mysqli->query($sqlubica); 
			$ubicacion = mysqli_insert_id($mysqli);
		} else{ //sino recibe la ubicacion
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
		
		$sqluba = "INSERT INTO autorizo_personal (personal, puesto) VALUES ('$personal', '$puesto')"; 
		$resultadoba = $mysqli->query($sqluba); 
		$row_ba = mysqli_insert_id($mysqli);
	
		$sqlb = "INSERT INTO bajas (num_folio, fecha_factura, valor_adq, justificacion, observaciones, id_autorizo) VALUES ('$dato', '$dato', '$dato', '$dato', '$dato', '$row_ba')"; 
		$resultadob = $mysqli->query($sqlb); 
		$row_b = mysqli_insert_id($mysqli);
	
		$sqle = "INSERT INTO equipos (descripcion, caracteristicas, marca, modelo, serie, color, estado_fisico, observaciones, id_baja, estado_baja) VALUES ('$descripcion', '$caracteristicas', '$marca', '$modelo', '$serie', '$color', '$estado_fisico', '$observaciones', '$row_b', '$estado')"; 
		$resultadoe = $mysqli->query($sqle); 
		$row_e = mysqli_insert_id($mysqli);
		
		$sqlr = "INSERT INTO resguardos (clave_inventarial, ejercicio, num_factura, estado, costo_unitario, iva, costo_total) VALUES ('$clave', '$ejercicio', '$factura', '$estado', '$costo_unitario', '$iva', '$costo_total')"; 
		$resultador = $mysqli->query($sqlr); 
		$row_r = mysqli_insert_id($mysqli);
		
		$sqlrese = "INSERT INTO resguardos_equipos (id_resguardo, id_equipo) VALUES ('$row_r', '$row_e')"; 
		$resultadorese = $mysqli->query($sqlrese); 
		
		$sqlra = "INSERT INTO resguardo_autorizo (id_resguardo, id_autorizo, fecha_asig) VALUES ('$row_r', '$row_ba', '$fecha_asig')"; 
		$resultadora = $mysqli->query($sqlra); 
		
		$sqlresp = "INSERT INTO resguardos_personal (id_resguardo, id_personal, estado) VALUES ('$row_r', '$row_pers', '$estado')"; 
		$resultadoresp = $mysqli->query($sqlresp); 
	
	} 	
	else{
		$clave_ingresada = true;
	
		}
	
	
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
					<?php if($resultador) { ?>
						<h3>REGISTRO GUARDADO</h3> <!-- Muestra este mensaje en caso de que algunos de los querys que se guardaron en las variables de resultados se han realizado correctamente -->
						<?php } else if($clave_ingresada == true){ ?>
						<h3>LA CLAVE INVENTARIAL YA FUE INGRESADA</h3> <!-- Muestra este mensaje en caso de tener un error al momento de realizar algunos de los querys que se guardaron en las variables de resultados-->
					<?php } else { ?>
											<h3>Error el ingresar</h3> 
					<?php } ?>
						<a href="welcome.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>