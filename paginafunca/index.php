<!DOCTYPE html>
<html>
<head>
	<title>N&V Propiedades</title>
	<link rel="icon" type="image/gif/png" href="nvico.ico">
	<link rel="stylesheet" type="text/css" href="index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="idx.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 

</head>
<body>
<!-- Start Header Area -->
			
			<header  style="position: relative; top: -10px;">
				<?php
				session_start();
				$escribir="";
				if ( isset( $_SESSION['id'] ) ) 
				{
					$escribir="* Las publicaciones reservadas y/o publicadas por usted no apareceran en el siguiente listado.";
				?>
					<div class="topnav2">
  					<a class="active" href="index.php">Home</a>
  					<a href="vender.php">Publicar</a>
  					<div class="login-container">
    				<form action="/action_page.php">
      					
      					<p><a href="perfil.php" ><span><?php echo ("Hola, ". strtoupper ( $_SESSION['nombre']));?></span></a></p>
    				</form>
  					</div>
				</div>
				<img src="img/nvpro.png" id="logo">
				<?php					
				} 
				else 
				{
					$escribir="* Las publicaciones reservadas no apareceran en el siguiente listado.";
				?>

					<div class="topnav2">
  					<a class="active" href="index.php">Home</a>
  					<div class="login-container">
    				<form action="/action_page.php">
      					
      					<p><a href="login.php" >Iniciar sesión</a>
      					  	<a href="reg.php">Registrarse</a></p>
    				</form>
  					</div>
				</div>
				<img src="img/nvpro.png" id="logo">
				<?php
				}
				?>


				

			</header>
<!-- End Header Area -->

		<div class="search-field" >

				<div class="titulo" align="center">Buscar propiedades:</div>

				<div class="ubicacion" align="center">
					<select name="barrios"  id="barrios" class="select1">
						<option data-display="Choose locations" selected="" disabled="">Ubicacion</option>
									<option>Almagro</option>
									<option>Balvanera</option>
									<option>Barracas</option>
									<option>Belgrano</option>
									<option>Boedo</option>
									<option>Caballito</option>
									<option>Colegiales</option>
									<option>Constitución</option>
									<option>Flores</option>
									<option>Floresta</option>
									<option>La Boca</option>
									<option>La Paternal</option>
									<option>Liniers</option>
									<option>Mataderos</option>
									<option>Núñez</option>
									<option>Palermo</option>
									<option>Parque Avellaneda</option>
									<option>Parque Patricios</option>
									<option>Puerto Madero</option>
									<option>Recoleta</option>
									<option>Retiro</option>
									<option>Saavedra</option>
					</select>
				</div>

				<div class="tipo" align="center">
					<select name="tipos"  id="tipos"  class="select1" onchange="" >
						<option data-display="Property Type" selected="" disabled="">Tipo de Propiedad</option>
						<option value="casa">Casa</option>
						<option value="departamento">Departamento</option>
					</select>
				</div>

				<div class="habitaciones" align="center">
					<select name="habitaciones" id="habitaciones" class="select1" >
						<option data-display="Bedrooms" selected="" disabled="">Habitaciones</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
					</select>
				</div>

				<div class="range" id="precio" align="center" >
					<p>Valor Maximo: <span id="demo1">50000</span></p>
					<input type="range" id="range1" value="50000" name="range1" min="1" max="100000" class="rango" oninput="sl()" />
				</div>												    
				<div class="boton-busqueda" align="center" >
					<button onclick="buscar()" class="buscar" style="height: 55px;"><span class="txtbuscar">Buscar Propiedades</span></button>
				</div>
				<div id="txtHint" align="center"><?php echo $escribir ?></div>
		</div>

</body>
</html>