<?php 
    $id=$_GET['id_ambiente'];
    include("../app/conexion.php");
    $sql1="delete from equipamiento where id_ambiente='$id'";

    $sql="Delete from ambiente where id_ambiente='".$id."'";
    $res1=mysqli_query($conectar,$sql1);
    $resultado=mysqli_query($conectar,$sql);
    if($resultado){
        echo " 
        <script languaje='JavaScript'>
        alert('los datos se ELIMINARON de la base de datos');
        location.assign('ambiente.php');
        </script>
        ";
    }
    else
        echo  "<script languaje='JavaScript'>
        alert('ERROR:los datos NO SE ELIMINARON de la base de datos');
        location.assign('ambiente.php');
        </script>";
?>