<?php
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
// Escribimos los datos en la imagen
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