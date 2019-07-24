<!DOCTYPE html>
<html>
<head>
	
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
      $bar =  $_GET['barrio'];
      $tipo =  $_GET['tipo'];
      $hab =  (int)$_GET['habitaciones'];
      $rang = (int) $_GET['rango'];
      if ( isset( $_SESSION['id'] ) ) 
      {
        $idpersona=$_SESSION['id'];
        $sql = 
        "
        SELECT P.id, PI.imagen,B.barrio,P.domicilio,P.precio,P.descripcion,T.tipo, P.numerodehabitaciones,U.nombre,U.apellido
        FROM publicaciones P 
        INNER JOIN tipo T on P.idtipo = T.id 
        INNER JOIN barrios B on P.idbarrio = B.id 
        LEFT JOIN publicacionesimagenes PI on P.id = PI.idpublicacion
        INNER JOIN usuarios U on P.idusuario = U.id
        WHERE T.tipo = '$tipo' and B.barrio = '$bar' and P.numerodehabitaciones = '$hab' and P.precio < '$rang' and $idpersona != P.idusuario 
        and P.id not in (SELECT idpublicacion FROM compras)"  ;
        $result=mysqli_query($conn,$sql);
      }
      else
      {
        $sql = 
        "
        SELECT  PI.imagen,B.barrio,P.domicilio,P.precio,P.descripcion,T.tipo, P.numerodehabitaciones,U.nombre,U.apellido
        FROM publicaciones P 
        INNER JOIN tipo T on P.idtipo = T.id 
        INNER JOIN barrios B on P.idbarrio = B.id 
        LEFT JOIN publicacionesimagenes PI on P.id = PI.idpublicacion
        INNER JOIN usuarios U on P.idusuario = U.id
        WHERE T.tipo = '$tipo' and B.barrio = '$bar' and P.numerodehabitaciones = '$hab' and P.precio < '$rang'
        and P.id not in (SELECT idpublicacion FROM compras)";
        $result=mysqli_query($conn,$sql);
      } 

      while ($row = $result->fetch_assoc()) {
      ?>
      <div class="">
        <div class="content" align="center">
          <h4>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4>
          
          <?php echo '<img style="width:500px" src="data:image/jpeg;base64,'.base64_encode( $row['imagen'] ). '" />';?>
          <h4><?php echo ("Barrio: ".$row["barrio"]);   ?></h4>
          <h4><?php echo ("Domicilio: ".$row["domicilio"]);   ?></h4>
          <h4><?php echo ("Propiedad: ".$row["tipo"]);   ?></h4>
          <h4><?php echo ("Habitaciones: ".$row["numerodehabitaciones"]);   ?></h4>
          <h4><?php echo ("Descripcion: ".$row["descripcion"]);   ?></h4>
          <h4><?php echo ("Precio: $".$row["precio"]);   ?></h4>  
          <h4><?php echo ("Publicado por: ". $row["nombre"].", ".$row["apellido"]);   ?></h4>

      <?php
      if ( isset( $_SESSION['id'] ) ) 
        {

        $d = $row["id"];
        $c= 'c'.$row["id"];
        $cancelar='can'.$row["id"];
        ?>
      <button id="<?php  echo $c ?>" onclick ="this.style.display='none' ; document.getElementById('<?php echo $d ?>').style.display='block'; document.getElementById('<?php echo $cancelar ?>').style.display='block'">Reservar</button>
      <form method="post" id="<?php  echo $d ?>" style="display: none" action="compra.php">
        <div> Esta seguro que desea reservar esta propiedad?</div>
        <button name="compra" value="<?php  echo $d ?>">Reservar</button>
        <div> o </div>
      </form>
      <button id="<?php  echo $cancelar ?>" style="display: none" onclick ="document.getElementById('<?php echo $d ?>').style.display='none';document.getElementById('<?php  echo $c ?>').style.display='block';this.style.display='none' ">Cancelar</button>
      
      <?php
      } 
      ?>
      </div>
    </div>
    <?php
    }
    ?>
</body>
</html>