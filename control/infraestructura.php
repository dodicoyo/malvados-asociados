<?php require 'includes/header.php'?>
<?php
    include("../app/conexion.php");
    $sql="select *from infraestructura";
    $resultado=mysqli_query($conectar,$sql);
?>

<div class="contenedor">
    <div class="listar ">
        <h2 >Infraestructura</h2>
        <div class="botton infraestructura">
            <a href="crear-infraestructura.php" color="#000000">Nuevo Infraestructura</a>  
        </div>
    </div>
    <br/>
    <div class="tlis">
            <table  >
                <thead>
                    <tr>
                        <th data-titulo="Id:">Id</th>
                        <th data-titulo="Nombre:">Nombre</th>
                        <th data-titulo="Tipo:">Tipo</th>
                        <th data-titulo="Estado:">Estado</th>
                        <th data-titulo="Descripción:">Descripción</th>
                        <th data-titulo="Acción:">Acción</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                            while($filas=mysqli_fetch_assoc($resultado)){
                        ?>
                    <tr>
                        <td data-titulo="Id:"><?php echo $filas['id_infraestructura']?></td>
                        <td data-titulo="Nombre:"><?php echo $filas['nombre']?></td>
                        <td data-titulo="Tipo:"><?php echo $filas['tipo']?></td>
                        <td data-titulo="Estado:"><?php echo $filas['estado']?></td>
                        <td data-titulo="Descripción:"><?php echo $filas['descripcion']?></td>
                        <td data-titulo="Acción:">
                            <?php echo"<a href='editar-infraestructura.php?id_infraestructura=".$filas['id_infraestructura']."'><i id='icon' class='bi bi-pencil-square'></i></a>
                            <a href='eliminar-infraestructura.php?id_infraestructura=".$filas['id_infraestructura']."'><i  id='icon' class='bi bi-trash'></i></a>";?>
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