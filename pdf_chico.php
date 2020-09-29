<?php
	
	require 'includes/plantilla.php';
	require 'includes/conexion.php';
	
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
	WHERE personal.id_personal='$id'"; 
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC); 
	
	
	$pdf = new PDF();
	$pdf->AddPage();
			
	$pdf->Image('imagenes/escudo.png', 12,11,18);
		$pdf->Image('imagenes/secretaria.jpg', 48,11,20);
					
					
				$pdf->SetFont('Arial','',6);
				$pdf->MultiCell(60,30, utf8_decode(''),1,'L',0);
				$pdf->SetY(17);
			$pdf->MultiCell(60,5, utf8_decode($row['nom_completo']),0,'C',0);
			$pdf->MultiCell(60,5, utf8_decode($row['clave_inventarial']),0,'C',0);
			$pdf->MultiCell(60,5, utf8_decode($row['caracteristicas']),0,'C',0);
			$pdf->MultiCell(60,5, utf8_decode($row['descripcion']),0,'C',0);


			

	$pdf->Output();

?>