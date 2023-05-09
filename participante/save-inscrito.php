<?php require 'includes/header.php';

include("../app/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
$mail = new PHPMailer(true); 
?>
<?php
if(isset($_GET['id_evento'])){
    $id=$_GET['id_evento'];
    $id_usuario=$_SESSION['id'];
    $fecha_registro = date('Y-m-d H:i:s');
    $save="insert into participante(id_usuario,id_evento,fecha_participante) values('$id_usuario','$id','$fecha_registro')";
    $resultado=mysqli_query($conectar, $save);
    //---
    
    
if($resultado){
   
 
            $sql1="select *from usuario where id_usuario='".$id_usuario."'";
    $res1=mysqli_query($conectar, $sql1);
    $fil1=mysqli_fetch_assoc($res1);
    $sql2="select *from evento where id_evento='".$id."'";
    $res2=mysqli_query($conectar, $sql2);
    $fil2=mysqli_fetch_assoc($res2);
    $id_evento = $id;
    $correo=$fil1['email'];
    $nombre = $fil1['nombre']." ".$fil1['apPaterno']." ".$fil1['apMaterno'] ;
    $evento = $fil2['nombreEvento'];
    $identidad = $fil1['identidad'];
    $foto = $fil1['foto'];
//genera qr
    require "../phpqrcode/qrlib.php";//Agregamos la libreria para genera códigos QR
    $dir = '../control/temp/';//Declaramos una carpeta temporal para guardar la imagenes generadas
    if (!file_exists($dir))//Si no existe la carpeta la creamos
    mkdir($dir);
    $filename = $dir.'test.png';//Declaramos la ruta y nombre del archivo a generar
    //Parametros de Condiguración $tamaño = 10; //Tamaño de Pixel $level = 'M'; //Precisión Baja $framSize = 3; //Tamaño en blanco  $contenido = $id; //Texto
    QRcode::png($id_evento . '-' . $id_usuario, $filename, 'M', 10, 3); //Enviamos parametros -> Función genera QR 
      //Mostramos la imagen generada
    //  echo '<img src="'.$dir.basename($filename).'" />'; 
//realizar el credencial 1 se crea una imagen
    $imagen = imagecreatefromjpeg('../build/img/participante/fondo1.jpg');//cara
    $imagen2 = imagecreatefromjpeg('../build/img/participante/fondo2.jpg');//detras 
    $nombre = strtoupper($nombre);//coloca a pura mayuscula
    $color_texto = imagecolorallocate($imagen, 0, 0,255); 
    $font_size = 25; // tamaño de fuente personalizado
    $font = '../build/font/arial.ttf';// archivo de fuente TrueType personalizado
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
       // echo 'Message has been sent';
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
//----------email
            echo  "<script languaje='JavaScript'>
                        alert('tu inscripcion fue realizada con exito ');
                        location.assign('eventos.php');
                        </script>";
        }
        else
            echo  "<script languaje='JavaScript'>
                        alert('ERROR:no se pudo realizar tu inscripcion');
                        location.assign('eventos.php');
                        </script>";

// Liberamos la memoria utilizada por la imagen
imagedestroy($imagen);
imagedestroy($qr);
    }
    else{
        echo "no lo capto";
    }
   
?> 

<?php require 'includes/footer.php' ?>