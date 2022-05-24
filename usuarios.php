<?php

session_start();

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
  
if(isset($_SESSION['admin'])){


    $select_usuarios = mysqli_query($conexion, "SELECT * FROM usuarios");

        while($datos_usuarios = mysqli_fetch_array($select_usuarios)){

        }

    $select_count_usuarios = mysqli_query($conexion, "SELECT COUNT(*) FROM usuarios");

    while($datos_count_usuarios = mysqli_fetch_array($select_count_usuarios)){

        $contador = $datos_count_usuarios['COUNT(*)'];
    
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Consultar Usuarios</title>
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">

</head>
</head>
<body>
   <div class="contenedor-principal">
        <div class="contenedor-img">
            <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
            <h1 class="titulos-principales">Consultas de Usuarios</h1>
            <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
            <h1 class="titulos-principales2">Consultas de Usuarios</h1>
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
                <h3 class="subtitulos-consulta">Registros de la tabla <strong>usuarios</strong></h3>
                <p class="parrafos-consulta"> La cantidad de registros encontrados es: <strong><?php echo $contador?></strong></p>
            </div>
            
            <div class="tabla-div">

                <table id="usuarios" class="tablas display" cellspacing="0">
                    <thead>
                        <th class="tabla-consulta">Username</th>
                        <th class="tabla-consulta">Privilegio</th>
                        <th class="tabla-consulta">Acciones</th>
                    </thead>

                    <tbody>
                        <?php
                            foreach($select_usuarios as $datos_usuarios):
                        ?>
                        <tr>
                            <td class="tabla-datos"><?php echo $datos_usuarios['username']?></td>
                            <td class="tabla-datos"><?php echo $datos_usuarios['privilegio']?></td>
                            <td class="tabla-datos">
                                    <a class="btn-editar" href="modificar.php?username=<?php echo $datos_usuarios['username']?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn-eliminar" href="eliminar.php?username=<?php echo $datos_usuarios['username']?>" onclick="return ConfirmDelete()"><i class="icono fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php

                            endforeach;

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="boton-volver">
                <a class="btn-agregar" href="insertar.php?3=3"><i class="fas fa-user-plus"></i> Agregar usuarios</a>
                <a class="boton-ancla-volver"  href="menu.php"><i class="fas fa-chevron-left"></i> Volver</a>
            </div>
        </div>
   <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>

   <!-- funcionamiento de eliminación de registros (propios) -->
   <script type="text/javascript" src="js/eliminar.js"></script>

    <!-- datatables -->
    <script type="text/javascript" src="datatable/datatables.min.js"></script>
    <script type="text/javascript" src="datatable/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>


    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>

    <!-- funcionamiento de datatables propias -->
    <script type="text/javascript" src="js/tablas.js"></script>
</body>
</html>

<?php

    }elseif(isset($_SESSION['estandar'])){
        $select_usuarios = mysqli_query($conexion, "SELECT * FROM usuarios");

        while($datos_usuarios = mysqli_fetch_array($select_usuarios)){

        }

    $select_count_usuarios = mysqli_query($conexion, "SELECT COUNT(*) FROM usuarios");

    while($datos_count_usuarios = mysqli_fetch_array($select_count_usuarios)){

        $contador = $datos_count_usuarios['COUNT(*)'];
    
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <title>Consultar Usuarios</title>
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">

</head>
</head>
<body>
<div class="contenedor-principal">
        <div class="contenedor-img">
            <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
            <h1 class="titulos-principales">Consultas de Usuarios</h1>
            <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
            <h1 class="titulos-principales2">Consultas de Usuarios</h1>
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
                <h3 class="subtitulos-consulta">Registros de la tabla <strong>usuarios</strong></h3>
                <p class="parrafos-consulta"> La cantidad de registros encontrados es: <strong><?php echo $contador?></strong></p>
            </div>
            
            <div class="tabla-div">

                <table id="usuarios" class="tablas display" cellspacing="0">
                    <thead>
                        <th class="tabla-consulta">Username</th>
                        <th class="tabla-consulta">Privilegio</th>
                    </thead>

                    <tbody>
                        <?php
                            foreach($select_usuarios as $datos_usuarios):
                        ?>
                        <tr>
                            <td class="tabla-datos"><?php echo $datos_usuarios['username']?></td>
                            <td class="tabla-datos"><?php echo $datos_usuarios['privilegio']?></td>
                        </tr>
                        <?php

                            endforeach;

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="boton-volver">
                <a class="boton-ancla-volver"  href="menu.php"><i class="fas fa-chevron-left"></i> Volver</a>
            </div>
        </div>
   <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>

   <!-- funcionamiento de eliminación de registros (propios) -->
   <script type="text/javascript" src="js/eliminar.js"></script>

    <!-- datatables -->
    <script type="text/javascript" src="datatable/datatables.min.js"></script>
    <script type="text/javascript" src="datatable/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>


    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>

    <!-- funcionamiento de datatables propias -->
    <script type="text/javascript" src="js/tablas.js"></script>
</body>
</html>

<?php

    }elseif(!isset($_SESSION['admin'])||!isset($_SESSION['estandar'])){

        header("Location: index.php");
        
    }

?>