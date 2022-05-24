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

    $select_alumnos = mysqli_query($conexion, "SELECT * FROM alumnos");

        while($datos_alumnos = mysqli_fetch_array($select_alumnos)){

        }

    $select_count_alumnos = mysqli_query($conexion, "SELECT COUNT(*) FROM alumnos");

    while($datos_count_alumnos = mysqli_fetch_array($select_count_alumnos)){

        $contador = $datos_count_alumnos['COUNT(*)'];
    
    }



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Consultar Alumno</title>
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">

</head>
<body>
   <div class="contenedor-principal">
    <div class="contenedor-img">
        <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
        <h1 class="titulos-principales">Consultas de Alumnos</h1>
        <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
        <h1 class="titulos-principales2">Consultas de Alumnos</h1>
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
            <h3 class="subtitulos-consulta">Registros de la tabla <strong>alumnos</strong></h3>
            <p class="parrafos-consulta">La cantidad de registros encontrados es: <strong><?php echo $contador?></strong></p>
        </div>
            <div class="tabla-div">
                <table id="alumnos" class="tablas display" cellspacing="0">
                    <thead>
                        <th class="tabla-consulta">Matrícula</th>
                        <th class="tabla-consulta">Nombre</th>
                        <th class="tabla-consulta">Especialidad</th>
                        <th class="tabla-consulta">Acciones</th>
                    </thead>

                    <tbody>
                        <?php
                            foreach($select_alumnos as $datos_alumnos):
                        ?>
                            <tr>
                                <td class="tabla-datos"><?php echo $datos_alumnos['matricula']?></td>
                                <td class="tabla-datos"><?php echo $datos_alumnos['nombre']?></td>
                                <td class="tabla-datos"><?php echo $datos_alumnos['especialidad']?></td>
                                <td class="tabla-datos">
                                    <a class="btn-editar" href="modificar.php?matricula=<?php echo $datos_alumnos['matricula']?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn-eliminar"href="eliminar.php?matricula=<?php echo $datos_alumnos['matricula']?>" onclick="return ConfirmDelete()"><i class="icono fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="boton-volver">
                <a class="btn-agregar" href="insertar.php?1=1"><i class="fas fa-user-plus"></i> Agregar alumno</a>
                <a class="boton-ancla-volver" href="menu.php"><i class="fas fa-chevron-left"></i> Volver</a>
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
        $select_alumnos = mysqli_query($conexion, "SELECT * FROM alumnos");

        while($datos_alumnos = mysqli_fetch_array($select_alumnos)){

        }

    $select_count_alumnos = mysqli_query($conexion, "SELECT COUNT(*) FROM alumnos");

    while($datos_count_alumnos = mysqli_fetch_array($select_count_alumnos)){

        $contador = $datos_count_alumnos['COUNT(*)'];
    
    }



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.jpg" />

    <title>Consultar Alumno</title>
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">

</head>
<body>
<div class="contenedor-principal">
    <div class="contenedor-img">
        <img class="img-consultas" src="img/logo-utd.png" alt="" whidth="80px" height="80px"> 
        <h1 class="titulos-principales">Consultas de Alumnos</h1>
        <img class="img-consultas" src="img/img-control.png" alt="" whidth="80px" height="70px">
        <h1 class="titulos-principales2">Consultas de Alumnos</h1>
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
            <h3 class="subtitulos-consulta">Registros de la tabla <strong>alumnos</strong></h3>
            <p class="parrafos-consulta">La cantidad de registros encontrados es: <strong><?php echo $contador?></strong></p>
        </div>
            <div class="tabla-div">
                <table id="alumnos" class="tablas display" cellspacing="0">
                    <thead>
                        <th class="tabla-consulta">Matrícula</th>
                        <th class="tabla-consulta">Nombre</th>
                        <th class="tabla-consulta">Especialidad</th>
                    </thead>

                    <tbody>
                        <?php
                            foreach($select_alumnos as $datos_alumnos):
                        ?>
                            <tr>
                                <td class="tabla-datos"><?php echo $datos_alumnos['matricula']?></td>
                                <td class="tabla-datos"><?php echo $datos_alumnos['nombre']?></td>
                                <td class="tabla-datos"><?php echo $datos_alumnos['especialidad']?></td>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="boton-volver">
                <a class="boton-ancla-volver" href="menu.php"><i class="fas fa-chevron-left"></i> Volver</a>
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