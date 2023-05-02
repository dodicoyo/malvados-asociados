<?php require 'includes/header.php' ?>
<ul class="nav nav-tabs ml-auto">
  <li class="nav-item">
    <a class="nav-link active" href="#reserva">Reservas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#inscrito">Inscripciones</a>
  </li>
</ul>
    <div id="reserva" class="container">
        <div class="row">
            <div class="col-lg-12"><br>
            <?php include("../app/conexion.php");
                $id_usuario=$_SESSION['id'];
                $sql="select *from reserva where id_usuario='".$id_usuario."'";
                $resultado=mysqli_query($conectar,$sql);
                while($fila=mysqli_fetch_assoc($resultado)){
                    $id_reserva=$fila['id_reserva'];
                    $id_evento=$fila['id_evento'];
                    $s="select * from evento where id_evento='".$id_evento."'&& fechaEvento >= CURDATE() ORDER BY fechaEvento ASC";
                    $r=mysqli_query($conectar,$s);
                    if($f=mysqli_fetch_assoc($r)){
                        if($fila['estado_pago']!="pagado") {
                ?>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" ><?php  echo $f['nombreEvento'];?> </h5>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-2">
                                    <img class="img-fluid" src="../build/img/eventos/<?php echo $f['imagen'];?>" alt="alternative">
                                </div>
                                <div class="col-lg-10">
                                <p class="card-text"><?php
                                $d=$f['Duracion'];
                                $e=$f['fechaEvento'];
                                $fin="SELECT DATE_ADD(fechaEvento, INTERVAL Duracion DAY) AS fechaFin FROM evento where id_evento='".$id_evento."'";
                                $fr=mysqli_query($conectar,$fin);
                                $frr=mysqli_fetch_row($fr);
                                echo "Fecha del Evento: ".$e." a ".$frr[0];?></p> 
                                    <p class="card-text"><?php   echo "Fecha de la reserva: ".$fila['fecha_reserva'];?></p>   
                                    <p class="card-text"><?php  
                                    $fl="SELECT DATE_ADD(fecha_reserva, INTERVAL '2' DAY) AS fechalim FROM reserva where id_reserva='".$id_reserva."'";
                                    $fli=mysqli_query($conectar,$fl);
                                $flim=mysqli_fetch_row($fli);
                                    echo "Fecha limite para adicionar tu comprobante de pago: ".$flim[0];?></p>  
                                    <?php 
                                    if($fila['estado_pago']=="pendiente") {
                                            if($f['gratuito']=="no"){?>                  
                                                <form action="save-img.php" method="post" enctype="multipart/form-data" >
                                        <label for="exampleFormControlFile1">
                                            Adiciona tu comprobante de pago
                                        </label>
                                        <input type="file" name="imagen1" >
                                        <input type="hidden" name="id_reserva" required="" value="<?php echo $id_reserva;?>">
                                        <input type="submit" value="Subir">
                                    </form>
                                    <?php
                                            }else{echo "es gratuito";}
                                    }
                                    else{
                                    echo "estado de pago: ".$fila['estado_pago'];
                                    }
                                    ?>
                                </div>                          
                            </div> 
                        </div> 
                <br>
                <?php
                    }
                }

            }  
                ?> 
            </div>
        </div>
    </div>
  
    <!--incrito-->
    <div id="inscrito" class="container">
        <br>
        <div class="row">
            <div class="col-lg-12">
            <div class="section-title">Inscrito</div>
                <?php include("../app/conexion.php");
                $id_usuario=$_SESSION['id'];
                $parti="select *from participante where id_usuario='".$id_usuario."'";
                $rp=mysqli_query($conectar,$parti);
                while($fp=mysqli_fetch_assoc($rp)){
                    $id_evento=$fp['id_evento'];
                    $sevento="select * from evento where id_evento='".$id_evento."'&& fechaEvento >= CURDATE() ORDER BY fechaEvento ASC";
                    $revento=mysqli_query($conectar,$sevento);
                    if($evento=mysqli_fetch_assoc($revento)){
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" ><?php  echo $evento['nombreEvento'];?> </h5>   
                    </div>
                    <div class="card-body row">
                        <div class="col-lg-2">
                            <img class="img-fluid" src="../build/img/eventos/<?php echo $evento['imagen'];?>" alt="alternative">
                        </div>
                        <div class="col-lg-10">
                            <p class="card-text"><?php
                                $d=$evento['Duracion'];
                                $e=$evento['fechaEvento'];
                                $fin1="SELECT DATE_ADD(fechaEvento, INTERVAL Duracion DAY) AS fechaFin FROM evento where id_evento='".$id_evento."'";
                                $fr1=mysqli_query($conectar,$fin1);
                                $frr1=mysqli_fetch_row($fr1);
                                echo "Fecha del Evento: ".$e." a ".$frr1[0];?>
                            </p>
                            <p class="card-text">Lugar: <?php
                                $id2=$evento['id_ambiente'];
                                $sq= " SELECT id_ambiente,nombre, ubicacion from ambiente where id_ambiente='$id2'";
                                $re=mysqli_query($conectar,$sq);
                                while($row1=mysqli_fetch_row($re)){
                                  if($row1[0]==$id2){
                                     echo $row1[1]." -  ".$row1[2];
                                     echo" ";
                                  }
                                  else{
      
                                  }
                                }
                            ?></p>
                        </div> 
                </div> 
                <?php
                    }
                    }
                ?> 
            </div>
        </div>
    </div>

<?php require 'includes/footer.php' ?>