<?php

session_start();
  
if(!isset($_SESSION['admin'])){

  header("Location: index.php");

}

$select = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

    while($datos = mysqli_fetch_array($select)){

      $usuario = $datos['username'];

    }

include "conectar_utd.php";

if(!empty($_REQUEST['1'])){



    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $especialidad = $_POST['espec'];
    
        $insert_alumno = mysqli_query($conexion, "INSERT INTO alumnos VALUES ('$matricula','$nombre','$especialidad')");
    
        if($insert_alumno){
    
            echo "<script> alert( 'El Alumno Ha Sido Insertado Con Exito' ) </script>";
            echo "<script> location.href='insertar.php?1=1' </script>";
        
        }else{
    
            echo "<script> alert( 'Ocurrio Un Error' ) </script>";
            echo "<script> location.href='insertar.php?1=1' </script>";
        
        }
    
    }
    
    
    ?>
    
    
<!DOCTYPE html>
  <html>  
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <title>Registro Alumno</title>
  </head>
  <body>
    <div class="contenedor-principal">
      <div class="contenedor-img">
        <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
        <h1 class="titulos-principales">Insertar Alumnos</h1>
        <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
        <h1 class="titulos-principales2">Insertar Alumnos</h1>
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="formulario">
            <div class="center">
              <div class="div-formulario">
                <label class="label-insert-form">
                  <span class="span-insert-form">Matricula <i class="fas fa-address-card"></i></span>
                 <input class="input-insert-form" type="text" name="matricula" required>
                </label>
              </div>

              <div class="div-formulario">
                <label class="label-insert-form">
                  <span class="span-insert-form">Nombre <i class="fas fa-sort-alpha-up"></i></span>
                  <input class="input-insert-form" type="text" name="nombre" required>
                </label>
              </div>
    
              <div class="div-formulario">
                <label class="label-insert-form">
                  <span class="span-insert-form">Especialidad <i class="fas fa-graduation-cap"></i></span>
                  <input class="input-insert-form" type="text" name="espec" required>
                </label>
              </div>
            </div>
          </div>

          <div class="div-btn-inputs">
              <a class="boton-ancla-imput"><i class="fas fa-folder-plus"></i><input class="boton-imput" name="1" type="submit" value="Agregar"></a>
              <a class="boton-ancla-imput"><i class="fas fa-backspace"></i></i><input class="boton-imput" type="reset" value="Borrar"></a>
          </div>                               

        </form>
                    
        <div class="boton-volver">
          <a class=" boton-ancla-volver" href="alumnos.php"><i class="fas fa-chevron-left"></i> Volver</a>
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

}elseif(!empty($_REQUEST['2'])){

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $email=$_POST['email'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
      
          $insert_contacto = mysqli_query($conexion, "INSERT INTO contactos VALUES (null, '$nombre', '$apellidos', '$email', '$direccion', '$telefono')");
      
          if($insert_contacto){
      
              echo "<script> alert( 'El Contacto Ha Sido Insertado Con Exito' ) </script>";
              echo "<script> location.href='insertar.php?2=2' </script>";
          
          }else{
      
              echo "<script> alert( 'Ocurrio Un Error' ) </script>";
              echo "<script> location.href='insertar.php?2=2' </script>";
          
          }
      
      }
      
      
      ?>
      
      
      <!DOCTYPE html>
          <html>  
            <head>
              <meta charset="utf-8"> 
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href="css/estilos.css">
              <link rel="shortcut icon" href="img/favicon.jpg" />

              <title>Registro Contacto</title>
              </head>
              <body>
                <div class="contenedor-principal">
                <div class="contenedor-img">
                  <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
                  <h1 class="titulos-principales">Insertar Contáctos</h1>
                  <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
                  <h1 class="titulos-principales2">Insertar Contáctos</h1>
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
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="contenedor-medio1">
                    <div class="formulario">
                      
                      <div class="div-formulario">
                        <label class="label-insert-form">
                          <span class="span-insert-form">Nombre <i class="fas fa-sort-alpha-up"></i></span>
                          <input class="input-insert-form" type="text" name="nombre" required>
                      </label>
                      </div>
                        
                      <div class="div-formulario">
                        <label class="label-insert-form">
                          <span class="span-insert-form">Apellidos <i class="fas fa-sort-alpha-down"></i></span>
                          <input class="input-insert-form" type="text" name="apellidos" required>
                        </label>
                      </div>
      
                      <div class="div-formulario">
                        <label class="label-insert-form">
                          <span class="span-insert-form">Direccion <i class="fas fa-map-marked-alt"></i></span>
                          <input class="input-insert-form"  type="text" name="direccion" required>
                        </label>
                      </div>
      
                      <div class="div-formulario">
                        <label class="label-insert-form">
                          <span class="span-insert-form">Telefono <i class="fas fa-mobile"></i></span>
                          <input class="input-insert-form" type="text" name="telefono" required>
                        </label>
                      </div>
                    
                      <div class="div-formulario">
                        <labe class="label-insert-form"l>
                          <span class="span-insert-form">Correo <i class="fas fa-envelope"></i></span>
                          <input class="input-insert-form" type="text" name="email" required>
                        </labe>
                      </div>
                          
                    </div>

                    <div class="div-btn-inputs">
                        <a class="boton-ancla-imput"><i class="fas fa-folder-plus"></i><input class="boton-imput" name="2" type="submit" value="Agregar"></a>
                        <a class="boton-ancla-imput"><i class="fas fa-backspace"></i></i><input class="boton-imput" type="reset" value="Borrar"></a>
                    </div>     
                        
                
                    <div class="boton-volver">
                      <a class="boton-ancla-volver" href="contactos.php"><i class="fas fa-chevron-left"></i> Volver</a>
                    </div>
                  </div>
                </form>
                  </div>
                  <!-- Javascript para el formulario-->
            <script type="text/javascript" src="js/formulario.js"></script>
            <!-- fontawesome -->
            <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
              </body>
          </html>

    <?php

        }elseif(!empty($_REQUEST['3'])){

            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $usuario=$_POST['usuario'];
                  $contraseña=$_POST['contraseña'];
                  $privilegio=$_POST['priv'];
              
                  $insert_usuario = mysqli_query($conexion, "INSERT INTO usuarios VALUES ('$usuario', '$contraseña', '$privilegio')");
              
                  if($insert_usuario){
              
                      echo "<script> alert( ' El Usuario Ha Sido Insertado Con Exito' ) </script>";
                      echo "<script> location.href='insertar.php?3=3' </script>";
                  
                  }else{
              
                      echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                      echo "<script> location.href='insertar.php?3=3' </script>";
                  
                  }
              
              }
              
              
              ?>
              
              
              <!DOCTYPE html>
                  <html>  
                    <head>
                      <meta charset="utf-8"> 
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <link rel="stylesheet" href="css/estilos.css">
                      <link rel="shortcut icon" href="img/favicon.jpg" />

                      <title>Registro Usuario</title>
                    </head>
                    <body>
                     <div class="contenedor-principal">
                      <div class="contenedor-img">
                        <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
                        <h1 class="titulos-principales">Insertar Usuarios</h1>
                        <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
                        <h1 class="titulos-principales2">Insertar Usuarios</h1>
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
                      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">                        
                        <div class="contenedor-medio1">
                          <div class="formulario">
              
                            <div class="div-formulario">
                              <label class="label-insert-form">
                                <span class="span-insert-form">Usuario <i class="fas fa-user-secret"></i></span>
                                <input class="input-insert-form" type="text" name="usuario" required>
                              </label>
                            </div>
              
                            <div class="div-formulario">
                              <label class="label-insert-form">
                                <span class="span-insert-form">Contraseña <i class="fas fa-user-lock"></i></span>
                                <input class="input-insert-form" type="password" name="contraseña" required>
                              </label>
                            </div>
              
                            <div class="div-formulario">
                              <label class="label-insert-edit">
                                <span class="span-insert-edit">Privilegio <i class="fas fa-id-badge"></i></span>
                                  <select class="input-insert-form" name="priv" required>
                                    <option value="admin">Admin</option> 
                                    <option value="estandar">Estandar</option> 
                                  </select>
                              </label>
                            </div>
                                
                            
                          </div>
                          <input type="hidden" name="tab" value="<?php echo $tab; ?>">
                          <div class="div-btn-inputs">
                            <a class="boton-ancla-imput"><i class="fas fa-folder-plus"></i><input class="boton-imput" name="3" type="submit" value="Agregar"></a>
                            <a class="boton-ancla-imput"><i class="fas fa-backspace"></i></i><input class="boton-imput" type="reset" value="Borrar"></a>
                          </div>
                        </form>
                          <div class="boton-volver">
                            <a class="boton-ancla-volver" href="usuarios.php"><i class="fas fa-chevron-left"></i> Volver</a>
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
                }

        ?>