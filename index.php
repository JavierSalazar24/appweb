<?php

  session_start();

  if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

    header("Location: menu.php");

  }

  include "conectar_utd.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      
    $user=$_POST['nombre'];
    $pass=$_POST['pass'];

    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$user' AND password='$pass'");
    
        if($consulta){
            
            while($datos_user = mysqli_fetch_array($consulta)){

                $username = $datos_user['username'];
                $password = $datos_user['password'];
                $privilegio = $datos_user['privilegio'];
            }

            if($username == true){

              if($user == $username){

                  if($privilegio == 'admin'){

                    $_SESSION['admin'] = $user;

                    echo "<script> alert('Bienvenido $user, al Sistema de la Universidad Tecnologíca de Durango ') </script>";
                    echo "<script> location.href='menu.php' </script>";

                    }

                  if($privilegio == 'estandar'){

                    $_SESSION['estandar'] = $user;

                    echo "<script> alert('Bienvenido $user, al Sistema de la Universidad Tecnologíca de Durango ') </script>";
                    echo "<script> location.href='menu.php' </script>";
  
                    }
              
              }else{

                  echo "<script> alert(' La Contraseña y/o El Usuario Son Incorrectos ') </script>";
                  echo "<script> location.href='index.php' </script>";

                }

          }else{

            echo "<script> alert(' La Contraseña y/o El Usuario Son Incorrectos ') </script>";
            echo "<script> location.href='index.php' </script>";

          }


        }else{

            echo "<script> alert(' Hubo Un Error Por Favor Verifique y Vuelva a Intentarlo ') </script>";
            echo "<script> location.href='index.php' </script>";

        }
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">	
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/estilos.css">
   <link rel="stylesheet" href="css/estilos_modal.css">
   <link rel="shortcut icon" href="img/favicon.jpg" />

   <title>Login de Acceso</title>

  </head>
  <body>
  <div id="miModal" class="modal">
        <div class="flex" id="flex">
            <div class="contenido-modal">
                <div class="modal-header flex">
                    <img class="imagen-portal" src="./img/logo-utd.png" alt="" whidth="75%" height="75%"> 
                    <h2 class="h2-modal">Aviso de Seguridad y Privacidad</h2>
                    <span class="close" id="close">&times;</span>
                </div>
                <div class="modal-body">
                    <p class="p-modal">Bienvenido al sistema de la Universidad Tecnológica de Durango, este portal tiene
                        como función organizar la información de los alumnos y usuarios que sean registrados, además de
                        cotejar toda la información capturada y generada por el departamento de control escolar.</p>
                </div>
                <div class="footer">
                    <h3 class="h2-modal">JRL © 2020. Todos los derechos reservados.</h3>
                </div>
            </div>
        </div>
    </div>
    
    
  <div class="contenedor-principal">
    <div class="contenedor-medio-portal">

        <div class="contenedor-img-portal">
            <div class="div-img-portal">
              <img class="imagen-portal" src="./img/logo-utd.png" alt="" whidth="75%" height="75%"> 
            </div>
            <h3 class="titulo1"> Portal de Control Escolar </h3>
            <div class="div-img-portal2">
              <img class="imagen-portal2" src="./img/logo-utd.png" alt="" whidth="75%" height="75%"> 
            </div>
          </div>
      
      <div class="contenedor-img-user">
        <img class="imagen-portal-user" src="./img/usua.png" width="25%" height="25%">
      </div>  
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <div class="formulario">
            <div class="div-formulario">
              <label class="label-insert-form">
                <span class="span-insert-form">Usuario <i class="fas fa-user-secret"></i></span>
                <input class="input-insert-form" type="text" name="nombre" pattern="[a-zA-Z0-9]+" required >
              </label> 
            </div>
            <div class="div-formulario">
              <label class="label-insert-form">
                <span class="span-insert-form">Contraseña <i class="fas fa-user-lock"></i></span>
                <input class="input-insert-form" type="password" name="pass" pattern="[a-zA-Z0-9]+" required >
              </label>
            </div>
          </div>

          <div class="contenedor-botones">
               <a class="boton-ancla-imput"><i class="fas fa-door-open"></i><input class="boton-imput" type="submit" name="enviar" value="Ingresar" ></a>
               <a class="boton-ancla-imput"><i class="fas fa-backspace"></i></i><input class="boton-imput" type="reset" name="borrar" value="Borrar" ></a>
          </div>
        </form>
          
    </div>
    <div class="contenedor-medio-index">

        <div class="contenedor-img-portal">
            <div class="div-img-portal">
              <img class="imagen-portal" src="./img/logo-utd.png" alt="" whidth="75%" height="75%"> 
            </div>
            <h3 class="titulo1"> Portal de Control Escolar </h3>
            <div class="div-img-portal2">
              <img class="imagen-portal2" src="./img/logo-utd.png" alt="" whidth="75%" height="75%"> 
            </div>
          </div>
      
      <div class="contenedor-img-user">
        <img class="imagen-portal-user" src="./img/usua.png" width="25%" height="25%">
      </div>  
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <div class="formulario">
            <div class="div-formulario">
              <label class="label-insert-form">
                <span class="span-insert-form">Usuario <i class="fas fa-user-secret"></i></span>
                <input class="input-insert-form" type="text" name="nombre" pattern="[a-zA-Z0-9]+" required >
              </label> 
            </div>
            <div class="div-formulario">
              <label class="label-insert-form">
                <span class="span-insert-form">Contraseña <i class="fas fa-user-lock"></i></span>
                <input class="input-insert-form" type="password" name="pass" pattern="[a-zA-Z0-9]+" required >
              </label>
            </div>
          </div>

          <div class="contenedor-botones">
               <a class="boton-ancla-imput"><i class="fas fa-door-open"></i><input class="boton-imput" type="submit" name="enviar" value="Ingresar" ></a>
               <a class="boton-ancla-imput"><i class="fas fa-backspace"></i></i><input class="boton-imput" type="reset" name="borrar" value="Borrar" ></a>
          </div>
        </form>
          
    </div>
  </div>
    <!-- Javascript para el formulario-->
    <script type="text/javascript" src="js/formulario.js"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>

    <script src="js/main.js"></script>
  </body>
</html>