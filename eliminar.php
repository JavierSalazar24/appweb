<?php

session_start();
  
if(!isset($_SESSION['admin'])){

  header("Location: index.php");
}

    include "conectar_utd.php";

    if(!empty($_REQUEST['matricula'])){

        $matricula = $_REQUEST['matricula'];

        $delete_alumnos = mysqli_query($conexion, "DELETE FROM alumnos WHERE matricula = '$matricula'");
        
            if($delete_alumnos){
        
                echo "<script> alert( 'El Alumno Ha Sido Eliminado Con Exito' ) </script>";
                echo "<script> location.href='alumnos.php' </script>";
        
                }else{
        
                    echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                    echo "<script> location.href='alumnos.php' </script>";
        
                    }
        }

    if(!empty($_REQUEST['id'])){

        $id = $_REQUEST['id'];

        $delete_contactos = mysqli_query($conexion, "DELETE FROM contactos WHERE id = '$id'");

            if($delete_contactos){

                echo "<script> alert( 'El Contácto Ha Sido Eliminado Con Exito' ) </script>";
                echo "<script> location.href='contactos.php' </script>";
            
                }else{

                    echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                    echo "<script> location.href='contactos.php' </script>";

                    }
        }


    if(!empty($_REQUEST['username'])){

        $user = $_REQUEST['username'];

        $delete_usuarios = mysqli_query($conexion, "DELETE FROM usuarios WHERE username = '$user'");

            if($delete_usuarios){

                echo "<script> alert( 'El Usuario Ha Sido Eliminado Con Exito' ) </script>";
                echo "<script> location.href='usuarios.php' </script>";
        
                }else{

                    echo "<script> alert( 'Ocurrio Un Error' ) </script>";
                    echo "<script> location.href='usuarios.php' </script>";

                    }
        }

?>