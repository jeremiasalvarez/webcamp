<?php
  include_once 'includes/templates/header.php';
?>

<section class="contenedor seccion">
    <h2>Calendario de Eventos</h2>
    <?php
    
      try {
          require_once('includes/functions/db_connection.php');
          $sql = "SELECT * FROM eventos where clave='sem_05'";
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
        while ($eventos = $result->fetch_assoc()){
      ?>
        <pre>
            <?php
            
              print_r($eventos);
            ?>
        </pre>
      <?php
        }
      ?>
    </div>

    <?php
      $db_conn->close();
    ?>
</section>



<?php
  include_once 'includes/templates/footer.php';
?>