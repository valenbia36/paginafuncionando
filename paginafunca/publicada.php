<!DOCTYPE html>
<html>
<head>
    <title>N&V Propiedades</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 

</head>
<body>
    <header  style="position: relative; top: -10px;">
<?php

   session_start();
   if ( isset( $_SESSION['id'] ) ) 
        {
        ?>
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
        <div class="search-field" >

                <div class="titulo" align="center">GRACIAS POR LA PUBLICACION:</div>

                <div class="ubicacion" align="center">
                    
                    <div>
                     <h4> 
                     La informacion de la publicacion se le enviara al mail. 
                        </h4>
                    </div>
                    
                </div>

                <div class="tipo" align="center">
                    <div>
                        <h4> 
                        Para volver a publicar dirigase a "PUBLICAR".
                        Para volver al menu dirigase a "HOME".
                        </h4>
                    </div>
                </div>

                <div class="habitaciones" align="center">
                    <div>
                        <h4>
                        Para ver sus publicaciones dirigase a su perfil y seleccione "Mis Publicaciones".
                        </h4>
                    </div>
                </div>

                                          
                
        </div>
        <?php
        }
        ?>
    </body>
    </html>