<?php require 'includes/header.php' ?>
<div class="contenedor">
    <div class="crear_principal">

        <h1>Registro de Infraestructura Física</h1>
        <form action="save-infraestructura.php" method="post" class="formulario">
            <fieldset>

                <div class="contenedor-campos ">
                    <div class="campo">
                        <input class="input-text" type="text"  name="nombre" id="nombre"  required="">
                        <label for="">nombre</label>

                    </div>

                    <div class="campo">
                        <input class="input-text" type="text"  name="tipo" id="tipo" required="" >
                        <label for="">Tipo Infraestructura</label>

                    </div>

                    <div class="campo">
                        <input class="input-text" type="text" name="estado" id="estado"  required="">
                        <label for="">Estado</label>

                    </div>
                    <div class="campo">
                        <input class="input-text" type="text" name="descripcion" id="descripcion"  required="">
                        <label for="">Descripción</label>

                    </div>

                </div>
                <div class="botton-enviar">
                    <input  class="botton  " type="submit" value="Guardar">
                </div>

            </fieldset>
        </form>
    </div>

</div>
<?php require 'includes/footer.php' ?>