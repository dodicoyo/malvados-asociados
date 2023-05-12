<?php require 'includes/header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    if(isset($_POST['submit'])){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $asunto=$_POST['asunto'];
        $mensaje=$_POST['mensaje'];
        $error=array();
        if(empty($nombre)){
            $error[] = 'El campo nombre es obligatorio';
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[] = 'La direccion de corrreo electronico no es valida';
        }
        if(empty($asunto)){
            $error[] = 'El campo asunto es obligatorio';
        }
        if(empty($mensaje)){
            $error[] = 'El campo mensaje es obligatorio';
        }
        if(count($error)==0){
            $msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
            $msj .= "Asunto: $asunto<br><br>";
            $msj .= "Cuerpo del mensaje:";
            $msj .='<p> '.$mensaje.'</p>';
            $msj .="--<p Este mensaje se ha enviado desde un formulario de contacto de Malvados y Asociados.></p>";
            $mail = new PHPMailer(true);
            try{
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                     
                $mail->isSMTP(); 
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth =true;
                $mail->Username = 'malvadosyasociados281@gmail.com';
                $mail->Password='moaemmomvwnjnuew';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;  
                $mail->setFrom('malvadosyasociados281@gmail.com', 'Malvados y Asociados ');
                $mail->addAddress('dcondorim@fcpn.edu.bo','Contacto Malvados Y Asociados');
                $mail->isHTML(true);
                $mail->Subject='Formulario de Contacto';
                $mail->Body = utf8_decode($msj);
                $mail->send();
                $respuesta = 'Correo Enviado';
            }catch (Exception $e) {
                $respuesta ='Mensaje ' .$mail->ErrorInfo;
            }
        }
    }
?>
<!-- Contact -->
<div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">CONTACTOS</div>
                        <h2>Póngase en contacto usando el formulario</h2>
                        <p>Puede pasar por nuestra oficina o simplemente use el formulario de contacto.</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="address"><i class="fas fa-map-marker-alt"></i>Plaza San Francisco, CA 94043, La Paz-Bolivia</li>
                            <li><i class="fas fa-phone"></i><a href="tel:003024630820">+591 641 04 061</a></li>
                            <li><i class="fas fa-phone"></i><a href="tel:003024630820">+591 740 87 925</a></li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:office@aria.com">malvadosyasociados@gmail.com</a></li>
                        </ul>
                        <h3>Sigue a Malvados y Asociados en las redes sociales</h3>

                        <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-pinterest fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <?php 
                    if(isset($error)){
                        if(count($error)>0){
                    ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="alert alert-danger alert-dismissible" role="alerta">
                                <?php 
                                    foreach($error as $error)
                                    {
                                        echo $error.'<br>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                       }
                    }
                    ?>
                    <!-- Contact Form -->
                    <form class="from" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea type="text" class="form-control" id="mesaje" name="mensaje" row="3" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="form-control-submit-button">Enviar</button>
                    </form>
                    <!-- end of contact form -->
                    <?php if(isset($respuesta)){ echo $respuesta;}?>
                </div> <!-- end of col -->
                
                
            </div> 
            <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->
    <?php require 'includes/footer.php' ?>