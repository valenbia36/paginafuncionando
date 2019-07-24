<!DOCTYPE html>
<html>
<head>
	<title>Publicar</title>
	<link rel="stylesheet" type="text/css" href="vender.css">
  <script type="text/javascript" src="vender.js"></script>
</head>
<body>
        <?php
        session_start();
        $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nv_prop";
    $idForm= $_SESSION['id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
    { 
   
    $tipoForm=$_POST['tipo'];
    $barrioForm=$_POST['barrio'];
    $domicilioForm=$_POST['domicilio'];
    $habForm=$_POST['hab'];
    $precioForm=$_POST['precio'];
    $descripcionForm=$_POST['publicinfo'];
    $file = addslashes(file_get_contents($_FILES["upd"]["tmp_name"]));
    $sql = "INSERT INTO publicaciones (idtipo,idbarrio,domicilio,numerodehabitaciones,precio,descripcion,idusuario) VALUES ('$tipoForm','$barrioForm','$domicilioForm','$habForm','$precioForm','$descripcionForm', '$idForm' )";
    $conn->query($sql);
    $idpublicacion= $conn->insert_id;
    $sql2 = "INSERT INTO publicacionesimagenes (imagen,idpublicacion) VALUES ('$file','$idpublicacion' )";
    $conn->query($sql2);
    header ('Location: publicada.php');
    

    }
     $conn->close();

        if ( isset( $_SESSION['id'] ) ) 
        {
        ?>
          <div class="topnav2">
            <a  href="index.php">Home</a>
            <a class="active" href="vender.php">Publicar</a>
            <div class="login-container">
            <form action="/action_page.php">
                <p><a href="perfil.php" ><span><?php echo ("Hola, ". strtoupper ( $_SESSION['nombre']));?></span></a></p>
            </form>
            </div>
        </div>
        <img id="logo1" src="img/nvpro.png">

<div class="container">
	<div class="row">

		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-">
		                    <h4>Mi Publicacion</h4>
		                    <hr>
                    <form method="post" enctype="multipart/form-data">
		                <div class="contim">
	                        <img src="img/noim.png" id="img1">
	                    </div>
	                  	<div class="contupd">
	                  		<input type="file" id="upd1" name="upd" class="file" onchange="showimage(this)">
		                
		            </div>
                
		            <div class="row">
		                  <div class="col-md-12">
		                    
                              <div class="form-group row">
                                <label for="type" class="col-4 col-form-label">Tipo</label> 
                                <div class="col-8">
                                  <select id="tipo" name="tipo">
                                  	<option value="1">Casa</option>
                                  	<option value="2">Departamento</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="barrio" class="col-4 col-form-label">Barrio</label> 
                                <div class="col-8">
                                  <select id="barrio" name="barrio">
									                   <option value="1">Almagro</option>
                                    <option value="2">Balvanera</option>
                                    <option value="3">Barracas</option>
                                    <option value="4">Belgrano</option>
                                    <option value="5">Boedo</option>
                                    <option value="6">Caballito</option>
                                    <option value="7">Colegiales</option>
                                    <option value="8">Constitución</option>
                                    <option value="9">Flores</option>
                                    <option value="10">Floresta</option>
                                    <option value="11">La Boca</option>
                                    <option value="12">La Paternal</option>
                                    <option value="13">Liniers</option>
                                    <option value="14">Mataderos</option>
                                    <option value="15">Núñez</option>
                                    <option value="16" >Palermo</option>
                                    <option value="17">Parque Avellaneda</option>
                                    <option value="18" >Parque Patricios</option>
                                    <option value="19">Puerto Madero</option>
                                    <option value="20">Recoleta</option>
                                    <option value="21">Retiro</option>
                                    <option value="22">Saavedra</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastna" class="col-4 col-form-label">Domicilio</label> 
                                <div class="col-8">
                                  <input id="domicilio" name="domicilio" placeholder="Domicilio" class="form-control here" type="text" onkeyup="domi(this)">
                                </div>
                              </div>
                              <div class="form-group row">
                               		<label for="habt" class="col-4 col-form-label">Numero de Habitaciones</label> 
                               		<div class="col-8">
                                  		<select id="hab" name="hab">
                                  			<option>1</option>
                                  			<option>2</option>
                                  			<option>3</option>
                                  			<option>4</option>
                                  			<option>5</option>
                                  			<option>6</option>
                                  		</select>
                                  	</div>
                              </div>

                              
                              <div class="form-group row" class="price">
                                <label for="price" class="col-4 col-form-label">Precio (Menor a 100.000)</label> 
                                <div class="col-8">
                                  <input id="precio" name="precio" placeholder="Precio" class="form-control here" type="text" onkeyup="pre(this)" maxlength="6">
                                </div>
                              </div>
              
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label" >Descripción</label> 
                                <div class="col-8">
                                  <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control" onkeyup="descripcion(this)"></textarea>
                                </div>
                              </div>

                               
                              <div class="form-group row">
                                <div class="col-8">
                                  <button name="submit" type="submit" class="act"  id="publicar" disabled>Publicar</button>
                                </div>
                              </div>
                          </form>
                      </div>
		            </div>
	<div id="info">
		<h2 id="titulo">  Aviso</h2>
		<h3 id="aviso">
			Para publicar una propiedad, deben estar todos los campos llenos y la imagen cargada.
 		</h3>
	</div>
    <?php

  }
 
  ?>

</body>
</html>