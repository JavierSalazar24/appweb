<?php

session_start();
  
if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){


  include "conectar_utd.php";

  if(isset($_SESSION['admin'])){

    $user = $_SESSION['admin'];

    

  }elseif (isset($_SESSION['estandar'])) {
    
    $user = $_SESSION['estandar'];

    

  }

  $select = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

    while($datos = mysqli_fetch_array($select)){

      $usuario = $datos['username'];

    }

?>

<!DOCTYPE html>
    <html>  
      <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="shortcut icon" href="img/favicon.jpg" />

        <title>Menú</title>
      </head>
      <body>
        <div class="contenedor-principal">
            <div class="contenedor-img">
            <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
            <h1 class="titulos-principales">Menú</h1>
              <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
              <h1 class="titulos-principales2">Menú</h1>
            </div>
            <div class="div-menu">
              <nav class="nav-menu">
                <ul class="ul-menu">
                  <li class="li-menu"><a class="ancla-menu" href="menu.php"><i class="fas fa-home"></i> Inicio</a></li>
                  <li class="li-menu sin-borde"><a class="ancla-menu" href="#"><i class="far fa-user-circle"></i> <?php echo $usuario ?></a>
                    <ul class="ul-desplegable-menu">
                      <li class="li-desplegable-menu">
                        <a class="ancla-desplegable-menu" href="perfil.php"><i class="fas fa-glasses"></i> Perfil</a>
                      </li>
                      <li class="li-desplegable-menu">
                        <a class="ancla-desplegable-menu" href="cerrar_sesion.php"><i class="fas fa-power-off"></i> Cerra Sesión</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          <div class="contenedor-medio1">
            <h3 class="subtitulos">Elija una opción para realizar el ABCM</h3>
              <div class="btns">
                <div class="btn-menu"><a class="boton-ancla" href="alumnos.php">Alumnos</a></div>
                <div class="btn-menu"><a class="boton-ancla" href="contactos.php">Contáctos</a></div>
                <div class="btn-menu"><a class="boton-ancla" href="usuarios.php">Usuarios</a></div>

                  
              </div>
          </div>
        </div>
        <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
      </body>
   </html>

   <?php

   }elseif(!isset($_SESSION['admin'])||!isset($_SESSION['estandar'])){
    header("Location: index.php");
   }