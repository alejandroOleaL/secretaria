<?php
	
	require 'includes/plantilla.php';
	require 'includes/conexion.php';
	
	// $expediente = $_GET['expediente_su'];

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
	INNER JOIN areas
	ON areas.id_area = personal.id_area
	WHERE resguardos.estado='2'";
	$resultado = $mysqli->query($sql);
	
	
	$pdf = new PDF();
	$pdf->AddPage('L');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(280,5, 'SECRETARIA DE CONTRALORIA Y TRANSPARENCIA GUBERNAMENTAL',0,1,'C');
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(280,5, 'DELGACION ADMINISTRATIVA',0,1,'C');
			$pdf->Cell(280,5, 'AREA DE RECURSOS MATERIALES Y SERVICIOS GENERALES',0,1,'C');
			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(280,7, 'BAJA DE ACTIVO FIJO',0,1,'C');
			$pdf->Cell(30,5, '',0,1,'');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(180,15, utf8_decode ('Secretaría de C. y T.G.'),1,0,'C');
			$pdf->Cell(2);
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(100,5, utf8_decode ('Fecha de baja'),1,1,'C');
			$pdf->SetX(192);
			$pdf->SetFont('Arial','',8);			
			$pdf->MultiCell(100,5, utf8_decode('02-MAR-06 
			DIA / MES / AÑO'),1,'C',0);
										
			$y = $pdf->GetY();
			$pdf->SetY($y+3);	
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(7,10, utf8_decode ('No.'),1,0,'C',1);
			$pdf->Cell(50,10, 'Responsable del resguardo',1,0,'C',1);
			$pdf->Cell(35,10, 'Clave Inventarial',1,0,'C',1);
			$pdf->Cell(120,10, utf8_decode ('Descripción del Bien'),1,0,'C',1);
			$pdf->Cell(35,10, utf8_decode ('No. de Serie'),1,0,'C',1);
			$pdf->Cell(35,10, utf8_decode ('Motivo de baja *'),1,1,'C',1);
			
			$pdf->SetFont('Arial','',7);
			while($row3 = $resultado->fetch_assoc())
			{
				$pdf->Cell(7,10, utf8_decode($row3['id_equipo']),1,0,'L');
				$pdf->Cell(50,10, utf8_decode($row3['nom_completo']),1,0,'L');
				$pdf->Cell(35,10, utf8_decode($row3['clave_inventarial']),1,0,'L');
				$pdf->Cell(120,10, utf8_decode($row3['descripcion']),1,0,'L');
				$pdf->Cell(35,10, utf8_decode($row3['serie']),1,1,'L');
			//	$pdf->Cell(35,10, utf8_decode($row3['motivo_baja']),1,0,'L');



			}
			
			$y = $pdf->GetY();
			$pdf->SetY($y+3);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(280,7, utf8_decode ('* D=Desuso, M=Mal Estado, I=Inservible, O=Obsoleto'),0,1,'L',0);
			$pdf->SetFont('Arial','',8);
			$pdf->MultiCell(280,5, utf8_decode('NOTA: Este formato deberá estar completamente requisitado, con las firmas y sellos del área solicitante y la baja será procesada hasta que contengala firma del encargado del almacén y sello de esta Dirección, así mismo el mobiliario deberá estar totalmente libre de objetos y documentos; en equipo electrónico deberá presentarse con todos sus componentes.'),0,'L',0);

			$y = $pdf->GetY();
			$pdf->SetY($y+3);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(60,5, utf8_decode ('SOLICITÓ'),0,0,'C',0);
			$pdf->Cell(60,5, utf8_decode ('AUTORIZÓ'),0,1,'C',0);
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(60,5, utf8_decode ('NOMBRE, FIRMA Y SELLO'),0,0,'C',0);
			$pdf->Cell(60,5, utf8_decode ('NOMBRE, FIRMA Y SELLO'),0,1,'C',0);

	$pdf->Output();

?>