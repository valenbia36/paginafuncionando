<!DOCTYPE html>
<html>
<head>
	<link type="text/css" href="registro.css" rel="stylesheet">
	<link rel="icon" type="image/gif/png" href="nvico.ico">
	<script type="text/javascript" src="validaciones.js"></script>
	<title>login</title>
</head>
<body onkeypress="PCWin(event)" onload="pageLoad()">
	<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nv_prop";
    $valormail="";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
    	$mailForm = $_POST['mail'];
    	$sql = "SELECT 1 FROM usuarios WHERE email='$mailForm'";
    	$result = $conn->query($sql);

    	if ($result->num_rows > 0 )
		{	
       	$valormail="*".$mailForm . " esta en uso.";
    	} 
    	else 
    	{
		$passForm=$_POST['password'];
		$pass = password_hash($passForm, PASSWORD_DEFAULT);
		$nombreForm=$_POST['nombre'];
		$apellidoForm=$_POST['apellido'];
		$telForm=$_POST['telefono'];
		$sql2 = "INSERT INTO usuarios (contrasenia,nombre,apellido,nrotelefono,email) VALUES ('$pass','$nombreForm','$apellidoForm','$telForm','$mailForm')";
		$conn->query($sql2);
		header('Location: login.php');

		}
	}
	$conn->close();
	?>
	<div id="top-wrapper" >
		<div id="banner" class="top-header">
			<div class="top-header-wrap">
				<h1 id="product-tag"></h1>
			</div>
		</div>
	<div class="loginBox">
			<div id="noteDiv">
				<p id="note"></p>
		</div>
	<form  method="post" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		<div class="panelThre" align="center">
			<div align="center" class="picDiv" align="center">
				<ul style="padding-top: 0px;">
					<img src="img/nvpro.png" id="logo">
					<li id="pwLi" class="pwLi"><input class="text" id="mail" type="text" maxlength="30" placeholder="E-mail"  name="mail" onkeyup="validaMail(this)" /></li>
					<span class="error" style="display:none;color:red" id="mailinvalido">*Mail invalido.</span>
					<span class="error" style="color:red"><?php echo $valormail;?></span>
					<li class="blank"></li>
					<li id="pwLi" class="pwLi"><input class="text" id="password" type="password" name="password"  placeholder="Contraseña" onkeyup="contrasenia(this)" /></li>
					<li class="blank"></li>
					<li id="pwLi" class="pwLi"><input class="text" id="password2" type="password" name="password2"  placeholder="Confirme contraseña" onkeyup="validacontrasenia(this)" /></li>
					<span class="error" style="display:none;color:red" id="contraseniainvalida">*Las contraseñas no coinciden.</span>
					<li class="blank"></li>
					<li id="pwLi" class="pwLi"><input class="text" id="nombre" type="text" name="nombre"  maxlength="25" placeholder="Nombre" onkeyup="validanombre(this)"/></li>
					<li class="blank"></li>
					<li id="pwLi" class="pwLi"><input class="text" id="apellido" type="text" name="apellido"  maxlength="25" placeholder="Apellido" onkeyup="validaapellido(this)" /></li>
					<li class="blank"></li>
					<li id="pwLi" class="pwLi"><input class="text" id="telefono" type="text" name="telefono"  maxlength="15" placeholder="Numero de Telefono" onkeyup="validatel(this)"/></li>
					<span class="error" style="display:none;color:red" id="telinvalido">*Telefono invalido (minimo 8 digitos).</span>
					<li class="blank"></li>
				</ul>
					<input type="submit" value="Registrarse" id="registrarse" onclick="validacionTotal()" disabled/>
				<a id="copyright" href="login.php"> Iniciá sesión aquí</a>
				</div>
			</div>
		</div>  
	</form>
	</div>
	</div>
</body>
</html>