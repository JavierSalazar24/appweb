<?php

session_start();

  
if(!isset($_SESSION['admin'])){

  header("Location: index.php");

}

    $user = $_SESSION['admin'];

    include "conectar_utd.php";

    $select = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

    while($datos = mysqli_fetch_array($select)){

      $usuario = $datos['username'];

    }

    if(!empty($_REQUEST['matricula'])){

        $matricula_alumno = $_REQUEST['matricula'];

        $select_alumnos = mysqli_query($conexion, "SELECT * FROM alumnos WHERE matricula = '$matricula_alumno'");

            while($datos_alumnos = mysqli_fetch_array($select_alumnos)){

                $matricula = $datos_alumnos['matricula'];
                $nombre = $datos_alumnos['nombre'];
                $especialidad = $datos_alumnos['especialidad'];

                }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $matricula_post=$_POST['matricula'];
	    $nombre_post=$_POST['nombre'];
        $especialidad_post=$_POST['especialidad'];
        
            $update_alumno = mysqli_query($conexion, "UPDATE alumnos SET nombre = '$nombre_post', especialidad =  '$especialidad_post' WHERE matricula = '$matricula_post'");

                if($update_alumno){
            
                    echo "<script> alert( 'El Alumno Ha Sido Actualizado Con Exito' ) </script>";
                    echo "<script> location.href='alumnos.php' </script>";
            
                }else{
            
                    echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                    echo "<script> location.href='alumnos.php' </script>";
            
                }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <title>Actualizar Alumno</title>
</head>
<body>
    <div class="contenedor-principal">
        <h1 class="titulos-principales">Modificar</h1>
                <div class="contenedor-img">
                    <img src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
                    <img src="img/img-control.png" alt="" whidth="70px" height="70px">
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
   <div class="contenedor-medio1">
    <div class="contenedor-texto">
        <h1>Modificar datos del alumno: <strong><?php echo $nombre ?></strong></h1>
        <h4>Ingresa los nuevos valores</h4>
        </div>
        <div class="formulario">

            <div class="div-formulario">
                <label class="label-insert-edit">
                    <span class="span-insert-edit">Matricula <i class="fas fa-address-card"></i></span>
                    <input type="hidden" name="matricula" value="<?php echo $matricula ?>" >
                    <input class="input-insert-form" type="text" value="<?php echo $matricula ?>" disabled>
                </label>
            </div>

            <div class="div-formulario">
                <label class="label-insert-edit">
                    <span class="span-insert-edit">Nombre <i class="fas fa-sort-alpha-up"></i></span>
                    <input class="input-insert-form" type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
                </label>
            </div>

            <div class="div-formulario">
                <label class="label-insert-edit">
                    <span class="span-insert-edit">Especialidad <i class="fas fa-graduation-cap"></i></span>
                    <input class="input-insert-form" type="text" id="especialidad" name="especialidad" value="<?php echo $especialidad ?>" required>
                </label>
            </div>

         </div>
         
         
    
        <div class="boton-volver">
            <a class="boton-ancla-imput"><i class="fas fa-spell-check"></i><input class="boton-imput" type="submit" value="Actualizar"></a>
            <a class="boton-ancla-volver" href="alumnos.php"><i class="fas fa-chevron-left"></i> Volver</a>
        </div>
        
     </div>
     
    </div>
    </form>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
</body>
</html>

<?php

    }elseif(!empty($_REQUEST['id'])){

        $id_contacto = $_REQUEST['id'];

        $select_contactos = mysqli_query($conexion, "SELECT * FROM contactos WHERE id = '$id_contacto'");

            while($datos_contactos = mysqli_fetch_array($select_contactos)){

                $id = $datos_contactos['id'];
                $nombre = $datos_contactos['nombre'];
                $apellidos = $datos_contactos['apellidos'];
                $direccion = $datos_contactos['direccion'];
                $telefono = $datos_contactos['telefono'];
                $email = $datos_contactos['email'];

                }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $id_post=$_POST['id'];
	    $nombre_post=$_POST['nombre'];
        $apellidos_post=$_POST['apellidos'];
        $direccion_post=$_POST['direccion'];
        $telefono_post=$_POST['telefono'];
        $email_post=$_POST['email'];
        
            $update_contacto = mysqli_query($conexion, "UPDATE contactos SET nombre = '$nombre_post', apellidos =  '$apellidos_post', direccion = '$direccion_post', telefono = '$telefono_post', email = '$email_post' WHERE id = '$id_post'");

                if($update_contacto){
            
                    echo "<script> alert( 'El Contacto Ha Sido Actualizado Con Exito' ) </script>";
                    echo "<script> location.href='contactos.php' </script>";
            
                }else{
            
                    echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                    echo "<script> location.href='contactos.php' </script>";
            
                }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <title>Actualizar Contacto</title>
</head>
<body>
    <div class="contenedor-principal">
        <h1 class="titulos-principales">Modificar</h1>
                    <div class="contenedor-img">
                        <img src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
                        <img src="img/img-control.png" alt="" whidth="70px" height="70px">
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
            <div class="contenedor-texto">
                        <h1>Modificar datos del contacto: <strong><?php echo $nombre ?></strong></h1>
                        <h4>Ingresa los nuevos valores</h4>
                    </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="formulario">

                <div class="div-formulario">
                    <label class="label-insert-edit">
                        <span class="span-insert-edit">Nombre <i class="fas fa-sort-alpha-up"></i></span>
                        <input type="hidden" name="id" value="<?php echo $id ?>" >
                        <input class="input-insert-form" type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>" required>
                    </label>
                </div>

                <div class="div-formulario">
                    <label class="label-insert-edit">
                        <span class="span-insert-edit">Apellidos <i class="fas fa-sort-alpha-down"></i></span>
                        <input class="input-insert-form" type="text" id="apellidos" name="apellidos" value="<?php echo $apellidos ?>" required>
                    </label>
                </div>

                <div class="div-formulario">
                    <label class="label-insert-edit">
                        <span class="span-insert-edit">Direccion <i class="fas fa-map-marked-alt"></i></span>
                        <input class="input-insert-form" type="text" id="direccion" name="direccion" value="<?php echo $direccion ?>" required>
                    </label>
                </div>

                <div class="div-formulario">
                    <label class="label-insert-edit">
                        <span class="span-insert-edit">Teléfono <i class="fas fa-mobile"></i></span>
                        <input class="input-insert-form" type="text" id="telefono" name="telefono" value="<?php echo $telefono ?>" required>
                    </label>
                </div>

                <div class="div-formulario">
                    <label class="label-insert-edit">
                        <span class="span-insert-edit">Correo <i class="fas fa-envelope"></i></span>
                        <input class="input-insert-form" type="text" id="email" name="email" value="<?php echo $email ?>" required>
                    </label>
                </div>
 
                </div>
                <div class="boton-volver">
                    <a class="boton-ancla-imput"><i class="fas fa-spell-check"></i><input class="boton-imput" type="submit" value="Actualizar"></a>
                    <a class="boton-ancla-volver" href="contactos.php"><i class="fas fa-chevron-left"></i> Volver</a>
                </div>
            </form>
        </div>
    </div>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
</body>
</html>

<?php

    }elseif(!empty($_REQUEST['username'])){

        $select_usuario_priv = mysqli_query($conexion, "SELECT * FROM usuarios");

            while($datos_usuario_priv = mysqli_fetch_array($select_usuario_priv)){

                }

    $user = $_REQUEST['username'];

        $select_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

            while($datos_usuario = mysqli_fetch_array($select_usuario)){

                $username = $datos_usuario['username'];
                $password = $datos_usuario['password'];

                }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['username'])&&!empty($_POST['new_usuario'])&&!empty($_POST['privilegio'])){

        $user_post=$_POST['username'];
        $nuevo_user_post=$_POST['new_usuario'];
        $priv_post=$_POST['privilegio'];
        
            $update_user= mysqli_query($conexion, "UPDATE usuarios SET username = '$nuevo_user_post', privilegio = '$priv_post' WHERE username = '$user_post'");

                if($update_user){
            
                    echo "<script> alert( 'El Usurio Ha Sido Actualizado Con Exito' ) </script>";
                    echo "<script> location.href='usuarios.php' </script>";
            
                }else{
            
                    echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                    echo "<script> location.href='usuarios.php' </script>";
            
                }
        }else{
            echo "<script> alert( 'Faltan rellenar algunos datos' ) </script>";
            echo "<script> location.href='usuarios.php' </script>";
        }
}

