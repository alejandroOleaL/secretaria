<?php
	
	require 'includes/plantilla.php';
	require 'includes/conexion.php';
	
	$id = $_GET['id'];
	
	if($id=='1'){
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
	WHERE resguardos_personal.estado='1' and equipos.estado_baja='1'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado = $mysqli->query($sql);
	}
	else {
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
	WHERE personal.id_personal='$id'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado = $mysqli->query($sql);  //Guarda el resultado del query en la variable $resultado
	}
	
	
	$pdf = new PDF();
	$pdf->AddPage('L','A3');
	
		$pdf->SetXY(10,10);
		$pdf->Image('imagenes/escudo.png', 10,7,35);
		$pdf->Image('imagenes/secretaria.jpg', 50,7,40);
			
			$pdf->SetFont('Arial','B',20);
			$pdf->Cell(380,8, utf8_decode ('Secretaría De Contraloria Y Transparencia Gubernamental'),0,1,'C');
			$pdf->SetFont('Arial','',15);
			$pdf->Cell(380,8, utf8_decode ('Delegación Administrativa'),0,1,'C');
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(380,6, utf8_decode ('Resguardos Internos'),0,1,'C');

			$pdf->SetX(10);
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(7,7, utf8_decode ('No.'),1,0,'C',1);
			$pdf->Cell(65,7, 'Nombre',1,0,'C',1);
			$pdf->Cell(45,7, 'Cargo',1,0,'C',1);
			$pdf->Cell(18,7, 'Ejercicio',1,0,'C',1);
			$pdf->Cell(22,7, 'No. Factura',1,0,'C',1);
			$pdf->Cell(25,7, utf8_decode ('Ubicación'),1,0,'C',1);
			$pdf->Cell(35,7, 'Clave Inventarial',1,0,'C',1);
			$pdf->Cell(60,7, utf8_decode ('Descripción y Caracteristicas'),1,0,'C',1);
			$pdf->Cell(22,7, utf8_decode ('Marca'),1,0,'C',1);
			$pdf->Cell(31,7, utf8_decode ('Serie'),1,0,'C',1);
			$pdf->Cell(23,7, utf8_decode ('Color'),1,0,'C',1);
			$pdf->SetFont('Arial','B',7.3);
			$pdf->Cell(18,7, utf8_decode ('Costo Unitario'),1,0,'C',1);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(13,7, utf8_decode ('IVA'),1,0,'C',1);
			$pdf->Cell(19,7, utf8_decode ('Costo Total'),1,1,'C',1);

			
			$pdf->SetFont('Arial','',7);
			while($row = $resultado->fetch_assoc())
			{
				
				$x = $pdf->GetX();
				$pdf->myCell(7,10,$x,utf8_decode($row['id_equipo']));
				$x = $pdf->GetX();
				$pdf->myCell(65,10,$x,utf8_decode($row['nom_completo']));
								$x = $pdf->GetX();
				$pdf->myCell(45,10,$x,utf8_decode($row['cargo']));
								$x = $pdf->GetX();
				$pdf->myCell(18,10,$x,utf8_decode($row['ejercicio']));
								$x = $pdf->GetX();
				$pdf->myCell(22,10,$x,utf8_decode($row['num_factura']));
								$x = $pdf->GetX();
				$pdf->myCell(25,10,$x,utf8_decode($row['ubicacion']));
				$x = $pdf->GetX();
				$pdf->myCell(35,10,$x,utf8_decode($row['clave_inventarial']));
				$var1 = $row['descripcion'];
				$var2 = $row['caracteristicas'];
				$var3 = $var1 . " " . $var2;
				$str = $var3;
				$x = $pdf->GetX();
				$pdf->myCell(60,10,$x,$var3);
				$x = $pdf->GetX();
				$pdf->myCell(22,10,$x,utf8_decode($row['marca']));
				$x = $pdf->GetX();
				$pdf->myCell(31,10,$x,utf8_decode($row['serie']));
				$x = $pdf->GetX();
				$pdf->myCell(23,10,$x,utf8_decode($row['color']));
				$x = $pdf->GetX();
				$pdf->myCell(18,10,$x,utf8_decode($row['costo_unitario']));
				$x = $pdf->GetX();
				$pdf->myCell(13,10,$x,utf8_decode($row['iva']));
				$x = $pdf->GetX();
				$pdf->myCell(19,10,$x,utf8_decode($row['costo_total']));
				$pdf->Ln();

			}
			
	$pdf->Output();

?>