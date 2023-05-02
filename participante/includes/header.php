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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Malvados y Asociados</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	
	<!-- Favicon  -->
    <link rel="icon" href="../build/img/control/logo.avif">

</head>
<body data-spy="scroll" data-target=".fixed-top">
 
<!-- Header -->
<header id="header" class="header">
        <div class="header-content">
            
        </div> <!-- end of header-content -->
</header> <!-- end of header -->
    <!-- end of header -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top " >
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <picture class="logo" >
                <source  srcset="../build/img/control/logo.avif" type="image/avif">
                <source  srcset="../build/img/control/logo.webp" type="image/webp">
                <img  loading="lazy"  style="width:50px;" src="build/img/control/logo.png" alt="alternative">
        </picture>
        <a class="nav-link page-scroll" href="index.php">Malvados y Asociados</a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="eventos.php">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="contactos.php">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="preguntas.php">Preguntas Frecuentes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-user'></i>
                         <?php //echo''.$_SESSION['id'];
                $id=$_SESSION['id'];
                include("../app/conexion.php");
                $sql="select nombre, apPaterno, apMaterno from usuario where id_usuario='$id'";
                $resultado=mysqli_query($conectar,$sql);
                $filas=mysqli_fetch_assoc($resultado);
                 echo $filas['nombre'].' '.$filas['apPaterno'].' '.$filas['apMaterno'];
                    
                ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="reserva.php"><span class="item-text">RESERVAS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="editperfil.php"><span class="item-text">EDITAR PERFIL</span></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="btn-solid-lg nav-link page-scroll" href="cerrar_session.php"><i class='fas fa-sign-out-alt'></i> Cerrar Sesión</a>
                </li>
            </ul>
            
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->

    
    