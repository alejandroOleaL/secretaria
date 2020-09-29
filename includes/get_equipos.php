<?php

	require('../conexion.php');
	
	$id_resguardo = $_POST['id_resguardo'];
	
	$queryM = "SELECT id_equipo FROM resguardos_equipos WHERE id_resguardo = '$id_resguardo'";
	$resultadoM = $mysqli->query($queryM);
		
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_equipo']."'>".$rowM['id_equipo']."</option>";
	}
	
	echo $html;


?>