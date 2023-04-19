
<?php require 'includes/header.php' ?>

 <?php 
     
        include("../app/conexion.php");
        $nombre=$_POST['nombre'];
        $tipo=$_POST['tipo'];
        $estado=$_POST['estado'];
        $descripcion=$_POST['descripcion'];
        $sql="insert into infraestructura(nombre,tipo,estado,descripcion) values('$nombre','$tipo','$estado','$descripcion')";
        $resultado=mysqli_query($conectar, $sql);

        if($resultado){
            echo " 
            <script languaje='JavaScript'>
            alert('los datos fueron ingresados correctamente a la base de datos');
            location.assign('infraestructura.php');
            </script>
            ";
        }
        else
            echo  "<script languaje='JavaScript'>
            alert('ERROR:los datos NO fueron ingresados a la base de datos');
            location.assign('infraestructura.php');
            </script>";
        mysqli_close($conectar);

     ?>