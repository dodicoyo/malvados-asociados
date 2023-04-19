<?php require 'includes/header.php' ?>
<?php include("../app/conexion.php");?>
<div class="contenedor">
    <div class="crear_principal">
        <?php
        if(isset($_POST['enviar'])){
            $id = $_POST['id_infraestructura'];
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $estado = $_POST['estado'];
            $descripcion = $_POST['descripcion'];
            $sql="update infraestructura set nombre='$nombre',tipo='$tipo', estado='$estado',descripcion='$descripcion' where id_infraestructura='$id'";
            echo $sql;
            $resultado=mysqli_query($conectar,$sql);
            if($resultado){
                echo " <script languaje='JavaScript'>
                alert('los datos fueron actulaizados correctamente a la base de datos');
                location.assign('infraestructura.php');
                </script>
                ";
            }
            else{
                echo  "<script languaje='JavaScript'>
                alert('ERROR:los datos NO se actualizaron');
                location.assign('infraestructura.php');
                </script>";
            }
  
        }

        else{
           if(isset($_GET['id_infraestructura'])){
            $id=$_GET['id_infraestructura'];
            $sql="select *from infraestructura where id_infraestructura='".$id."'";
            $resultado=mysqli_query($conectar,$sql);
       
            $fila=mysqli_fetch_assoc($resultado);
            $nombre=$fila["nombre"];
            $tipo=$fila["tipo"];
            $estado=$fila["estado"];
            $descripcion=$fila["descripcion"];
           }
         
           

        } 
        if(isset($_POST['Cancelar'])){
            echo"<script>location.assign('infraestructura.php');
                </script>";
        }
        mysqli_close($conectar);
        ?>
        <h1>Editar de Infraestructura Física</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="formulario">
            <fieldset>
                <div class="contenedor-campos ">
                <div class="campo">
                        <label >Nombre</label>
                        <input class="input-text" type="text"  name="nombre" id="nombre" value="<?php echo $nombre;?>">

                    </div>
                    <div class="campo">
                        <label >Tipo</label>
                        <input class="input-text" type="text"  name="tipo" id="tipo" value="<?php echo $tipo;?>">

                    </div>
                    <div class="campo">
                        <label >Estado</label>
                        <input class="input-text" type="text" name="estado" id="estado" value="<?php echo $estado;?>" >
                        
                    </div>
                    <div class="campo">
                        <label >Descripcion</label>
                        <input class="input-text" type="text"  name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">

                    </div>
                    <input type="hidden" name="id_infraestructura" value="<?php echo $id;?>">
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