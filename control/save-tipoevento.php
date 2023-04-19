
<?php require 'includes/header.php' ?>

 <?php 
     
        include("../app/conexion.php");
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $sql="insert into tipo_evento(id_administrador,nombre,descripcion) values('1','$nombre','$descripcion')";
        $resultado=mysqli_query($conectar, $sql);

        if($resultado){
            echo " 
            <script languaje='JavaScript'>
            alert('los datos fueron ingresados correctamente a la base de datos');
            location.assign('tipoevento.php');
            </script>
            ";
        }
        else
            echo  "<script languaje='JavaScript'>
            alert('ERROR:los datos NO fueron ingresados a la base de datos');
            location.assign('tipoevento.php');
            </script>";
        mysqli_close($conectar);

     ?>