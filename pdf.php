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
	$pdf->SetXY(5,10);
	$pdf->Image('imagenes/escudo.png', 10,20,17);
		$pdf->Image('imagenes/secretaria.jpg', 28,20,20);
				$pdf->SetFont('Arial','',10);
				$pdf->SetXY(35,10);
			$pdf->Cell(30);
			$pdf->Cell(135,5, 'SECRETARIA DE CONTRALORIA Y TRANSPARENCIA GUBERNAMENTAL',0,1,'C');
			$y = $pdf->GetY();
			$pdf->SetY($y+5);
			
						$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',13);
			$pdf->SetX(20);
			$pdf->Cell(30);
			$pdf->Cell(150,8, utf8_decode ('RESGUARDO INTERNO DE BIENES MUEBLES'),1,1,'C',1);
			
			$pdf->SetFillColor(255,255,255);
			$y = $pdf->GetY();
			$pdf->SetY($y+3);
			$pdf->SetFont('Arial','B',8);
			$pdf->SetX(50);
			$pdf->Cell(15,5, 'NOMBRE:',0,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(25,5, utf8_decode($row['nom_completo']),0,1,'L');
			$pdf->SetX(50);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(19,5, 'CATEGORIA:',0,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(35,5, utf8_decode($row['categoria']),0,0,'L');
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(24,5, 'NO. EMPLEADO:',0,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(25,5, utf8_decode($row['num_empleado']),0,1,'L');
			$pdf->SetX(50);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(17,5, 'DOMICILIO:',0,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(45,5, utf8_decode($row['domicilio']),0,1,'L');
			$pdf->SetX(50);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(35,5, 'FECHA DE ASIGNACION:',0,0,'L');
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(25,5, utf8_decode($row['fecha_asig']),0,1,'L');
			
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(16,5, 'REGION',0,0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(21,5, '03   CENTRO',0,0,'L');
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(16,5, 'DISTRITO',0,0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(21,5, '09  BRAVO',0,0,'L');
			
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(16,5, 'MUNICIPIO',0,0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(39,5, '30 CHILPANCINGO DE LOS BRAVO',0,0,'L');
			$pdf->Cell(36,5, 'LOCALIDAD CHILPANCINGO DE LOS BRAVO',0,1,'L');
			
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(16,5, 'UNIDAD',0,0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(21,5, '07',0,0,'L');
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(38,5, 'AREA',0,0,'L');
			$pdf->Cell(61,5, 'SUB-AREA',0,0,'L');
			$pdf->Cell(46,5, 'S-S-AREA',0,1,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->MultiCell(193,5, utf8_decode('EL PRESENTE RESPONZABILIZA AL USUARIO DE LA CONSERVACION DE LOS BIENES MUEBLES BAJO DESCRITOS AL TÉRMINO DE DE SUS FUNCIONES CON EL GOBIERNO DEL ESTADO, DEBERÁ ENTREGAR LOS BIENES EN LAS CONDICIONES QUE LE FUERON ASIGNADOS CONFORME AL ART 43 FRACC. V DE LA LEY DEL TRABAJO DE LOS SERVIDORES PUBLICOS DEL ESTADO DE GUERRERO                                                        '),1,'L',0);
			
			
			$y = $pdf->GetY();
			$pdf->SetY($y+3);
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',5);
			$pdf->Cell(20,8, 'CLAVE INVENTARIAL',1,0,'C',1);
			$pdf->Cell(29,8, utf8_decode('DESCRIPCIÓN'),1,0,'C',1);
			$pdf->Cell(29,8, 'CARACTERISTICAS',1,0,'C',1);
			$pdf->Cell(14,8, 'MARCA',1,0,'C',1);
			$pdf->Cell(19,8, 'MODELO',1,0,'C',1);
			$pdf->Cell(17,8, 'SERIE',1,0,'C',1);
			$pdf->Cell(10,8, 'COLOR',1,0,'C',1);
						$pdf->SetFont('Arial','B',4);
			$pdf->Cell(12,8, 'COSTO UNITARIO',1,0,'C',1);
			$pdf->SetFont('Arial','B',5);
			$pdf->Cell(8,8, 'IVA',1,0,'C',1);
			$pdf->SetFont('Arial','B',4);
			$pdf->Cell(11,8, 'COSTO TOTAL',1,0,'C',1);
						$pdf->SetFont('Arial','B',4.5);
			$pdf->Cell(12,8, utf8_decode('FACTURA N°'),1,0,'C',1);
			
			
			$pdf->Cell(12,4, 'ESTADO FISICO',1,1,'C',1);
			$pdf->SetX(191);
			$pdf->Cell(3,4, 'B',1,0,'C',1);
			$pdf->Cell(3,4, 'R',1,0,'C',1);
			$pdf->Cell(3,4, 'M',1,0,'C',1);
			$pdf->Cell(3,4, 'I',1,1,'C',1);
			
			
			$pdf->SetFillColor(255,255,255);
			$pdf->SetFont('Arial','B',5.5);
			
			$w = 20;
			$h = 8;
			
			$x = $pdf->GetX();
			$pdf->myCell($w,$h,$x,utf8_decode($row['clave_inventarial']));
			$x = $pdf->GetX();
			$pdf->myCell(29,$h,$x,utf8_decode($row['descripcion']));
			$x = $pdf->GetX();
			$pdf->myCell(29,$h,$x,utf8_decode($row['caracteristicas']));
			$x = $pdf->GetX();
			$pdf->myCell(14,$h,$x,utf8_decode($row['marca']));
			$x = $pdf->GetX();
			$pdf->myCell(19,$h,$x,utf8_decode($row['modelo']));
			$x = $pdf->GetX();
			$pdf->myCell(17,$h,$x,utf8_decode($row['serie']));
			$x = $pdf->GetX();
			$pdf->myCell(10,$h,$x,utf8_decode($row['color']));
			$x = $pdf->GetX();
			$pdf->myCell(12,$h,$x,utf8_decode($row['costo_unitario']));
			$x = $pdf->GetX();
			$pdf->myCell(8,$h,$x,utf8_decode($row['iva']));
			$x = $pdf->GetX();
			$pdf->myCell(11,$h,$x,utf8_decode($row['costo_total']));
			$x = $pdf->GetX();
			$pdf->myCell(12,$h,$x,utf8_decode($row['num_factura']));
			$x = $pdf->GetX();
			if($row['estado_fisico']=='BUENO'){
				$pdf->myCell(3,$h,$x,'X');
			} else{
				$pdf->myCell(3,$h,$x,'');
			}
			$x = $pdf->GetX();
			if($row['estado_fisico']=='REGULAR'){
				$pdf->myCell(3,$h,$x,'X');
			} else{
				$pdf->myCell(3,$h,$x,'');
			}
			$x = $pdf->GetX();
			if($row['estado_fisico']=='MALO'){
				$pdf->myCell(3,$h,$x,'X');
			} else{
				$pdf->myCell(3,$h,$x,'');
			}
			$x = $pdf->GetX();
			if($row['estado_fisico']=='INSERVIBLE'){
				$pdf->myCell(3,$h,$x,'X');
			} else{
				$pdf->myCell(3,$h,$x,'');
			}
			/*	
			
				$y = $pdf->GetY();
				$x = $pdf->GetX();
				$pdf->SetY($y+0);
			
			$pdf->Cell(18,4, '',1,0,'C',1);
			$pdf->Cell(30,4, utf8_decode(''),1,0,'C',1);
			$pdf->Cell(30,4, utf8_decode(''),1,0,'C',1);
			$pdf->Cell(14,4, '',1,0,'C',1);
			$pdf->Cell(19,4, '',1,0,'C',1);
			$pdf->Cell(18,4, '',1,0,'C',1);
			$pdf->Cell(10,4, '',1,0,'C',1);
			$pdf->Cell(10,4, '',1,0,'C',1);
			$pdf->Cell(8,4, '',1,0,'C',1);
			$pdf->Cell(11,4, '',1,0,'C',1);
			$pdf->Cell(12,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,1,'C',1);
			
							$y = $pdf->GetY();
				$x = $pdf->GetX();
				$pdf->SetY($y-1);
			
			$pdf->Cell(18,4, '',1,0,'C',1);
			$pdf->Cell(30,4, utf8_decode(''),1,0,'C',1);
			$pdf->Cell(30,4, utf8_decode(''),1,0,'C',1);
			$pdf->Cell(14,4, '',1,0,'C',1);
			$pdf->Cell(19,4, '',1,0,'C',1);
			$pdf->Cell(18,4, '',1,0,'C',1);
			$pdf->Cell(10,4, '',1,0,'C',1);
			$pdf->Cell(10,4, '',1,0,'C',1);
			$pdf->Cell(8,4, '',1,0,'C',1);
			$pdf->Cell(11,4, '',1,0,'C',1);
			$pdf->Cell(12,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,1,'C',1);
							$y = $pdf->GetY();
				$x = $pdf->GetX();
				$pdf->SetY($y-1);
			
			
			$pdf->Cell(18,4, '',1,0,'C',1);
			$pdf->Cell(30,4, utf8_decode(''),1,0,'C',1);
			$pdf->Cell(30,4, utf8_decode(''),1,0,'C',1);
			$pdf->Cell(14,4, '',1,0,'C',1);
			$pdf->Cell(19,4, '',1,0,'C',1);
			$pdf->Cell(18,4, '',1,0,'C',1);
			$pdf->Cell(10,4, '',1,0,'C',1);
			$pdf->Cell(10,4, '',1,0,'C',1);
			$pdf->Cell(8,4, '',1,0,'C',1);
			$pdf->Cell(11,4, '',1,0,'C',1);
			$pdf->Cell(12,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,0,'C',1);
			$pdf->Cell(3,4, '',1,1,'C',1);
			$pdf->Cell(4);
			$pdf->SetX(141);
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(27,5, 'TOTAL GENERAL:             $',0,0,'C',0);
			$pdf->Cell(20,5, utf8_decode($row['costo_total']),0,1,'L',0);
			
			*/
			
			$pdf->SetXY(10, 115);
			$pdf->SetFont('Arial','',7);
			$pdf->MultiCell(193,7, utf8_decode('OBSERVACION:  
			'),1,'L',0);
			$pdf->SetXY(31, 116);
			$pdf->Cell(170,5, utf8_decode($row['observaciones']),0,0,'L',1);
		
			$pdf->SetY(132);
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(193,25, '',1,1,'C',1);
				
				$pdf->SetXY(28, 136);
			$pdf->Cell(50,7, utf8_decode($row['personal']),0,0,'C',1);
				$pdf->SetXY(28, 147);
			$pdf->Cell(50,2, '___________________________________',0,0,'C',1);
				$pdf->SetXY(28, 150);
			$pdf->Cell(50,2, utf8_decode($row['puesto']),0,0,'C',1);
			
				$pdf->SetXY(130, 136);
			$pdf->Cell(50,7, utf8_decode($row['nom_completo']),0,0,'C',1);
				$pdf->SetXY(130, 147);
			$pdf->Cell(50,2, '_________________________________________',0,0,'C',1);
				$pdf->SetXY(130, 150);
			$pdf->Cell(50,2, 'RESPONSABLE DEL BIEN O USUARIO DIRECTO',0,0,'C',1);

			$pdf->SetY(158);
			$pdf->SetX(10);
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(40,4, 'B = BUENO',0,0,'L',1);
			$pdf->Cell(50,4, 'R = REGULAR',0,0,'C',1);
			$pdf->Cell(50,4, 'M =  MALO',0,0,'C',1);
			$pdf->Cell(45,4, 'I = INSERVIBLE',0,1,'C',1);

	$pdf->Output();

?>