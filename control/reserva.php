<?php require 'includes/header.php'?>
<?php
    include("../app/conexion.php");
    if(isset($_GET['estado'])){
        $estado=$_GET['estado'];
        $sql="select *from reserva where estado_pago='".$estado."'";
        $resultado=mysqli_query($conectar, $sql);
    }
    else{
        $sql="select *from reserva";
        $resultado=mysqli_query($conectar, $sql);
    }
?>
<div class="contenedor">
    <div class="listar ">
        <h2 >Reserva</h2>       
        <div class="container mt-3">
            <div class="btn-group">
                <button onclick="window.location.href='reserva.php?estado=pendiente'" type="button" class="btn btn-primary">pendientes</button>
                <button onclick="window.location.href='reserva.php?estado=proceso'"  type="button" class="btn btn-primary">Proceso</button>
                <button onclick="window.location.href='reserva.php?estado=pagado'" type="button" class="btn btn-primary">Confirmado</button>
                <button onclick="window.location.href='reserva.php?'" type="button" class="btn btn-primary">Todas las reservas</button>
            </div>
        </div>
    </div>
    <br/>
    <div class="tlis">
            <table  >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Identidad:">Identidad</th>
                        <th data-titulo="Evento:">Evento</th>
                        <th data-titulo="Pago:">Pago</th>
                        <th data-titulo="Acción:">Acción</th>
                      
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
                        <td data-titulo="Nombre:"><?php echo $fil['nombre']." ".$fil['apPaterno']." ".$fil['apMaterno'];?></td>
                        <td data-titulo="Identidad:"><?php echo $fil['identidad']?></td>
                        <td data-titulo="Evento:"><?php echo $fila['nombreEvento']?></td>
                        <td data-titulo="Pago:"><?php echo $filas['estado_pago']?></td>
                        <td data-titulo="Acción:"><?php echo"<a href='detalles_reserva.php?id_reserva=".$filas['id_reserva']."'>ver detalles</a>"?></td>
                        
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