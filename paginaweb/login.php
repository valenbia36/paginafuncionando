<!DOCTYPE html>
<html>
<head>
	<link type="text/css" href="login.css" rel="stylesheet">
	<link rel="icon" type="image/gif/png" href="nvico.ico">
	<title>N&V Propiedades</title>
</head>

<body onkeypress="PCWin(event)" onload="pageLoad()">
	<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nv_prop";
    $valor="";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
    	$mailForm = $_POST['mail'];
    	$passForm=$_POST['pass'];
    	$sql = "SELECT * FROM usuarios WHERE  (email='$mailForm')" ;
    	$result = $conn->query($sql);
    	$array=$result->fetch_assoc();
    	if ($result->num_rows > 0 and password_verify($passForm, $array['contrasenia']) )
		{	
       		
			
			$_SESSION['id']= $array['id'];
			$_SESSION['nombre']= $array['nombre'];
			$_SESSION['apellido']= $array['apellido'];
			$_SESSION['mail']= $array['email'];
			$_SESSION['telefono']= $array['nrotelefono'];

			header('Location: index.php');
    	} 
    	else 
    	{
	
			$valor="La contraseña o el mail son incorrectos.";

		}
		}
	$conn->close();
	?>
	<div id="top-wrapper">
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
					<ul>
						<img src="img/nvpro.png" id="logo">
						<li id="unLi" class="unLi"><input class="text" id="mail"  name="mail" type="text" maxlength="25" placeholder="E-mail" /></li>
						<li class="blank"></li>
						<li id="pwLi" class="pwLi"><input class="text" id="pass" name="pass" type="password" maxlength="25" placeholder="Contraseña" ><span class="error" style="color:red"><?php echo $valor;?></span></li>
						<li></li>
					</ul>
					<input type="submit" value="Iniciar sesión" id="iniciar" />
				<div>
				<a id="copyright" href="reg.php">Si no está registrado, registresé clickeando este link</a>
				</div>
			</div>
		</div>
		</form>
	</div>
	</div>
	
	<form action="/userRpm/LoginRpm.htm" method="get" id="loginForm" enctype="multipart/form-data">
	    <input type="hidden" value="Save" name="Save" />    
	</form>



</body>
</html>