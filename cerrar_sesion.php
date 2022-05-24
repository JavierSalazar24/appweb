<?php

session_start();

include "conectar_utd.php";

if(isset($_SESSION['admin'])){

    $user = $_SESSION['admin'];
  
  }elseif(isset($_SESSION['estandar'])){

    $user = $_SESSION['estandar'];
  
  }

    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username = '$user'");

    while($datos = mysqli_fetch_array($consulta)){
      
    $nom = $datos['username'];

    }

    echo "<script> alert('Hasta luego usuario $nom') </script>";

    session_destroy();

    echo "<script> location.href='index.php' </script>";

    
?>
