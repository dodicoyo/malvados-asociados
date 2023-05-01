<?php require 'includes/header.php'?>
<?php
    include("../app/conexion.php");
    $sql="select *from reserva";
    $resultado=mysqli_query($conectar,$sql);
?>

<div class="contenedor">
    <div class="listar ">
        <h2 >Reserva</h2>
        <div class="botton infraestructura">
           <!-- <a href="crear-infraestructura.php" color="#000000">buscar</a>  -->
        </div>
    </div>
    <br/>
    <div class="tlis">
            <table  >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Apellido Paterno:">Apellido Paterno</th>
                        <th data-titulo="Apellido Materno:">Apellido Materno</th>
                        <th data-titulo="Identidad:">Identidad</th>
                        <th data-titulo="Evento:">Evento</th>
                        <th data-titulo="Fecha Registro:">Fecha Registro</th>
                        <th data-titulo="Estado:">Estado</th>
                        <th data-titulo="Pago:">Pago</th>
                      
                    </tr>
                </thead>
                <tbody>
                     <?php
                            while($filas=mysqli_fetch_assoc($resultado)){
                        ?>
                    <tr>
                            <?php
                            $i=$filas['id_usuario'];
                            $sql1="select *from usuario where id_usuario='".$i."'";
                            $res1=mysqli_query($conectar,$sql1);
                            $fil=mysqli_fetch_assoc($res1);
                            $i2=$filas['id_evento'];
                            $sql2="select *from evento where id_evento='".$i2."'";
                            $res2=mysqli_query($conectar,$sql2);
                            $fila=mysqli_fetch_assoc($res2);
                            ?>
                        <td data-titulo="Id:"><?php echo $filas['id_reserva']?></td>
                        <td data-titulo="Nombre:"><?php echo $fil['nombre'];?></td>
                        <td data-titulo="Apellido Paterno:"><?php echo $fil['apPaterno'];?></td>
                        <td data-titulo="Apellido Materno:"><?php echo $fil['apMaterno'];?></td>
                        <td data-titulo="Identidad:"><?php echo $fil['identidad']?></td>
                        <td data-titulo="Evento:"><?php echo $fila['nombreEvento']?></td>
                        <td data-titulo="Fecha Registro:"><?php echo $filas['fecha_reserva']?></td>
                        <td data-titulo="Estado:"><?php echo $filas['estado_reserva']?></td>
                        <td data-titulo="Pago:"><?php echo $filas['estado_pago']?></td>
                        

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
                mysqli_close($conectar);
            ?>
         </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>