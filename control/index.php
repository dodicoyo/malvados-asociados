<?php 
    include("../app/conexion.php");
    
    if(isset($_POST['text'])){
        $text = $_POST['text'];
        $datos = explode("-", $text);
        $id_evento = intval($datos[0]); // ID_EVENTO
        $id_usuario = intval($datos[1]); // ID_USUARIO
        $fecha = date('Y-m-d'); // formato: yyyy-mm-dd
        $hora = date('H:i:s'); // formato: hh:mm:ss
        $consulta="select *from evento where id_evento='".$id_evento."'";
        $re=mysqli_query($conectar,$consulta);
        $fila=mysqli_fetch_assoc($re);
        $fecha_ini=$fila['fechaEvento'];
        $duracion=$fila['Duracion'];
        $fecha_final = date('Y-m-d', strtotime($fecha_ini . ' + ' . $duracion . ' days'));
        if ($fecha >= $fecha_ini && $fecha <= $fecha_final) {
            $estado = "asistió";
            $sql="INSERT into asistencia (id_evento,id_usuario,fecha,hora_entrada,detalle_asistencia) values('$id_evento','$id_usuario', '$fecha','$hora','$estado')";
            $resultado=mysqli_query($conectar,$sql);
            if($resultado){
                echo  "<script languaje='JavaScript'>
                            alert('fue realizada con exito ');
                            
                            </script>";
            }
            else
                echo  "<script languaje='JavaScript'>
                            alert('ERROR:no se pudo realizar tu acción ');
                            
                            </script>";
        } else {
            echo  "<script languaje='JavaScript'>
                            alert('ERROR:no se pudo realizar tu acción');
                            
                            </script>";
        }
        
    }
    else{
       
    }
?>
<?php require 'includes/header.php' ?>
<div class="contenedor">
    <br>
    <?php $sql="select *from asistencia where  fecha='".date('Y-m-d')."'";
        $resultado=mysqli_query($conectar, $sql);  
        ?>
    <video width="50%" id="MyCamaraOpen"></video>
    <BR><BR>
    <form action="" method="POST">
        <br>
        <input type="text" name="text" id="text">
    </form>
    <table  >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Identidad:">Identidad</th>
                        <th data-titulo="Evento:">Evento</th>
                        <th data-titulo="Estado:">Estado</th>
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
                        <td data-titulo="Id:"><?php echo $filas['id_asistencia']?></td>
                        <td data-titulo="Nombre:"><?php echo $fil['nombre']." ".$fil['apPaterno']." ".$fil['apMaterno'];?></td>
                        <td data-titulo="Identidad:"><?php echo $fil['identidad']?></td>
                        <td data-titulo="Evento:"><?php echo $fila['nombreEvento']?></td>
                        <td data-titulo="Pago:"><?php echo $filas['detalle_asistencia']?></td>                     
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
</div>
<script>
        // paso 1 inicia la sección de la cámara
        var  video =document.getElementById("MyCamaraOpen");
        var text = document.getElementById("text");
        var scanner = new Instascan.Scanner({
            video : video
        });
        Instascan.Camera.getCameras()
        .then(function(Our_Camera){
            if(Our_Camera.length > 0){
                scanner.start(Our_Camera[0]);
            }
            else{
                alert("Falló de Camara")
            }
        })
        .catch(function(error){
            conole.log("error porfavor intentalo de nuevo");
        })
        
        // paso 2 sección de entrada de texto 
        scanner.addListener('scan',function(input_value){
            text.value=input_value;
            document.forms[0].submit();
        })
    </script>
</body>
</html>