<?php require 'includes/header.php' ?>
<!-- Details 1 -->
<div id="details" class="accordion" >    
    <div class="accordion-container" id="accordionOne">
                <h2>Preguntas Frecuentes</h2>
                <div class="item">
                    <div id="headingOne">
                        <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                            <span class="circle-numbering">1</span><span class="accordion-title">¿Cómo puedo realizar mi reserva para un evento?</span>
                        </span>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                        <div class="accordion-body">
                        Puedes realizar tu reserva para el evento accediendo a los detalles del evento en nuestro sitio web, encontraras un botton para tu reserva o inscripción.
                        </div>
                    </div>
                </div> <!-- end of item -->
            
                <div class="item">
                    <div id="headingTwo">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                            <span class="circle-numbering">2</span><span class="accordion-title">¿Cómo puedo obtener mi confirmación de registro?</span>
                        </span>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionOne">
                        <div class="accordion-body">
                            A través de un mensaje por correo electronico confirmando y se le enviar su respectivo credencial.
                        </div>
                    </div>
                </div> <!-- end of item -->
            
                <div class="item">
                    <div id="headingThree">
                        <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" role="button">
                            <span class="circle-numbering">3</span><span class="accordion-title">¿Puedo asistir solo a algunas sesiones del evento o debo participar en todo el programa?</span>
                        </span>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionOne">
                        <div class="accordion-body">
                            Para tener acceso al certificado debe participar el 80% del evento.
                        </div>
                    </div>
                </div> <!-- end of item -->
    </div> <!-- end of accordion-container -->
</div>
<?php require 'includes/footer.php' ?>