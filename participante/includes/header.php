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
<html lang="en">
<head>
  <title>usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse  ">
  <div class="container-fluid">
    <div class="navbar-header">      
            <picture class="logo" >
                <source  srcset="../build/img/control/logo.avif" type="image/avif">
                <source  srcset="../build/img/control/logo.webp" type="image/webp">
                <img  loading="lazy"  style="width:50px;" src="build/img/control/logo.png" alt="MaAs">
            </picture>
            <a class="navbar-brand" href="index.php">Malvados y Asociados</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="index.php">Inicio</a></li>
      <li><a href="#">Nosotros</a></li>
      <li><a href="eventos.php">Eventos</a></li>
      <li><a href="#">Contactos</a></li>
      <li><a href="#">Preguntas Frecuentes</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php //echo''.$_SESSION['id'];
                $id=$_SESSION['id'];
                include("../app/conexion.php");
                $sql="select nombre, apPaterno, apMaterno from usuario where id_usuario='$id'";
                $resultado=mysqli_query($conectar,$sql);
                $filas=mysqli_fetch_assoc($resultado);
                 echo $filas['nombre'].' '.$filas['apPaterno'].' '.$filas['apMaterno'];
                    
                ?> </a></li>
      <li><a href="cerrar_session.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>
  




