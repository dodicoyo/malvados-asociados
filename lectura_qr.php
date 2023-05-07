<?php 
    include("app/conexion.php");
    if(isset($_POST['text'])){
        $text = $_POST['text'];
        echo $text;
        $sql="INSERT into code (qr_code,fecha) values('$text', NOW())";
        $resultado=mysqli_query($conectar,$sql);
        if($resultado){
            echo  "<script languaje='JavaScript'>
                        alert('fue realizada con exito ');
                        location.assign('eventos.php');
                        </script>";
        }
        else
            echo  "<script languaje='JavaScript'>
                        alert('ERROR:no se pudo realizar tu acción');
                        location.assign('eventos.php');
                        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <title>Document</title>
</head>
<body>
    <video width="50%" id="MyCamaraOpen"></video>
    <BR><BR>
    <form action="" method="POST">
        <input type="text" name="text" id="text">
    </form>
    
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