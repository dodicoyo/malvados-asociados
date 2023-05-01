
<?php require 'includes/header.php' ?>

 <?php 
     
        include("../app/conexion.php");
        
            $id_usuario=$_SESSION['id'];
            $id_evento=$_POST['id_evento'];
            $nombre=$_POST['nombre'];
            $apPaterno=$_POST['apPaterno'];
            $apMaterno=$_POST['apMaterno'];
            $identidad=$_POST['identidad'];
            $email=$_POST['email'];
            $celular=$_POST['celular'];
            $fecha_registro = date('Y-m-d H:i:s');
            //ci==session
            $sql="select *from usuario where id_usuario='".$id_usuario."' and identidad='".$identidad."'";
            $resultado=mysqli_query($conectar,$sql);
            $fila=mysqli_fetch_assoc($resultado);
            if($fila['identidad']==$identidad){
                //si el ci es igual a al usuario session entonces puede realizar su reserva
                $save="insert into reserva(id_usuario,id_evento,fecha_reserva) values('$id_usuario','$id_evento','$fecha_registro')";
                $resultado=mysqli_query($conectar, $save);
                if($resultado){
                        echo  "<script languaje='JavaScript'>
                        alert('exitoso tu reserva usuario');
                        location.assign('eventos.php');
                        </script>";
                }
                else
                    echo  "<script languaje='JavaScript'>
                        alert('ERROR:no se pudo realizar la reserva usuario');
                        location.assign('eventos.php');
                        </script>";


            }
            else{//no es igual el carnet se busca en tabla usuario si esta registrado y obtener su id caso contrario se crea un nuevo usuario
                
                $sql="select * from usuario where identidad='".$identidad."'";
                $resultado=mysqli_query($conectar,$sql);
                if($resultado){
                    $fila=mysqli_fetch_assoc($resultado);
                    if($fila['id_usuario']!=$id_usuario and $fila['id_usuario']!='' ){
                        echo"com5";
                        $user=$fila['id_usuario'];
                        $save="insert into reserva(id_usuario,id_evento,fecha_reserva) values('$user','$id_evento','$fecha_registro')";
                        $resultado=mysqli_query($conectar, $save);
                        if($resultado){
                            echo  "<script languaje='JavaScript'>
                            alert('exitoso tu reserva usuario');
                            location.assign('eventos.php');
                            </script>";
                        }
                        else
                            echo  "<script languaje='JavaScript'>
                            alert('ERROR:no se pudo realizar la reserva usuario');
                            location.assign('eventos.php');
                            </script>";
                    }
                    else{
                        
                    $sql="insert into usuario(nombre,apPaterno,apMaterno,email,identidad,fechaRegistro) values('$nombre','$apPaterno','$apMaterno','$email','$identidad','$fecha_registro')";
                    $res=mysqli_query($conectar,$sql);
                    if($res){
                        $id_usu= mysqli_insert_id($conectar);
                        $save="insert into reserva(id_usuario,id_evento,fecha_reserva) values('$id_usu','$id_evento','$fecha_registro')";
                        $resultado=mysqli_query($conectar, $save);
                        if($resultado){

                            echo " 
                            <script languaje='JavaScript'>
                            alert('exitoso tu reserva nuevo');
                            location.assign('eventos.php');
                            </script>
                            ";
                        }
                        else
                            echo  "<script languaje='JavaScript'>
                            alert('ERROR:no se pudo realizar la reserva nuevo');
                            location.assign('eventos.php');
                            </script>";

                    }
                    }
                }

            }
     
        
        
        mysqli_close($conectar);

     ?>