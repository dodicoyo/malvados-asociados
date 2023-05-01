<?php require 'includes/header.php' ?>
<!-- Detalles 1 -->
<?php include("../app/conexion.php");?>
<?php
        if(isset($_GET['id_evento'])){
            $id=$_GET['id_evento'];
            $sql="select *from evento where id_evento='".$id."'";
            $resultado=mysqli_query($conectar,$sql);
            $fila=mysqli_fetch_assoc($resultado);
            $id_evento=$fila["id_evento"];
            $nombre=$fila["nombreEvento"];
            $descripcion=$fila["descripcion"];
            $fechaEvento=$fila["fechaEvento"];
            $imagen=$fila["imagen"];
            $duracion=$fila["Duracion"];
            $id_ambiente=$fila["id_ambiente"];
        }
        else{
            echo "no lo capto";
        }
       
        ?>
<div id="details" class="accordion">    	
        
        <div class="area-1" style="background: url('../build/img/participante/<?php echo $imagen;?>') center center no-repeat;">
       <!-- <h2><?php echo $nombre;?></h2>-->
		</div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">
            
            <!-- Accordion -->
            <div class="accordion-container" id="accordionOne">
                <h2><?php echo $nombre;?></h2>
                <p><?php echo $descripcion;?></p>
                
                    <p class="price"><span>Horario:</span><?php echo $fechaEvento;?></p>
                    <span>Lugar:</span>
                    <?php echo " ";
                          $id2=$id_ambiente;
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
                                   
                                    ?>
                    </p>
                    <?php echo"<a class='btn-solid-reg page-scroll'  href='reserva.php?id_evento=".$id."'>Reserva</a>";?>
                    
   
            </div> <!-- end of accordion-container -->
            <!-- end of accordion -->

		</div> <!-- end of area-2 -->
    </div> <!-- end of accordion -->
                                </div>   <!-- end of details 1 -->
<!-- Team -->
<div class="basic-2">
  <?php
  $ex="select *from horarioevento where id_evento='".$id."'";
  $devuelve=mysqli_query($conectar,$ex);
  ?>

  
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <h2>Expositores</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            
            <div class="row">
            
                <div class="col-lg-12">
                <?php while($row=mysqli_fetch_row($devuelve))
                  {
                    $devu="select *from expositor where id_expositor='".$row[2]."'";
                    $r=mysqli_query($conectar,$devu);
                    $f=mysqli_fetch_assoc($r);
                    $u=$f["id_usuario"];
                    $d="select *from usuario where id_usuario='".$u."'";
                    $r1=mysqli_query($conectar,$d);
                    $f1=mysqli_fetch_assoc($r1);
                    
                    ?>
                    <!-- Team Member -->
                    <div class="team-member">
                    
                        <div class="image-wrapper">
                            <img class="img-fluid" src="../build/img/expositor/<?php echo $f1["foto"];?>" alt="alternative">
                        </div> <!-- end of image-wrapper -->
                          <p class="p-large"><?php echo $f["grado"]." ".$f1["nombre"]." ".$f1["apPaterno"]." ".$f1["apMaterno"] ;?></p>
                            <p class="job-title"><?php echo $row[3]?></p>
                          <p class="job-title"><?php echo $f["descripcion"];?></p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->
                    <?php
                  }
              ?> 
                </div> <!-- end of col -->
                 
            </div> <!-- end of row -->
            
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of team -->

<?php require 'includes/footer.php' ?>