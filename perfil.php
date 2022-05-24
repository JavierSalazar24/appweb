<?php


session_start();

include "conectar_utd.php";


if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){


  if(isset($_SESSION['admin'])){

    $user = $_SESSION['admin'];

  }elseif (isset($_SESSION['estandar'])) {
    
    $user = $_SESSION['estandar'];

  }

  $select = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

    while($datos = mysqli_fetch_array($select)){

      $usuario = $datos['username'];

    }

  $select = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

  while($datos = mysqli_fetch_array($select)){

    $username = $datos['username'];
    $privilegio = $datos['privilegio'];
  }



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <title>Perfil</title>
</head>
<body>
<div class="contenedor-principal">
    <div class="contenedor-medio-portal2">

        <div class="div-img-perfil">
            <div class="div-img-portal-perfil">
              <img class="imagen-portal-perfil" src="img/logo-utd.png" alt="" whidth="75%" height="75%"> 
            </div>
            <h3 class="titulo-perfil"> Perfil </h3>
            <div class="div-img-portal">
            </div>
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
        <div class="div-img-perfil">
        <img class="imagen-portal-user" src="img/img_usuario.png" width="25%" height="25%">
        </div>    
          <div class="formulario">
            <div class="div-formulario">
              <label class="label-insert-edit">
                <span class="span-insert-edit">Usuario <i class="fas fa-user-secret"></i></span>
                <input class="input-insert-form" type="text" value="<?php echo $username ?>" >
              </label> 
            </div>
            <div class="div-formulario">
              <label class="label-insert-edit">
                <span class="span-insert-edit">Privilegio <i class="fas fa-id-badge"></i></span>
                <input class="input-insert-form" type="text" value="<?php echo $privilegio ?>" >
              </label>
            </div>
          </div>

          <div class="boton-volver">
                <a class="boton-ancla-volver" href="menu.php"><i class="fas fa-chevron-left"></i> Volver</a>
            </div>
        </div>
          
    </div>
    <div class="contenedor-medio-index">

        <div class="contenedor-img-portal">
            <h3 class="titulo2"> Perfil </h3>
            <div class="div-img-portal2">
              <img class="imagen-portal2" src="./img/logo-utd.png" alt="" whidth="75%" height="75%"> 
            </div>
          </div>
      
          <div class="div-menu">
              <nav class="nav-menu">
                <ul class="ul-menu">
                  <li class="li-menu"><a class="ancla-menu" href="menu.php"><i class="fas fa-home"></i> Inicio</a></li>
                  <li class="li-menu sin-borde"><a class="ancla-menu" href="#"><i class="far fa-user-circle"></i> <?php echo $user ?></a>
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
        <div class="div-img-perfil">
        <img class="imagen-portal-user" src="img/img_usuario.png" width="25%" height="25%">
        </div> 
          <div class="formulario">
            <div class="div-formulario">
              <label class="label-insert-edit">
                <span class="span-insert-edit">Usuario <i class="fas fa-user-secret"></i></span>
                <input class="input-insert-form" type="text" value="<?php echo $username ?>">
              </label> 
            </div>
            <div class="div-formulario">
              <label class="label-insert-edit">
                <span class="span-insert-edit">Privilegio <i class="fas fa-id-badge"></i></span>
                <input class="input-insert-form" type="text"  value="<?php echo $privilegio ?>" >
              </label>
            </div>
          </div>

            <div class="boton-volver">
                <a class="boton-ancla-volver" href="menu.php"><i class="fas fa-chevron-left"></i> Volver</a>
            </div>
        </div>
          
    </div>
  </div>
    <!-- Javascript para el formulario-->
    <script type="text/javascript" src="js/formulario.js"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    </body>
</html>

<?php

}elseif(!isset($_SESSION['admin'])||!isset($_SESSION['estandar'])){
    header("Location: index.php");
   }

?>