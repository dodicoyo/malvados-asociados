<?php require 'includes/header.php' ?>
<?php include("../app/conexion.php");?>
<div class="contenedor">
    <div class="crear_principal">
        <?php
        if(isset($_POST['enviar'])){
            $id = $_POST['id_tipoevento'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $sql="update tipo_evento set nombre='$nombre',descripcion='$descripcion' where id_tipoevento='$id'";
            echo $sql;
            $resultado=mysqli_query($conectar,$sql);
            if($resultado){
                echo " <script languaje='JavaScript'>
                alert('los datos fueron actulaizados correctamente a la base de datos');
                location.assign('tipoevento.php');
                </script>
                ";
            }
            else{
                echo  "<script languaje='JavaScript'>
                alert('ERROR:los datos NO se actualizaron');
                location.assign('tipoevento.php');
                </script>";
            }
  
        }

        else{
           if(isset($_GET['id_tipoevento'])){
            $id=$_GET['id_tipoevento'];
            $sql="select *from tipo_evento where id_tipoevento='".$id."'";
            $resultado=mysqli_query($conectar,$sql);
       
            $fila=mysqli_fetch_assoc($resultado);
            $nombre=$fila["nombre"];
            $descripcion=$fila["descripcion"];
           }
         
           

        } 
        if(isset($_POST['Cancelar'])){
            echo"<script>location.assign('tipoevento.php');
                </script>";
        }
        mysqli_close($conectar);
        ?>
        <h1>Editar de Tipo Evento</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="formulario">
            <fieldset>
                <div class="contenedor-campos ">
                <div class="campo">
                        <label >Nombre</label>
                        <input class="input-text" type="text"  name="nombre" id="nombre" value="<?php echo $nombre;?>">

                    </div>
                    
                    <div class="campo">
                        <label >Descripcion</label>
                        <input class="input-text" type="text"  name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">

                    </div>
                    <input type="hidden" name="id_tipoevento" value="<?php echo $id;?>">
                </div>
                <div class="botton-enviar">
                    <input  class="botton " type="submit" value="Actualizar" name="enviar">
                    <input  class="botton " type="submit" value="Cancelar" name="Cancelar" >
                </div>

            </fieldset>
        </form>
    </div>

</div>
<?php require 'includes/footer.php' ?>