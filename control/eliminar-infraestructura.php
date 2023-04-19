<?php 
    $id=$_GET['id_infraestructura'];
    include("../app/conexion.php");
    $sql="Delete from infraestructura where id_infraestructura='".$id."'";
    $resultado=mysqli_query($conectar,$sql);
    if($resultado){
        echo " 
        <script languaje='JavaScript'>
        alert('los datos se ELIMINARON de la base de datos');
        location.assign('infraestructura.php');
        </script>
        ";
    }
    else
        echo  "<script languaje='JavaScript'>
        alert('ERROR:los datos NO SE ELIMINARON de la base de datos');
        location.assign('infraestructura.php');
        </script>";
?>