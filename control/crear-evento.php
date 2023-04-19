<?php require 'includes/header.php' ?>


<div class="contenedor">
    <div class="crear_principal">
        <h1>Crear un Evento</h1>


        <form action="" class="formulario">
            <fieldset>

                <div class="contenedor-campos ">


                    <div class="campo">
                        <input class="input-text" type="text" placeholder="Nombre - Evento">

                    </div>

                    <div class="campo">
                        <input class="input-text" type="text" placeholder="Tema">
                    </div>
                    <div class="campo">
                        <input class="input-text" type="text" placeholder="Tipo de evento">

                    </div>
                    <div class="campo">
                        <div class="dos-campos">
                            <input class="input-text" type="text" placeholder="id_establecimiento">
                            <input class="input-text" type="text" placeholder="add-establecimiento">
                        </div>


                    </div>
                    <div class="campo">

                        <input class="input-text" type="text" placeholder="id_infraestructra">

                    </div>
                    <div class="campo">
                        <input class="input-text" type="number" placeholder="Capacidad - Maxima">

                    </div>
                    <div class="campo">
                        <input class="input-date" type="date" placeholder="fecha" max="<?php echo date("Y-m-d"); ?>">

                    </div>
                    <div class="campo">
                        <input class="input-text" type="time" placeholder="hora">

                    </div>

                    <div class="campo">
                        <input class="input-text" type="file" placeholder="imagenes">

                    </div>
                    <div class="campo dos">
                        <div class="dos-campos">
                            <input class="input-text" type="text" placeholder="id_Expositores">
                            <input class="input-text" type="text" placeholder="add-new-expositores">
                        </div>


                    </div>
                    <div class="campo">
                        <input class="input-text" type="file" placeholder="imagenes">

                    </div>

                    <div class="campo">
                        <textarea placeholder="detalles" class="input-text" name="" id="" cols="30" rows="10"></textarea>

                    </div>


                </div>
                <div class="botton-enviar">
                    <input  class="botton  " type="submit" value="Enviar">
                </div>

            </fieldset>
        </form>
    </div>

</div>
<?php require 'includes/footer.php' ?>