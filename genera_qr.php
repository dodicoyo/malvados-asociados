<?php
	//Agregamos la libreria para genera códigos QR
	require "phpqrcode/qrlib.php";    
    include("app/conexion.php");
    $sql="select *from reserva where id_usuario='2'";
    $resultado=mysqli_query($conectar,$sql);
    $fila=mysqli_fetch_assoc($resultado);
   // $id_participante=$fila['id_partiipante'];
    $id=$fila['id_reserva'].',fecha: '.$fila['fecha_reserva'].', estado:'.$fila['estado_reserva'];

	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'test.png';

        //Parametros de Condiguración
	
	$tamaño = 10; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	$contenido = $id; //Texto
	
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
        //Mostramos la imagen generada
	echo '<img src="'.$dir.basename($filename).'" />';  
?>
    <H1>Generar qr</H1>
    <h2>desde index</h2>

<?php require'includes/footer.php'?>
