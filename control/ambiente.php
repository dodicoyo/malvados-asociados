<?php require'includes/header.php'?>
<?php
    include("../app/conexion.php");
    $sql="select *from Ambiente";
    $resultado=mysqli_query($conectar,$sql);
?>

<div class="contenedor">
    <div class="listar ">
        <h2 >Ambiente</h2>
        <div class="botton infraestructura">
            <a href="crear-ambiente.php">Nuevo Ambiente</a>
        </div>
    </div>
    <br/>
    <div class="tlis">
            <table >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Descripcion:">Descripción</th>
                        <th data-titulo="Capacidad:">Capacidad</th>
                        <th data-titulo="Ubicación:">Ubicación</th>
                        <th data-titulo="Tipo:">Tipo</th>
                        <th data-titulo="Equipamiento:">Equipamiento</th>
                        <th data-titulo="Acción:">Accion</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                            while($filas=mysqli_fetch_assoc($resultado)){
                        ?>
                    <tr>
                        <td data-titulo="Id:"><?php echo $filas['id_ambiente']?></td>
                        <td data-titulo="Nombre:"><?php echo $filas['nombre']?></td>
                        <td data-titulo="Descripción:"><?php echo $filas['descripcion']?></td>
                        <td data-titulo="Caacidad:"><?php echo $filas['capacidad']?></td>
                        <td data-titulo="Ubicación:"><?php echo $filas['ubicacion']?></td>
                        <td data-titulo="Tipo:"><?php echo $filas['tipo']?></td>
                        <td data-titulo="Equipamiento:"><?php 
                            $id2=$filas['id_ambiente'];
                          $sq= " SELECT ambiente.id_ambiente AS nombre_ambiente, infraestructura.nombre AS nombre_infraestructura FROM ambiente INNER JOIN equipamiento ON ambiente.id_ambiente = equipamiento.id_ambiente INNER JOIN infraestructura ON equipamiento.id_infraestructura = infraestructura.id_infraestructura ORDER BY ambiente.id_ambiente;";
                          $re=mysqli_query($conectar,$sq);
                          while($fil=mysqli_fetch_assoc($re)){
                            if($fil['nombre_ambiente']==$id2){
                               echo $fil['nombre_infraestructura'];
                               echo" ";
                            }
                            else{

                            }
                          }
                         

                        ?></td>
                        <td data-titulo="Acción:">
                            <?php echo"<a href='editar-ambiente.php?id_ambiente=".$filas['id_ambiente']."'><i id='icon' class='bi bi-pencil-square'></i></a>"; ?>
                            <?php echo"<a href='eliminar-ambiente.php?id_ambiente=".$filas['id_ambiente']."'><i  id='icon' class='bi bi-trash'></i></</a>";?>
                        </td>

                    </tr>
                    <?php
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