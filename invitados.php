<?php
  include_once 'includes/templates/header.php';
?>

    <?php
      try {
          require_once('includes/functions/db_connection.php');
          $sql = "SELECT * FROM invitados";
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

    
    <section class="invitados contenedor seccion">
        <h2>Nuestros invitados</h2>
        <ul class="clearfix lista-invitados">
      <?php 
        while ($invitado = $result->fetch_assoc()){ 
            
            $nombre = $invitado['nombre_invitado'];
            $apellido = $invitado['apellido_invitado'];
            $url_imagen = $invitado['url_imagen'];
            $descripcion = $invitado['descripcion'];
            $invitado_id = $invitado['invitado_id'];
      ?>

        <li class="invitado">
            <a class="invitado-info" href="#invitado<?php echo $invitado_id; ?>">
                <img src="img/<?php echo $url_imagen; ?>" alt="invitado">
                <p><?php echo $nombre. " " .$apellido; ?></p>
            </a>
        </li>
        <div style="display: none;">
            <div class="invitado-info invitado-colorbox" id="invitado<?php echo $invitado_id; ?>">
                <h2><?php echo $nombre . " " .$apellido ?></h2>
                <img src="img/<?php echo $url_imagen; ?>" alt="invitado">
                <p><?php echo $descripcion; ?></p>
            </div>
        </div> 
      <?php
        }
      ?>
         </ul>
    </section>
  
    <?php
      $db_conn->close();
    ?>




<?php
  include_once 'includes/templates/footer.php';
?>