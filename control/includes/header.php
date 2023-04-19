
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 281</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../build/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>

<body>
<div class="dashboard">
    <aside class="sidebar">
       
        <div class="logo-principal">
            
            <picture class="logo flex" >
                <source  srcset="../build/img/control/logo.avif" type="image/avif">
                <source  srcset="../build/img/control/logo.webp" type="image/webp">
                <img  loading="lazy"  width="50" heigth="100" src="build/img/control/logo.png" alt="MaAs">
            
            </picture>
            <a href="index.php"><h3>  Malvados y Asociados </h3></a>
         
        </div>

        <nav class="sidebar-nav flex">
            <a href="infraestructura.php">Infraestructura Fisica</a>
            <a href="ambiente.php">Ambiente</a>
            <a href="crear-infraestructura.php">Reserva</a>
                <a href="crear-ambiente.php">Certificado</a>
                <a href="tipoevento.php">Tipos de Eventos</a>
        </nav>
    </aside>
    <div class="principal">
        <div class="barra flex">
            <p>Hola: <span>Control</span></p>
            <a href="" class="cerrar-sesion">Cerrar Sesion</a>
        </div>