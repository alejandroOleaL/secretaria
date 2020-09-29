<?php

	require 'includes/conexion.php';
	
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
	WHERE resguardos_personal.estado='1' and equipos.estado_baja='1'";
	$resultado = $mysqli->query($sql);
	
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
		
		<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
					"order": [[0, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros disponibles",
					"infoFiltered": "(filtrada de _MAX_ registros)",
					"loadingRecords": "Cargando...",
					"processing":     "Procesando...",
					"search": "Buscar:",
					"zeroRecords":    "No se encontraron registros coincidentes",
					"paginate": {
						"next":       "Siguiente",
						"previous":   "Anterior"
								},					
								},
					});	
				});
		</script>
	
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
				
				<div class="row">
					<a href="welcome.php" class="btn btn-danger">Regresar</a>
					<a href="imprimir.php" class="btn btn-warning">Imprimir</a>
					
				</div>
			</div>
			
				
				
			<br>
			<div class="row table-responsive">
				<table class="display table-hover" id="mitabla">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nombre</th>
							<th>Cargo</th>
							<th>Area</th>
							<th>Ejercicio</th>
							<th>No. Factura</th>
							<th>Ubicación</th>
							<th>Clave Inventarial</th>	
							<th>Descripción y Caracteristicas</th>		
							<th>Marca</th>
							<th>Serie</th>
							<th>Costo Unitario</th>
							<th>IVA</th>
							<th>Costo Total</th>
							<th>Modificar</th>
							<th>Imprimir</th>
							<th>Cambio</th>			
							<th>Baja</th>
							<th>Plantilla</th>							
						</tr>
					</thead>
					<tbody>
						<?php $cont=0; while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { $cont=$cont+1; ;
								?>
							<tr>
								<td><?php echo $cont;?></td>
								<td><?php echo $row['nombre']; echo ' '; echo $row['ape_paterno']; echo ' '; echo $row['ape_materno']; ?></td>
								<td><?php echo $row['cargo']; ?></td>
								<td><?php echo $row['nombre_area']; ?></td>
								<td><?php echo $row['ejercicio']; ?></td>
								<td><?php echo $row['num_factura']; ?></td>
								<td><?php echo $row['ubicacion']; ?></td>
								<td><?php echo $row['clave_inventarial']; ?></td>							
								<td><?php echo $row['descripcion']; ?></td>
								<td><?php echo $row['marca']; ?></td>
								<td><?php echo $row['serie']; ?></td>
								<td><?php echo $row['costo_unitario']; ?></td>
								<td><?php echo $row['iva']; ?></td>
								<td><?php echo $row['costo_total']; ?></td>
								<td><?php { ?><a href="modificar.php?id=<?php echo $row['id_equipo']; ?>"> <?php }?><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td><?php { ?><a href="pdf.php?id=<?php echo $row['id_personal']; ?>"> <?php }?><span class="glyphicon glyphicon-print"></span></a></td>
									<td><?php { ?><a href="cambio.php?id=<?php echo $row['id_resguardo']; ?>"> <?php }?><span class="glyphicon glyphicon-user"></span></a></td>
									<td><?php { ?><a href="nuevo_bajas.php?id=<?php echo $row['id_personal']; ?>"> <?php }?><span class="glyphicon glyphicon-trash"></span></a></td>
								<td><?php { ?><a href="pdf_chico.php?id=<?php echo $row['id_personal']; ?>"> <?php }?><span class="glyphicon glyphicon-print"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>			
		</div>	
		
								<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Bajas</h4>
					</div>
					
					<div class="modal-body">
						¿Desea dar de baja este resguardo?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Dar de baja</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>

	</body>
</html>
