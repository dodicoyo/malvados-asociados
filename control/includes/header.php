<?php 
session_start();
error_reporting(0);
$varsesion= $_SESSION['usuario'];
$id= $_SESSION['id'];

//echo "$id";

if($varsesion==null || $varsesion=''){//si varsesion esta nulo o vacio no puede ingresar y destruye la sesion
    header("location:../login/usuario_login.php");
    die();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malvados y Asociados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../build/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="icon" href="../build/img/control/logo.avif">
    

</head>

<body>
<div class="dashboard">
    <aside class="sidebar">
       
        <div class="logo-principal">
            
            <!--<picture class="logo flex" >
                <source  srcset="../build/img/control/logo.avif" type="image/avif">
                <source  srcset="../build/img/control/logo.webp" type="image/webp">
                <img  loading="lazy"  width="50" heigth="100" src="../build/img/control/logo.webp" alt="MaAs">
            
            </picture>
-->
            <img  loading="lazy"  width="50" heigth="80" src="../build/img/control/logo.webp" alt="desdeaqui">
            
            <a href="index.php"><h3>  Malvados y Asociados </h3></a>
         
        </div>

        <nav class="sidebar-nav flex">
            <a href="infraestructura.php">Infraestructura Fisica</a>
            <a href="ambiente.php">Ambiente</a>
            <a href="reserva.php">Reserva</a>
            <a href="participante.php">Participante</a>
            <a href="asistencia.php">Asistencia</a>
                <a href="#">Certificado</a>
        </nav>
    </aside>
    <div class="principal">
        <div class="barra flex">
            <img src="../build/img/control/sara.webp"  style="width:40px;height:23px;" class="rounded-pill">
            <p>Hola: <span>
                <?php //echo''.$_SESSION['id'];
                $id=$_SESSION['id'];
                include("../app/conexion.php");
                $sql="select nombre, apPaterno, apMaterno from usuario where id_usuario='$id'";
                $resultado=mysqli_query($conectar,$sql);
                $filas=mysqli_fetch_assoc($resultado);
                 echo $filas['nombre'].' '.$filas['apPaterno'].' '.$filas['apMaterno'];
                    
                ?>
                </span></p>
            <a href="../login/cerrar_session.php" class="cerrar-sesion">Cerrar Sesion</a>
        </div>