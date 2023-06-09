<?php require 'includes/header.php' ?>
  <!-- Eventos -->
  <div id="services" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">Eventos</div>
                    <h2>Eventos<br> Malvados y Asociados</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
            <div class="col-lg-12">
                    <?php 
                        include("../app/conexion.php");
                        $sql="select * from evento where fechaEvento >= CURDATE() ORDER BY fechaEvento ASC";
              
                        $resultado=mysqli_query($conectar,$sql);
                        while($row=mysqli_fetch_row($resultado)){
                            //condicionar mostrar si el evento es presente y futuro no mostrar eventos pasados
                                
                        ?>
                       
                            <div class="card">
                                <div class="card-image">
                                    
                                </div>
                                <div class="card-body">
                                <img class="img-fluid" src="../build/img/eventos/<?php echo $row[5];?>" alt="alternative">
                                    <h3 class="card-title"><?php echo $row[2];?></h3>
                                    
                                    
                                    <p class="price"><span>Horario:</span><?php 
                                    $d=$row[3]-1;
                                    $e=$row[1];
                                    $fecha_inicio = DateTime::createFromFormat('Y-m-d', $e);
                                    $fecha_fin = $fecha_inicio->add(new DateInterval("P{$d}D"));
                                    $fecha_fin_1= $fecha_fin->format('Y-m-d');
                                    echo $row[1]." al ".$fecha_fin_1;?></p>
                                    <p class="price"><span>Lugar:</span><?php echo " ";
                                    $id2=$row[6];
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
                                <div class="button-container">
                                <?php echo"<a class='btn-solid-reg page-scroll'  href='detalles.php?id_evento=".$row[0]."'>Conoce mas...</a>";?>

                                    
                                </div> <!-- end of button-container -->
                            </div>
                        
                        <?php
                            
                        }
                    ?>
                   

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->
<?php require 'includes/footer.php' ?>