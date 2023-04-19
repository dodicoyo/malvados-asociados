<?php require 'includes/header.php' ?>
<?php include("../app/conexion.php");?>
<div class="contenedor">
    <div class="crear_principal">
        <?php
        if(isset($_POST['enviar'])){
            $id=$_POST['id_ambiente'];
            $nombre=$_POST["nombre"];
            $descripcion=$_POST["descripcion"];
            $capacidad=$_POST["capacidad"];
            $ubicacion=$_POST["ubicacion"];
            $tipo=$_POST["tipo"];
            $sql="update ambiente set nombre='".$nombre."',descripcion='".$descripcion."',capacidad='".$capacidad."',ubicacion='".$ubicacion."',tipo='".$tipo."'WHERE id_ambiente = '".$id."'";
            $resultado=mysqli_query($conectar,$sql);
            $equipamiento=$_POST["equi"];
            $sql1="select *from equipamiento where id_ambiente='$id'";
            $res1=mysqli_query($conectar,$sql1);
            $infra_a=[];
            foreach($res1 as $equipo){
                 $infra_a[]  =$equipo['id_infraestructura'];
            }
            //insertar nueva dato
            foreach($equipamiento as $equipp){
                if(!in_array($equipp,$infra_a)){
                    //echo $equipp."insert here <br>";
                    $sql3="insert into equipamiento (id_ambiente,id_infraestructura) values('$id',$equipp)";
                    $res3=mysqli_query($conectar,$sql3);
                }

            }
            foreach($infra_a as $infra_del){
                if(!in_array($infra_del,$equipamiento))
                {
                    echo $infra_del."delet";
                    $sql4="delete from equipamiento where id_ambiente='$id' and id_infraestructura='$infra_del'";
                    $res4=mysqli_query($conectar,$sql4);
                }

            }
            
           
            if($resultado){
                echo " 
                <script languaje='JavaScript'>
                alert('los datos fueron actulaizados correctamente a la base de datos');
                location.assign('ambiente.php');
                </script>
                ";
            }
            else
                echo  "<script languaje='JavaScript'>
                alert('ERROR:los datos NO se actualizaron');
                location.assign('ambiente.php');
                </script>";
        }
        else{
            $id=$_GET['id_ambiente'];
            $sql="select *from ambiente where id_ambiente='".$id."'";
            $resultado=mysqli_query($conectar,$sql);
       
            $fila=mysqli_fetch_assoc($resultado);
            $id_ambiente=$fila["id_ambiente"];
            $nombre=$fila["nombre"];
            $descripcion=$fila["descripcion"];
            $capacidad=$fila["capacidad"];
            $ubicacion=$fila["ubicacion"];
            $tipo=$fila["tipo"];

        } 
        if(isset($_POST['Cancelar'])){
            echo"<script>location.assign('ambiente.php');
                </script>";
        }
        mysqli_close($conectar);?>
        <h1>Editar de Ambiente</h1>
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
                    <div class="campo">
                        <label >Capacidad</label>
                        <input class="input-text" type="text" name="capacidad" id="capacidad" value="<?php echo $capacidad;?>" >
                        
                    </div>
                    <div class="campo">
                        <label >ubicacion</label>
                        <input class="input-text" type="text"  name="ubicacion" id="ubicacion" value="<?php echo $ubicacion;?>">

                    </div>
                    <div class="campo">
                        <label >Tipo</label>
                        <input class="input-text" type="text"  name="tipo" id="tipo" value="<?php echo $tipo;?>">

                    </div>
                    <div class="campo">
                        <label >Equipamiento</label>
                        <?PHP
                        include("../app/conexion.php");
                           if(isset($_GET['id_ambiente']))
                           {
                              $id_a= $_GET['id_ambiente'];
                              $equipamiento="select id_infraestructura from equipamiento where id_ambiente='$id_a'";
                              $res_equi= mysqli_query($conectar,$equipamiento);
                              $in_equi=[];
                              foreach($res_equi as $sequi){
                                $in_equi[] = $sequi['id_infraestructura'];
                              }
                           } 
                        ?>
                        <select name="equi[]" class="form-select multiple-select" multiple >
                            <?php
                                include("../app/conexion.php");
                                
                                $sql="select *from infraestructura";
                                $resultado=mysqli_query($conectar,$sql);
                                if(mysqli_num_rows($resultado)>0){
                                    foreach($resultado as $solo){
                                        ?>
                                        <option value="<?php echo $solo['id_infraestructura'];?>"
                                            <?php echo in_array($solo['id_infraestructura'], $in_equi)? 'selected':'';?>
                                        >
                                        <?php echo $solo['nombre'];?></option>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                        <option value="">no recorrido</option>

                                    <?php
                                    
                                    
                                }
                            ?>
                        </select>

                    </div>
                    <input type="hidden" name="id_ambiente" value="<?php echo $id;?>">
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

