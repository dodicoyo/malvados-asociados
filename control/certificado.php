<?php require'includes/header.php';
    include("../app/conexion.php");
    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
$mail = new PHPMailer(true); 
?>
<?php
    if(isset($_POST['enviar'])) {
        $id_evento = $_POST['lista'];
        $sql="SELECT detalle_asistencia ,id_usuario, COUNT(*) AS asistencias, (COUNT(*) / (SELECT Duracion FROM evento WHERE id_evento = '2')) * 100 AS porcentaje FROM asistencia WHERE id_evento = '".$id_evento."' GROUP BY id_usuario;";
        $resultado=mysqli_query($conectar, $sql);
    }
    else{
        $sql="select *from asistencia";
        $resultado=mysqli_query($conectar, $sql);
    }
    $consulta="select *from evento where (fechaEvento + INTERVAL (Duracion-1) DAY) <= '".date('Y-m-d')."' and estado!='terminado'";
    $re=mysqli_query($conectar,$consulta);
?>
<div class="contenedor">
        <h2 >Emitir Certificado </h2>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="formulario">
            <label>eventos</label>
            <select id="lista" name="lista" class="form-select">
                <?php while($fila=mysqli_fetch_assoc($re)){?>
                <option value="<?php echo $fila['id_evento']?>"><?php echo $fila['nombreEvento'];?></option>
                <?php }?>
            </select>
            <input type="submit" value="listar" name="enviar">           
        </form>
            <table  >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Asistencia:">Asistencia</th>
                        <th data-titulo="Porcentaje:">Porcentaje</th>
                        <th data-titulo="Evento:">Evento</th>
                        <th data-titulo="Duración:">Duración</th>
                        
                    </tr>
                </thead>
                <tbody>
                     <?php
                            $sw=0;
                            while($filas=mysqli_fetch_assoc($resultado)){
                                $sw=$sw+1;
                        ?>
                    <tr>
                            <?php
                            $i=$filas['id_usuario'];
                            $sql1="select *from usuario where id_usuario='".$i."'";
                            $res1=mysqli_query($conectar,$sql1);
                            $fil=mysqli_fetch_assoc($res1);
                            $sql2="select *from evento where id_evento='".$id_evento."'";
                            $res2=mysqli_query($conectar,$sql2);
                            $fila=mysqli_fetch_assoc($res2);
                            $nombre=$fil['nombre']." ".$fil['apPaterno']." ".$fil['apMaterno'];
                            $correo=$fil['email'];
                            ?>
                        <td data-titulo="Id:"><?php echo $sw?></td>
                        <td data-titulo="Nombre:"><?php echo $nombre;?></td>
                        <td data-titulo="Asistencia:"><?php echo $filas['asistencias']?></td>
                        <td data-titulo="Porcentaje:"><?php echo $filas['porcentaje']?></td>
                        <td data-titulo="Evento:"><?php echo $fila['nombreEvento']?></td>
                        <td data-titulo="Duración:"><?php echo $fila['Duracion']?></td></td>                     
                    </tr>
                    <?php
                    //enviar el certificada a cada uno si cumplio la asistencia
                        if($filas['porcentaje']>= 80 && $fila['emite']!='no' && $filas['detalle_asistencia']!='enviado'){
                            if($fila['emite']=='asistencia')//detalle asistencia enviado
                            {$cont_img="";}
                            else{$cont_img=$fila['emite'];}
                            $save="UPDATE asistencia SET detalle_asistencia ='enviado' WHERE id_usuario='".$i."'";
                            $r=mysqli_query($conectar,$save);
                            $save="UPDATE evento SET destado ='terminado' WHERE id_evento='".$id_evento."'";
                            $r=mysqli_query($conectar,$save);
                            
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
                                
                                $mail->send();
                                //echo 'Message has been sent';
                            }
                            catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
                mysqli_close($conectar);
            ?>
         
</div>
<?php require 'includes/footer.php' ?>