?>

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="shortcut icon" href="img/favicon.jpg" />

        <title>Actualizar Usuario</title>
    </head>
    <body>
        <div>
            <div class="contenedor-principal">
                <h1 class="titulos-principales">Modificar</h1>
                <div class="contenedor-img">
                    <img src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
                    <img src="img/img-control.png" alt="" whidth="70px" height="70px">
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
                    <div class="contenedor-texto">
                        <h1>Modificar datos del usuario: <strong><?php echo $username ?></strong></h1>
                        <h4>Ingresa los nuevos valores</h4>
                    </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="formulario">
                        <div class="div-formulario">
                            <label class="label-insert-edit">
                                <span class="span-insert-edit">Usuario <i class="fas fa-user-secret"></i></span>
                                <input type="hidden" value="<?php echo $username ?>" name="username">
                                <input class="input-insert-form"  type="text" value="<?php echo $username ?>" name="new_usuario">
                            </label>
                        </div>
                        <div class="div-formulario">
                            <label class="label-insert-edit">
                                <span class="span-insert-edit">Privilegio <i class="fas fa-id-badge"></i></span>
                                <select class="input-insert-form" name="privilegio" id="privilegio">
                                    <option value="admin">Admin</option>
                                    <option value="estandar">Estandar</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="boton-volver">
                        <a class="boton-ancla-imput"><i class="fas fa-spell-check"></i><input class="boton-imput" type="submit" value="Actualizar"></a>
                        <a class="boton-ancla-volver" href="usuarios.php"><i class="fas fa-chevron-left"></i> Volver</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    </body>
</html>

<?php

    }

?>