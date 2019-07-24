<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="perfil.css">

</head>
<body>
	<?php
	session_start();

	if ( isset( $_SESSION['id'] ) ) 
	{

	?>
  <header class="default-header">
        

        <div class="topnav2">
            <a class="" href="index.php">Home</a>
            <a href="vender.php">Publicar</a>
            <img src="img/nvpro.png" id="logo">
        </div>
        

      </header>
    <div class="overlay">  
      <div class="container">
        <p class="txtinfo">Nombre:     <span><?php echo ( strtoupper ( $_SESSION['nombre']));?></span> </p>
        <p class="txtinfo">Apellido:     <span><?php echo ( strtoupper ( $_SESSION['apellido']));?></span> </p>
        <p class="txtinfo">Email:     <span><?php echo ( $_SESSION['mail']);?></span> </p>
        <p class="txtinfo">Nro. de Telefono:     <span><?php echo (  $_SESSION['telefono']);?></span> </p>
      </div>
      <ul class="sett">
        <li class="active"><a class="opc" href="perfil.php">Mi Perfil.</a></li>
        <li><a class="opc" href="mispublicaciones.php">Mis Publicaciones.</a></li>
        <li><a class="opc" href="compradas.php">Mis Reservas.</a></li>
        <li><a class="opc" id="logout" href="logout.php"> Cerrar sesión. </a></li>
      </ul>
    </div>
    <img src="img/back.jpg" id="back">
      <footer>
        <div class="social">
          <h6 class="folow">Seguinos en las Redes</h6>
                <div class="footer-social">
                  <a href=""><img id="fb" src="img/facebook.png"></a>
                  <a href=""><img id="insta" src="img/instagram.png"></a>
                  <a href=""><img src="img/pinterest.png" id="pint"></a>
                  <a href=""><img src="img/twitter.png" id="twitter"></a>
                </div>
        </div>
      </footer>
     <?php
     } 
	?>
</body>
</html>