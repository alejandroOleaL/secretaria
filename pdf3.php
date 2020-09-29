<?php
	
	require 'includes/plantilla_bajas.php';
	require 'includes/conexion.php';
	
	$id = $_GET['id'];
	
	if($id=='0'){
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
	INNER JOIN bajas
	ON bajas.id_baja = equipos.id_baja
	WHERE equipos.estado_baja='2'"; //Realiza una busqueda de todos los datos que esten relacionados a la variable $expediente
	$resultado = $mysqli->query($sql);  //Guarda el resultado del query en la variable $resultado
		
	$personal = '';
	$puesto ='DELEGADA ADMINISTRATIVA';
	$fecha ='';
	
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
	INNER JOIN bajas
	ON bajas.id_baja = equipos.id_baja
	WHERE equipos.id_equipo='$id'"; 
	$resultado = $mysqli->query($sql);
	
		
	$sql2 = "SELECT * FROM equipos 
	INNER JOIN resguardos_equipos
	ON resguardos_equipos.id_equipo = equipos.id_equipo
	INNER JOIN resguardos
	ON resguardos.id_resguardo = resguardos_equipos.id_resguardo
	INNER JOIN resguardo_autorizo
	ON resguardo_autorizo.id_resguardo = resguardos.id_resguardo
	INNER JOIN autorizo_personal
	ON autorizo_personal.id_autorizo = resguardo_autorizo.id_autorizo
	WHERE equipos.id_equipo='$id'"; 
	$resultado2 = $mysqli->query($sql2);
	$row2 = $resultado2->fetch_array(MYSQLI_ASSOC); 
	$personal = $row2['personal'];
	$puesto = $row2['puesto'];
	$fecha = $row2['fecha_asig'];
	
	}
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	$pdf->SetAutoPageBreak(true, 60);
			$y = $pdf->GetY();
			$pdf->SetY($y+3);	
			$pdf->SetX(4);
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',7);
			$pdf->MultiCell(7,12, utf8_decode('NO.'),1,'C',1);
			$pdf->SetXY(11,48);
			$pdf->MultiCell(25,6, utf8_decode('NÚMERO DE INVENTARIO'),1,'C',1);
			$pdf->SetXY(36,48);
			$pdf->MultiCell(45,12, utf8_decode('NOMBRE DEL BIEN'),1,'C',1);
			$pdf->SetXY(81,48);
			$pdf->MultiCell(17,12, utf8_decode('MARCA'),1,'C',1);
			$pdf->SetXY(98,48);
			$pdf->MultiCell(17,12, utf8_decode('MODELO'),1,'C',1);
			$pdf->SetXY(115,48);
			$pdf->MultiCell(17,12, utf8_decode('SERIE'),1,'C',1);
			$pdf->SetXY(132,48);
			$pdf->MultiCell(25,6, utf8_decode('NÚM. DE FOLIO FISCAL/FACTURA'),1,'C',1);
			$pdf->SetXY(157,48);
			$pdf->MultiCell(15,6, utf8_decode('FECHA/ FACTURA'),1,'C',1);
			$pdf->SetXY(172,48);
			$pdf->SetFont('Arial','B',6.5);
			$pdf->MultiCell(15,4, utf8_decode('VALOR DE ADQ. O DE FACTURA'),1,'C',1);
			$pdf->SetXY(187,48);
			$pdf->MultiCell(15,4, utf8_decode('ESTADO FÍSICO DEL BIEN'),1,'C',1);
			$pdf->SetXY(202,48);
						$pdf->SetFont('Arial','B',7);
			$pdf->MultiCell(45,12, utf8_decode('JUSTIFICACIÓN'),1,'C',1);
			$pdf->SetXY(247,48);
			$pdf->MultiCell(45,12, utf8_decode('OBSERVACIONES'),1,'C',1);
						
			$pdf->SetFont('Arial','',6);
			while($row = $resultado->fetch_assoc()) 
			{
				$pdf->SetX(4);
				$x = $pdf->GetX();
				$pdf->myCell(7,10,$x,utf8_decode($row['id_resguardo']));
				$x = $pdf->GetX();
				$pdf->myCell(25,10,$x,utf8_decode($row['clave_inventarial']));
				$x = $pdf->GetX();
				$pdf->myCell(45,10,$x,utf8_decode($row['descripcion']));
				$x = $pdf->GetX();
				$pdf->myCell(17,10,$x,utf8_decode($row['marca']));
				$x = $pdf->GetX();
				$pdf->myCell(17,10,$x,utf8_decode($row['modelo']));
				$x = $pdf->GetX();
				$pdf->myCell(17,10,$x,utf8_decode($row['serie']));
				$x = $pdf->GetX();
				$pdf->myCell(25,10,$x,utf8_decode($row['num_factura']));
				$x = $pdf->GetX();
				$pdf->myCell(15,10,$x,utf8_decode($row['fecha_factura']));
				$x = $pdf->GetX();
				$pdf->myCell(15,10,$x,utf8_decode($row['valor_adq']));
				$x = $pdf->GetX();
				$pdf->myCell(15,10,$x,utf8_decode($row['estado_fisico']));
				$x = $pdf->GetX();
				$pdf->myCell(45,10,$x,utf8_decode($row['justificacion']));
				$x = $pdf->GetX();
				$pdf->myCell(45,10,$x,utf8_decode($row['observaciones']));
				$pdf->Ln();

			}

	$pdf->Output();

?>