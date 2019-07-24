<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
   <?php
   session_start();
      $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nv_prop";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) 
        {
          die("Connection failed: " . $conn->connect_error);
        }

      if ( isset( $_SESSION['id'] ) ) 
      {
        ?>
        <header  style="position: relative; top: -10px;">
        <div class="topnav2">
            <a  href="index.php">Home</a>
            <a href="vender.php">Publicar</a>
            <div class="login-container">
            <form action="/action_page.php">
                
                <p><a href="perfil.php" ><span><?php echo ("Hola, ". strtoupper ( $_SESSION['nombre']));?></span></a></p>
            </form>
            </div>
        </div>
        <img src="img/nvpro.png" id="logo">
        </header>
      <?php
        $idpersona = $_SESSION['id'];
        $sql = 
        "
        SELECT  PI.idpublicacion,PI.imagen,B.barrio,P.domicilio,P.precio,P.descripcion,T.tipo, P.numerodehabitaciones
        FROM publicaciones P 
        INNER JOIN tipo T on P.idtipo = T.id 
        INNER JOIN barrios B on P.idbarrio = B.id 
        LEFT JOIN publicacionesimagenes PI on P.id = PI.idpublicacion
        WHERE P.idusuario = $idpersona
        "  ;
        $result=mysqli_query($conn,$sql);
      	}
      ?>
        <div class="search-field" >
        <?php
        if ($result->num_rows > 0) 
        {
        ?>
          <h1 align="center"> MIS PUBLICACIONES</h1>
        <?php  
        while ($row = $result->fetch_assoc()) 
        {
        $pid= $row["idpublicacion"];
        $sql2="SELECT idpublicacion from compras where idpublicacion='$pid'";
        $result2=mysqli_query($conn,$sql2);
        	if ($result2->num_rows > 0) 
        	{ 
      		$estado="Reservada.";
      		}
      	else
      		{ 
      		$estado="No reservada.";
      		}
        ?>
    <div class="">
      <div class="content" align="center">
      <h4>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4>
      
      <?php echo '<img style="width:500px" src="data:image/jpeg;base64,'.base64_encode( $row['imagen'] ). '" />';?>
      <h4><?php echo ("Barrio: ".$row["barrio"]);   ?></h4>
      <h4 ><?php echo ("Domicilio: ".$row["domicilio"]);   ?></h4>
      <h4 ><?php echo ("Propiedad: ".$row["tipo"]);   ?></h4>
      <h4 ><?php echo ("Habitaciones: ".$row["numerodehabitaciones"]);   ?></h4>
      <h4 ><?php echo ("Descripcion: ".$row["descripcion"]);   ?></h4>
      <h4 ><?php echo ("Precio: $".$row["precio"]);   ?></h4>
      <h4><?php echo ("Estado: ".$estado);   ?> </h4>
      </div>
    </div>
      <?php
        }
        }
      else 
        {
        ?> 
          <h1 align="center"> NO HA REALIZADO NINGUNA PUBLICACION AUN.</h1>
        <?php
        }
        ?>
    </div>
      </body>
      </html>
