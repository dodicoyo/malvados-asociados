<?php include("../app/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
$mail = new PHPMailer(true); 
?>
<?php
// Recuperar el valor de id_reserva enviado desde el formulario
$id_reserva = $_POST['id_reserva'];
$id_evento = $_POST['id_evento'];
$id_usuario = $_POST['id_usuario'];
$correo=$_POST['correo'];
$nombre = $_POST['nombre'];
$evento = $_POST['nombreEvento'];
$identidad = $_POST['identidad'];
$foto = $_POST['foto'];
if (isset($_POST['boton1'])) {
  // Este código se ejecutará si se presionó el botón 1 si comprueba 
  // Actualizar el estado de pago en la base de datos para la reserva con id_reserva
  // Código SQL para actualizar el estado de pago
        $sql = "UPDATE reserva SET estado_pago = 'pagado', estado_reserva='completado' WHERE id_reserva = '$id_reserva'";
        $resultado=mysqli_query($conectar, $sql);
        //como la reserva esta completa el usuario pasa a ser participante 
        $fecha=date('Y-m-d H:i:s');
        $sp="insert into participante(id_usuario,id_evento,fecha_participante) values('$id_usuario','$id_evento','$fecha') ";
        $rp=mysqli_query($conectar, $sp);
  //genera qr
        require "../phpqrcode/qrlib.php";//Agregamos la libreria para genera códigos QR
        $dir = 'temp/';//Declaramos una carpeta temporal para guardar la imagenes generadas
        if (!file_exists($dir))//Si no existe la carpeta la creamos
        mkdir($dir);
        $filename = $dir.'test.png';//Declaramos la ruta y nombre del archivo a generar
        //Parametros de Condiguración $tamaño = 10; //Tamaño de Pixel $level = 'M'; //Precisión Baja $framSize = 3; //Tamaño en blanco  $contenido = $id; //Texto
	    QRcode::png($id_evento . '-' . $id_usuario, $filename, 'M', 15, 3); //Enviamos parametros -> Función genera QR 
	      //Mostramos la imagen generada
	      echo '<img src="'.$dir.basename($filename).'" />'; 
  //realizar el credencial 1 se crea una imagen
        $imagen = imagecreatefromjpeg('../build/img/participante/fondo1.jpg');//cara
        $imagen2 = imagecreatefromjpeg('../build/img/participante/fondo2.jpg');//detras 
        $nombre = strtoupper($nombre);//coloca a pura mayuscula
        $color_texto = imagecolorallocate($imagen, 0, 0,255); 
        $font_size = 25; // tamaño de fuente personalizado
        $font = '../build/font/OpenSans-Bold.ttf';
        $fo='../build/font/OpenSans-Regular.ttf';// archivo de fuente TrueType personalizado
        $qr = imagecreatefrompng($dir.basename($filename));// Cargar la imagen del código QR        
        imagecopymerge($imagen2, $qr, 125, 350, 0, 0, imagesx($qr), imagesy($qr), 100);// Copiar la imagen del código QR a la imagen de la credencial
        $usuario_imagen = imagecreatefromjpeg('../build/img/participante/'.$foto.'');
        $usuario_imagen_redimensionada = imagescale($usuario_imagen, 250);
        imagecopymerge($imagen, $usuario_imagen_redimensionada, 160, 180, 0, 0, imagesx($usuario_imagen_redimensionada), imagesy($usuario_imagen_redimensionada), 100);
        $nombre1 = wordwrap($nombre, 20, "\n");
        imagettftext($imagen, 30, 0, 75, 600, $color_texto,$font,$nombre1);
        $evento = wordwrap($evento, 25, "\n");
        imagettftext($imagen,20, 0, 70, 680, $color_texto,$fo,$evento);
        imagettftext($imagen, 30, 0, 100, 940, $color_texto,$font,$identidad);
        // Guardamos la imagen en un archivo
        imagejpeg($imagen, '../build/img/participante/credencial/'.$nombre.'.jpg');
        imagejpeg($imagen2, '../build/img/participante/credencial/'.$nombre.'2.jpg');
//parte para enviar mensaje de confirmacio
        try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'malvadosyasociados281@gmail.com';                     //SMTP username
            $mail->Password   = 'moaemmomvwnjnuew';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('malvadosyasociados281@gmail.com', 'Malvados y Asociados ');
            $mail->addAddress($correo,$nombre);     //Add a recipient
            $mail->addCC('jcoyoq@fcpn.edu.bo');
        

            $mail->isHTML(true);
            $mail->Subject='Aprobado de pago aceptada';
            $mail->Body    = 'Su comprobante de pago ha sido aceptado y su reserva ha sido completada.</b>';
            $mail->addAttachment('../build/img/participante/credencial/'.$nombre.'.jpg', 'Credencial de Identificación');
            $mail->addAttachment('../build/img/participante/credencial/'.$nombre.'2.jpg', 'Credencial de Identificación');
            $mail->send();
            echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
//----------email
        if($resultado&&$rp){
                    echo 
                   "<script languaje='JavaScript'>
                    alert('el comprobante a sido aceptado');
                    location.assign('detalles_reserva.php?id_reserva=$id_reserva');
                    </script>
                    ";
                }
                else
                    echo  
                    "<script languaje='JavaScript'>
                    alert('ERROR:el comprobante no ha sido guardo al ser aceptado');
                    location.assign('detalles_reserva.php?id_reserva=$id_reserva');
                    </script>";
// Liberamos la memoria utilizada por la imagen
imagedestroy($imagen);
imagedestroy($qr);
  // Ejecutar la consulta
  // ...
} elseif (isset($_POST['boton2'])) {
  // Este código se ejecutará si se presionó el botón 2
  // Actualizar el estado de pago en la base de datos para la reserva con id_reserva
  // Código SQL para actualizar el estado de pago
  $sql = "UPDATE reserva SET estado_pago = 'pendiente' WHERE id_reserva = '$id_reserva'";
  $resultado=mysqli_query($conectar, $sql);
//parte para enviar mensaje de que la imagen adicionada no es la correcta
try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'malvadosyasociados281@gmail.com';                     //SMTP username
    $mail->Password   = 'moaemmomvwnjnuew';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('malvadosyasociados281@gmail.com', 'Malvados y Asociados ');
    $mail->addAddress($correo,$nombre);     //Add a recipient
    $mail->addCC('jcoyoq@fcpn.edu.bo');


    $mail->isHTML(true);
    $mail->Subject='El comprobante adicionado no es correcto';
    $mail->Body    = 'Su comprobante de pago  no ha sido aceptado y su reserva no ha sido completada.</b>';

    $mail->send();
    echo 'Message has been sent';
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
//----------email
        if($resultado){
            echo " 
            <script languaje='JavaScript'>
            alert('el comprobante no ha sido aceptado');
            location.assign('detalles_reserva.php?id_reserva=$id_reserva');
            </script>
            ";
        }
        else
            echo  "<script languaje='JavaScript'>
            alert('ERROR:el comprobate');
            location.assign('detalles_reserva.php?id_reserva=$id_reserva');
            </script>";
  // Ejecutar la consulta
  // ...
} else {
  // Este código se ejecutará si no se presionó ningún botón
  echo "no se realizo cambio";
}

?>
