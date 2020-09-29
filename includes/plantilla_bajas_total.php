<?php

	require 'fpdf/fpdf.php';
	
	require 'includes/conexion.php';
	
	$id = $_GET['id'];
	
	/*
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
	$puesto = 'Delegada Administrativa';
	$fecha_asig = $row2['fecha_asig'];*/
	
	class PDF extends FPDF
	{
		function Header()
		{
			global $fecha_asig;
			$this->Image('imagenes/guerrero.png', 250,7, 25);
			$this->Image('imagenes/escudo.png', 3,7, 45);
			$this->SetFont('Arial','',10);
			$this->Cell(280,7, 'SECRETARIA DE FINANZAS Y ADMINISTRACION',0,1,'C');
			$this->Cell(280,7, 'SUBSECRETARIA DE ADMINISTRACION',0,1,'C');
			$this->SetFont('Arial','',9);
			$this->Cell(280,7, 'DIRECCION GENERAL DE CONTROL PATRIMONIAL',0,1,'C');
			$this->SetFont('Arial','',10);
			$this->Cell(280,7, 'DICTAMEN DE NO UTILIDAD Y DISPOSICION FINAL DE BIENES MUEBLES EN GENERAL',0,1,'C');
			
			$this->SetX(2);
			$this->SetFont('Arial','',7);
			$this->Cell(20,7, 'DEPENDENCIA:',0,0,'R');
			$this->SetFont('Arial','B',8);
			$this->Cell(180,7, utf8_decode ('SECRETARIA DE CONTRALORIA Y TRANSPARENCIA GUBERNAMENTAL'),0,0,'L');
			$this->Cell(10,7, 'FECHA:',0,0,'C');
			$this->Cell(20,7, utf8_decode('fecha'),0,1,'C');
		}
		
		function myCell($w,$h,$x,$t){
			$height = $h/3;
			$first = $height+2;
			$second = $height+$height+$height+3;
			$len = strlen($t);
			if($len>15){
				$txt = str_split($t,15);
				$this->SetX($x);
				$this->Cell($w,$first,$txt[0],'','','');
				$this->SetX($x);
				$this->Cell($w,$second,$txt[1],'','','');
				$this->SetX($x);
				$this->Cell($w,$h,'','LTRB',0,'L',0);
			}else{
				$this->SetX($x);
				$this->Cell($w,$h,$t,'LTRB',0,'L',0);			
				}
			}
		
		function Footer()
		{
			$this->SetY(-50);
			$this->SetX(2);
			//global $personal, $puesto;
			$this->SetFont('Arial','',7);
			$this->Cell(85,5, utf8_decode ('ELABORÓ'),0,0,'C',0);
			$this->Cell(100,5, utf8_decode ('Vo. Bo.'),0,0,'C',0);
			$this->Cell(105,5, utf8_decode ('AUTORIZÓ'),0,1,'C',0);
			$this->SetX(200);
			$this->Cell(75,15, utf8_decode('personal'),0,1,'C',0);
						$this->SetXY(170,-35);
						$this->SetX(2);
			$this->Cell(85,5, utf8_decode ('__________________________________________________'),0,0,'C',0);
			$this->Cell(105,5, utf8_decode ('__________________________________________________________'),0,0,'C',0);
			$this->Cell(90,5, utf8_decode ('__________________________________________________'),0,1,'C',0);
			$this->SetFont('Arial','',7);
			$this->SetX(3);
			$this->MultiCell(80,5, utf8_decode('NOMBRE Y FIRMA DEL "ENLACE" DE BIENES MUEBLES, RESPONSABLE DEL INVENTARIO'),0,'C',0);
			$this->SetXY(90,-30);
			$this->MultiCell(100,5, utf8_decode('NOMBRE Y FIRMA DEL RESPONSABLE DE RECURSOS MATERIALES'),0,'C',0);
			$this->SetXY(190,-30);			
			$this->MultiCell(100,5, utf8_decode('puesto'),0,'C',0);
		}
		
	}

?>