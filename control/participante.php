<?php require 'includes/header.php';
 include("../app/conexion.php");    
    $sql="select *from participante";
    $resultado=mysqli_query($conectar,$sql);$sw=1;?>
<div class="contenedor">
    <div class="listar ">
        <h2 >Participante</h2>
    </div>
    <br/>
    <div class="tlis" style="
    max-height: 40rem;
    overflow: scroll;
">
            <table  >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Identidad:">Identidad</th>
                        <th data-titulo="Evento:">Evento</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                            while($filas=mysqli_fetch_assoc($resultado)){
                                $s="select * from usuario where id_usuario='".$filas['id_usuario']."'";
                                $r=mysqli_query($conectar,$s);
                                $f=mysqli_fetch_assoc($r);
                                $sqle="select * from evento where id_evento='".$filas['id_evento']."'";
                                $re=mysqli_query($conectar,$sqle);
                                $fe=mysqli_fetch_assoc($re);
                            ?>
                    <tr>

                        <td data-titulo="Id:"><?php echo $sw?></td>
                        <td data-titulo="Nombre:"><?php echo $f['nombre']." ".$f['apPaterno']." ".$f['apMaterno'];?></td>
                        <td data-titulo="Identidad:"><?php echo $f['identidad']?></td>
                        <td data-titulo="Evento:"><?php echo $fe['nombreEvento']?></td>
                    </tr>
                    <?php
                $sw=$sw+1;    
                }
                    ?>
                </tbody>
            </table>
            <?php
                mysqli_close($conectar);
            ?>
         </div>
    </div>
</div>

<?php require 'includes/footer.php' ?>