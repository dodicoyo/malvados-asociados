<?php require 'includes/header.php' ?>
<div class="contenedor">
    <div class="crear_principal">
        <h1>Registro de Ambiente</h1>
        <form action="save-ambiente.php" method="post" class="formulario">
            <fieldset>

                <div class="contenedor-campos ">

                    <div class="campo">
                        
                        <input class="input-text" type="text"  name="nombre" id="nombre" required="">
                        <label>Nombre</label>
                    </div>

                    <div class="campo">
                        <input class="input-text" type="text" name="descripcion" id="descripcion"  required="">
                        <label>Descripción</label>
                    </div>
                    <div class="campo">
                        
                        <input class="input-text" type="text" name="capacidad" id="capacidad"  required="">
                        <label>Capacidad</label>
                    </div>
                    <div class="campo">
                        
                        <input class="input-text" type="text" name="ubicacion" id="ubicacion"  required="">
                        <label>Ubicación</label>
                    </div>
                    <div class="campo">
                        
                        <input class="input-text" type="text" name="tipo" id="tipo"  required="">
                        <label>Tipo</label>
                    </div>
                    <div class="campo">
                         <label>Equipamiento</label><br/><br/>
                    </div>
                    <div class="campo">
                        <select name="equi[]" required="" class="form-select multiple-select" multiple >
                            <?php
                                include("../app/conexion.php");
                                $sql="select *from infraestructura";
                                $resultado=mysqli_query($conectar,$sql);
                                if(mysqli_num_rows($resultado)>0){
                                    foreach($resultado as $solo){
                                        ?>
                                        <option value="<?php echo $solo['id_infraestructura'];?>"><?php echo $solo['nombre'];?></option>
                                        <?php
                                    }
                                }
                                else{
                                    echo "no recorio";
                                }
                            ?>
                        </select>
                       
                    </div>
                    <div class="botton-enviar">
                    <input  class="botton " type="submit" value="Guardar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".multiple-select").select2({
  //maximumSelectionLength: 2
});

</script>
<?php require 'includes/footer.php' ?>