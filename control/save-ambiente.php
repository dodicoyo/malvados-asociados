
<?php require 'includes/header.php' ?>

 <?php 
     
        include("../app/conexion.php");
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $capacidad=$_POST['capacidad'];
        $ubicacion=$_POST['ubicacion'];
        $tipo=$_POST['tipo'];
        $equipo=$_POST['equi'];
        $sql="insert into ambiente(nombre,descripcion,capacidad,ubicacion,tipo) values('$nombre','$descripcion','$capacidad','$ubicacion','$tipo')";
        $resultado=mysqli_query($conectar, $sql);
        $id = mysqli_insert_id($conectar);
        foreach ($equipo as $equip) {
            // Escapar los datos para prevenir SQL injection (importante para la seguridad)
            $equipos = mysqli_real_escape_string($conectar, $equip);
            
        
            // Ejecutar la consulta SQL para guardar los datos en la tabla correspondiente
           
            $query = "INSERT INTO equipamiento (id_ambiente,id_infraestructura) VALUES ('$id', '$equipos')";
            echo mysqli_query($conectar, $query);

        } 
        if($resultado){                         
            
            
            echo " 
            <script languaje='JavaScript'>
            alert('los datos fueron ingresados correctamente a la base de datos');
            location.assign('ambiente.php');
            </script>
            ";
        }
        else
            echo  "<script languaje='JavaScript'>
            alert('ERROR:los datos NO fueron ingresados a la base de datos');
            location.assign('ambiente.php');
            </script>";
        mysqli_close($conectar);

     ?>
<?php require 'includes/footer.php' ?>