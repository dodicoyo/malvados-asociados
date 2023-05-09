<?php require 'includes/header.php'?>
<?php include("../app/conexion.php");?>
<?php
  if(isset($_GET['id_reserva'])){
        $id_reserva=$_GET['id_reserva'];
        $sql="select *from reserva where id_reserva='".$id_reserva."'";
        $resultado=mysqli_query($conectar, $sql);
        $fila=mysqli_fetch_assoc($resultado);
    }
    else{
        echo "noooo";
    }?>
<div class="contenedor">
  <div >
  <button onclick="window.location.href='reserva.php'" type="button" class="btn btn-primary">Regresar</button>
  </div>
<table>
  <tbody>
    <th>
      <?php echo "".$fila['id_reserva']?><br>
      <?php $s="select * from usuario where id_usuario='".$fila['id_usuario']."'";
            $r=mysqli_query($conectar,$s);
            $f=mysqli_fetch_assoc($r);
            echo "NOMBRE DEL USUARIO: ".$f['nombre']." ".$f['apPaterno']." ".$f['apMaterno'];
      ?><br>
      <?php echo "CARNET: ".$f['identidad'];?><BR>
      <?php $sqle="select * from evento where id_evento='".$fila['id_evento']."'";
            $re=mysqli_query($conectar,$sqle);
            $fe=mysqli_fetch_assoc($re);
            echo "EVENTO: ".$fe['nombreEvento'];
      ?><br>
      <?php echo "FECHA EVENTO: ".$fe['fechaEvento'];?><BR>
      <?php echo "FECHA DE LA RESERVA: ".$fila['fecha_reserva']?><br>
      <?php echo "ESTADO DE LA RESERVAa: ".$fila['estado_reserva']?><br>
      <?php echo "ESTADO DE PAGO: ".$fila['estado_pago']?><br>
    </th>
    <?php if($fila['estado_pago']!="pendiente"){?>
              <th> <img src="../build/img/reserva/<?php echo $fila['comprobante'];?>"  style="width:320px;height:240px;" class="rounded-pill">
              <?php if($fila['estado_pago']=="proceso"){?>
              <form action="confirmar_pago.php" method="post">
                <input type="hidden" name="id_reserva" value="<?php echo $id_reserva; ?>">
                <input type="hidden" name="id_evento" value="<?php echo $fila['id_evento']; ?>">
                <input type="hidden" name="id_usuario" value="<?php echo $f['id_usuario']; ?>">
                <input type="hidden" name="correo" value="<?php echo $f['email']; ?>">
                <input type="hidden" name="nombre" value="<?php echo $f['nombre']." ".$f['apPaterno']." ".$f['apMaterno']; ?>">
                <input type="hidden" name="nombreEvento" value="<?php echo $fe['nombreEvento']; ?>">
                <input type="hidden" name="identidad" value="<?php echo $f['identidad']; ?>">
                <input type="hidden" name="foto" value="<?php echo $f['foto']; ?>">
                <button type="submit" name="boton1"><i class="bi bi-check-circle-fill"></i></button>
                <button type="submit" name="boton2"><i class="bi bi-x-circle-fill"></i></button>
              </form>
              <?php }?>
            </th>
    <?php 
    }
    ?>
  </tbody>
</table>
</div>
<?php require 'includes/footer.php' ?>