
<?php
include("../app/conexion.php");
if(isset($_FILES['imagen1'])) {
$id=$_POST['id_reserva'];
  $imagen = $_FILES['imagen1']['name'];
  $temporal = $_FILES['imagen1']['tmp_name'];
  $ruta = $_SERVER['DOCUMENT_ROOT']."/malvados/build/img/reserva/". $imagen;
  move_uploaded_file($temporal, $ruta);
  
  // Insertar la ruta en la tabla de reserva 
  $consulta = "UPDATE reserva SET comprobante = '$imagen' WHERE id_reserva='".$id."'";
  $resultado=mysqli_query($conectar, $consulta);
  if($resultado){
   
    $pago="UPDATE reserva set estado_pago='proceso', fecha_pago='".date('Y-m-d H:i:s')."' where id_reserva='".$id."'";
    
    $rpago=mysqli_query($conectar,$pago);
    if($rpago){echo  "<script languaje='JavaScript'>
        alert('se le enviara un mensaje de confirmación');
        location.assign('reserva.php');
        </script>";
    }
    
}
else
    echo  "<script languaje='JavaScript'>
                alert('ERROR:no se pudo realizar su acción');
                location.assign('reserva.php');
                </script>";
}
else{
    echo" algo anda mal";
}
?>
