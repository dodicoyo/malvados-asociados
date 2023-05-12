<?php require 'includes/header.php'?>
<?php
    include("../app/conexion.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../vendor/autoload.php';
    $mail = new PHPMailer(true); 
    if(isset($_GET['id_evento'])){
        $id_evento=$_GET['id_evento'];
        $sql="SELECT detalle_asistencia ,id_usuario, COUNT(*) AS asistencias, (COUNT(*) / (SELECT Duracion FROM evento WHERE id_evento = '".$id_evento."')) * 100 AS porcentaje FROM asistencia WHERE id_evento = '".$id_evento."' GROUP BY id_usuario;";
        $resultado=mysqli_query($conectar, $sql);
        while($filas=mysqli_fetch_assoc($resultado)){
            $i=$filas['id_usuario'];
            $sql1="select *from usuario where id_usuario='".$i."'";
            $res1=mysqli_query($conectar,$sql1);
            $fil=mysqli_fetch_assoc($res1);
            $sql2="select *from evento where id_evento='".$id_evento."'";
            $res2=mysqli_query($conectar,$sql2);
            $fila=mysqli_fetch_assoc($res2);
            $nombre=$fil['nombre']." ".$fil['apPaterno']." ".$fil['apMaterno'];
            $correo=$fil['email'];
            $sw2=9;
            if($filas['porcentaje']>= 80 ){
                $save="UPDATE asistencia SET detalle_asistencia ='enviado' WHERE id_usuario='".$i."'";
                $r=mysqli_query($conectar,$save);
                $save="UPDATE evento SET estado ='terminado' WHERE id_evento='".$id_evento."'";
                $r=mysqli_query($conectar,$save);
            //se crea img
                        $sw=0;
                        $tipo=exif_imagetype('../build/img/certificados/'.$fila['certificado_img'].'');
                        if ($tipo == IMAGETYPE_JPEG) {
                        $usuario_imagen = imagecreatefromjpeg('../build/img/certificados/'.$fila['certificado_img'].'');// La imagen es JPEG 
                        } else{
                        $usuario_imagen = imagecreatefrompng('../build/img/certificados/'.$fila['certificado_img'].'');// La imagen es PNG
                            $sw=1;
                        } 
                        $color_texto = imagecolorallocate($usuario_imagen, 0, 0,0); 
                        $font = '../build/font/BAHNSCHRIFT.TTF';
                        imagettftext($usuario_imagen,30, 0, 165, 350, $color_texto,$font,$nombre);
                        // Guardamos la imagen en un archivo
                        
                        if($sw==0)
                        {  imagejpeg($usuario_imagen, '../build/img/certificados/'.$nombre.'.jpg');}
                        else{
                            imagepng($usuario_imagen, '../build/img/certificados/'.$nombre.'.jpg');}
                                     
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
                            $mail->Subject='Certificado '.$fila['nombreEvento'].'';
                            $mail->Body    = 'Enviamos su certificado.</b>';
                            $mail->addAttachment('../build/img/certificados/'.$nombre.'.jpg', 'Certificado');
                            $mail->send();
                            //echo 'Message has been sent';
                            $sw2=1;
                        }
                        catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            $sw2=0;
                        }
                        
                
            }
            imagedestroy($usuario_imagen);
           
        }      
                    
    }
    else{             echo"noo";            }

   if($sw2==1){
    echo " 
                            <script languaje='JavaScript'>
                            alert('se enviaron los certifiados');
                            location.assign('certificado.php');
                            </script>
                            ";
   }
   else{
    echo " 
    <script languaje='JavaScript'>
    alert('No enviaron los certifiados');
    location.assign('certificado.php');
    </script>
    ";
   }
?>