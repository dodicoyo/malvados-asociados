<?php 
    $id=$_GET['id_tipoevento'];
    include("../app/conexion.php");
    $sql="Delete from tipo_evento where id_tipoevento='".$id."'";
    $resultado=mysqli_query($conectar,$sql);
    if($resultado){
        echo " 
        <script languaje='JavaScript'>
        alert('los datos se ELIMINARON de la base de datos');
        location.assign('tipoevento.php');
        </script>
        ";
    }
    else
        echo  "<script languaje='JavaScript'>
        alert('ERROR:los datos NO SE ELIMINARON de la base de datos');
        location.assign('tipoevento.php');
        </script>";
?>