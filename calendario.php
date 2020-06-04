<?php
  include_once 'includes/templates/header.php';
?>

<section class="contenedor seccion">
    <h2>Calendario de Eventos</h2>
    <?php
      try {
          require_once('includes/functions/db_connection.php');
          $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id ORDER BY evento_id";
          $result = $db_conn->query($sql); //hacer el query a la bd
        
      } catch (\Exception $error) {
          echo $error -> getMessage();
      }

      //pasos
      //1.creamos la conexion
      //2.creamos el query
      //3.consultamos a la bd con el query
      //4.obtengo (o no) los resultados
      //5.hago algo con los resultados
      //6.cierro la conexion
    ?>

    <div class="calendario">
      <?php
        $calendario = array();

        while ($eventos = $result->fetch_assoc()){
          $fecha = $eventos['fecha_evento'];

          $evento = array(
            'titulo' => $eventos['nombre_evento'],
            'fecha' => $eventos['fecha_evento'],
            'hora' => $eventos['hora_evento'],
            'categoria' => $eventos['cat_evento'],
            'invitado' => $eventos['nombre_invitado']. " " .$eventos['apellido_invitado'],
            'icono' => 'fa '. $eventos['icono']
          );
          $calendario[$fecha][] = $evento;
      ?>
      <?php
        }
      ?>
     
      <?php foreach ($calendario as $dia => $lista_eventos){ ?>
          <h3 class="fecha-calendario">
            <i class="fa fa-calendar"></i>
            <?php
              setlocale(LC_TIME, 'spanish');
              echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia)));
            ?>
          </h3>
          <?php foreach ($lista_eventos as $evento) { 

            $icono = $evento['icono'];
            
          ?>
            <div class="dia">
              <p class="titulo"> <?php echo $evento['titulo']; ?></p>
              <p class="hora"> <i class="fa fa-clock" area-hidden="true"></i> <?php echo $evento['hora'] ?></p>
              <p class="categoria"><i class= "<?php echo $icono; ?>"></i> <?php echo $evento['categoria']; ?> </p>
              <p class="invitado"><i class="fa fa-user"></i> <?php echo $evento['invitado'] ?></p>
              
            </div>
          <?php } ?>
      <?php } ?>

    </div>

    <?php
      $db_conn->close();
    ?>
</section>



<?php
  include_once 'includes/templates/footer.php';
?>