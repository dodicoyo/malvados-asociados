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
