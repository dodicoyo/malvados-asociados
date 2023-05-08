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

        
$imagen = imagecreatefromjpeg('build/img/participante/base.jpg');

// Agregamos los datos del usuario y evento a la imagen
$nombre = 'Juan Pérez';
$evento = 'Conferencia de programación';
$identidad = 'identidad: 8377943';
$correo = 'email: juditcoyoquispe@gmail.com';
$color_texto = imagecolorallocate($imagen, 0, 0,0); // Color negro
$font_size = 45; // tamaño de fuente personalizado
 // archivo de fuente TrueType personalizado
 $font = 'build/font/arial.ttf';
$coeo = 'correo@example.com';


// Cargar la imagen del código QR
$qr = imagecreatefrompng($dir.basename($filename));

// Copiar la imagen del código QR a la imagen de la credencial
imagecopymerge($imagen, $qr, 500, 500, 0, 0, imagesx($qr), imagesy($qr), 100);

imagettftext($imagen, $font_size, 0, 300, 1300, imagecolorallocate($imagen, 255, 192, 203),$font,$nombre);
imagettftext($imagen, $font_size, 0, 250, 1420, $color_texto, $font,$evento);
imagettftext($imagen, $font_size, 0, 250, 1490, $color_texto,$font,$identidad);
imagettftext($imagen, $font_size, 0, 250, 1560, $color_texto,$font,$correo);
imagettftext($imagen, $font_size, 0, 250, 1630, $color_texto, $font, $coeo);


// Guardamos la imagen en un archivo
imagejpeg($imagen, ''.$nombre.'.jpg');


// Liberamos la memoria utilizada por la imagen
imagedestroy($imagen);


?>
    <H1>Generar qr</H1>
    <h2>desde index</h2>

<?php require'includes/footer.php'?>
