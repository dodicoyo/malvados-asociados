<?php require'includes/header.php' ?>

<div class="contenedor">
  <div class="botton crear">
    <a href="crear-evento.php">Crear Evento</a>
  </div>
  <div class="mes-eventos">

    <?php
    // Obtener el mes y el año actuales
    $mes = date('m');
    $anio = date('Y');

    // Si se ha enviado un nuevo mes y año por POST, utilizarlos en lugar de los valores actuales
    if (isset($_POST['mes']) && isset($_POST['anio'])) {
      $mes = $_POST['mes'];
      $anio = $_POST['anio'];
    }

    // Generar la tabla del calendario
    echo '<div id="calendario">';
    echo '<table>';
    echo '<tr><th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th></tr>';

    $primerDia = mktime(0, 0, 0, $mes, 1, $anio);
    $ultimoDia = mktime(0, 0, 0, $mes + 1, 0, $anio);
    $diaActual = 1;
    $diaSemana = date('N', $primerDia);
    $numDiasMes = date('t', $primerDia);

    echo '<tr>';
    for ($i = 1; $i <= 7; $i++) {
      if ($i < $diaSemana) {
        echo '<td></td>';
      } else {
        echo '<td>' . $diaActual . '</td>';
        $diaActual++;
      }
    }
    echo '</tr>';

    for ($semana = 2; $semana <= 5; $semana++) {
      echo '<tr>';
      for ($dia = 1; $dia <= 7; $dia++) {
        if ($diaActual > $numDiasMes) {
          echo '<td></td>';
        } else {
          echo '<td>' . $diaActual . '</td>';
          $diaActual++;
        }
      }
      echo '</tr>';
    }

    echo '</table>';
    echo '</div>';


    ?>

    <div class="name-mes">
      <?php
      // Añadir los botones para cambiar de mes
      echo '<form method="post">';
      echo '<input type="hidden" name="anio" value="' . $anio . '">';
      echo '<select name="mes">';
      $namee = "";
      for ($i = 1; $i <= 12; $i++) {
        echo '<option value="' . $i . '"';
        if ($i == $mes) {
          echo ' selected';
          $namee = $i;

        }

        echo '>' . date('F', mktime(0, 0, 0, $i, 1, $anio)) . '</option>';
      }
      echo '</select>';
      echo '<input type="submit" value="Ir">';
      echo '</form>';
      echo '<h1 class="name_meses">' . date('F', mktime(0, 0, 0, $namee, 1, $anio)) . '</h1>';
      ?>

    </div>

    <section class="colores">
      <div class="colores_principal flex">
        <div class="colores_uno"></div>
        <p> Eventos de un dia entero</p>
      </div>
      <div class="colores_principal flex">
        <div class="colores_dos"></div>
        <p>Eventos Cortos</p>
      </div>

      <div class="colores_principal flex">
        <div class="colores_tres"></div>
        <p>Sin Eventos</p>
      </div>


    </section>


  </div>
</div>



</div>

<?php require 'includes/footer.php' ?>