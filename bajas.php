<?php

	require 'includes/conexion.php';
	
	$sql = "SELECT * FROM equipos 
	INNER JOIN resguardos_equipos
	ON resguardos_equipos.id_equipo = equipos.id_equipo
	INNER JOIN resguardos
	ON resguardos.id_resguardo = resguardos_equipos.id_resguardo
	INNER JOIN bajas
	ON bajas.id_baja = equipos.id_baja
	WHERE equipos.estado_baja='2'";
	$resultado = $mysqli->query($sql);
	
	$id_all=0;

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
						<h4 style="text-align:center">Bajas Internas</h4>
					</div>
					<div class="col-sm-3">
						<img src="imagenes/secretaria.jpg" width="320" id="img1">
					</div>
				</div>
			</div>
			
			<div class="row">
				<a href="welcome.php" class="btn btn-danger">Regresar</a>
				<?php { ?><a href="pdf3_bajas.php?id=<?php echo 0; ?>"> <?php }?><span class="btn btn-warning">Imprimir</span></a>
			</div>
				
				
			<br>
			<div class="row table-responsive">
				<table class="display table-hover" id="mitabla">
					<thead>
						<tr>
							<th>N°</th>
							<th>Número de Inventario</th>
							<th>Nombre del Bien</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Serie</th>		
							<th>Estado Físico del Bien</th>
							<th>Justificación</th>
							<th>Observaciones</th>
							<th>Imprimir</th>
							<th>Eliminar</th>								
						</tr>
					</thead>
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id_equipo']; ?></td>
								<td><?php echo $row['clave_inventarial']; ?></td>
								<td><?php echo $row['descripcion']; ?></td>
								<td><?php echo $row['marca']; ?></td>
								<td><?php echo $row['modelo']; ?></td>
								<td><?php echo $row['serie']; ?></td>
								<td><?php echo $row['estado_fisico']; ?></td>
								<td><?php echo $row['justificacion']; ?></td>							
								<td><?php echo $row['observaciones']; ?></td>
								<td><?php { ?><a href="pdf3.php?id=<?php echo $row['id_equipo']; ?> & includes/plantilla_bajas.php?id=<?php echo $row['id_equipo']; ?>"> <?php }?><span class="glyphicon glyphicon-print"></span></a></td>
								<td><a href="#" data-href="eliminar.php?id=<?php echo $row['id_equipo']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
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
