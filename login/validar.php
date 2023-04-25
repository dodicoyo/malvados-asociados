<?php 
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    session_start();
    $_SESSION['usuario']=$usuario;            
    include("../app/conexion.php");   
    $sql="select *from usuario where password='$password' and usuario='$usuario'";   
    $resultado=mysqli_query($conectar,$sql);
    $user=mysqli_fetch_assoc($resultado);
    //echo ''.$user['id_usuario'];muestra el id del usuario que esta login
    $filas=mysqli_num_rows($resultado);
    //echo ''.$filas;muestra numero de filas que contiene resultado
    $id=$user['id_usuario'];
      
    if($filas){
        $_SESSION['id']=$id;


       $sql1="select *from control where id_usuario='$id'"; 
        $res1=mysqli_query($conectar,$sql1);
        $fil1=mysqli_num_rows($res1);
        if($fil1){
            header("location:../control/index.php");

        }
        else{
            header("location:../participante/index.php");

        }
        

    }   
    else{
        ?>
        <?php
        include("usuario_login.php");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTICACION</h1>
        <?PHP
    }   
    mysqli_free_result($resultado);
    mysqli_close($conectar);                     
?>
