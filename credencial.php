<?php
$imagen = imagecreatefromjpeg('build/img/participante/credencial_basico.jpg');

// Agregamos los datos del usuario y evento a la imagen
$nombre = 'Juan Pérez';
$evento = 'Conferencia de programación';
$color_texto = imagecolorallocate($imagen, 0, 0, 0); // Color negro

// Escribimos los datos en la imagen
imagestring($imagen, 5, 100, 100, $nombre, $color_texto);
imagestring($imagen, 5, 100, 150, $evento, $color_texto);

// Guardamos la imagen en un archivo
imagejpeg($imagen, 'credencial.jpg');

// Liberamos la memoria utilizada por la imagen
imagedestroy($imagen);

?>