<?php require 'includes/header.php' ?>
<?php include("../app/conexion.php");?>
<?php
if(isset($_GET['id_evento'])){
    $id=$_GET['id_evento'];
    $id_usuario=$_SESSION['id'];
    $fecha_registro = date('Y-m-d H:i:s');
    $save="insert into reserva(id_usuario,id_evento,fecha_reserva) values('$id_usuario','$id','$fecha_registro')";
    $resultado=mysqli_query($conectar, $save);
        if($resultado){
            echo  "<script languaje='JavaScript'>
                        alert('tu reserva fue realizada con exito ');
                        location.assign('eventos.php');
                        </script>";
        }
        else
            echo  "<script languaje='JavaScript'>
                        alert('ERROR:no se pudo realizar tu reserva');
                        location.assign('eventos.php');
                        </script>";


    }
    else{
        echo "no lo capto";
    }
   
    ?> 

<?php require 'includes/footer.php' ?>