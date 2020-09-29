<?php
    session_start();
	require 'includes/conexion.php';
	
?>

<html>
	<head>
		<title>Secretaría De Contraloria Y Transparencia Gubernamental</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
		<style>
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
	</head>
	
	<body>
		<div class="container">
			<nav class='navbar navbar-default'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
							<span class='sr-only'>Men&uacute;</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
					</div>
					<div id='navbar' class='navbar-collapse collapse'>				
						<ul class='nav navbar-nav'>		
						<li class='active'><a href='welcome.php'>Inicio</a></li>			
						</ul>
						<img src="imagenes/guerrero.png" width="70" id="img1">				
						
							<ul class='nav navbar-nav'>
								<li><a href='nuevo.php'>INGRESAR INFORMACION</a></li>
								<li><a href='consulta.php'>CONSULTA DE BIENES</a> </li>
								<li><a href='bajas.php'>BAJAS</a> </li>
								<li><a href='cambios.php'>CAMBIOS DE RESGUARDOS</a> </li>
							</ul>
					</div>
				</div>
			</nav>	
			
			<div class="jumbotron" align="center">
				<h1> </h1>
			<img src="imagenes/secretaria.jpg" width="1000" id="img1">
				<br />
			</div>
		</div>
	</body>
</html>