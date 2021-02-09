
<?php
  include_once 'includes/templates/header.php';
?>
<?php 

    if (isset($_GET['pago'])){
        echo "<script>alert('Pago realizado correctamente')</script>";
    
    }

    
?>

<section class="contenedor seccion">
    <h2>La mejor conferencia de diseño web en Español</h2>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic assumenda, accusamus consequatur, nulla placeat nostrum quaerat magnam mollitia sunt quo veniam amet modi impedit beatae, inventore doloremque commodi rerum quisquam!</p>
</section>
<section class="programa">
    <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
        
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogv">

        </video>
    </div>
    <!--video-->

    <div class="contenido-programa">
        <div class="contenedor">
            <div class="programa-evento">
                <h2>Programa del evento</h2>

                <?php
                    try {
                        require_once('includes/functions/db_connection.php');
                        $sql = "SELECT * FROM categoria_evento";
                        $resultados = $db_conn->query($sql); //hacer el query a la bd
                        
                        } catch (\Exception $error) {
                        echo $error -> getMessage();
                    }
                    ?>
                <nav class="menu-programa">
                    <?php while ($categoria = $resultados->fetch_assoc()) { 
                        $href = strtolower($categoria['cat_evento']);
                        $nombre_cat = $categoria['cat_evento'];
                        $icono_cat = 'fa ' . $categoria['icono'];    
                    ?>
                    
                    <a href="#<?php echo $href ?>">
                        <i class="<?php echo $icono_cat ?>"></i>
                    <?php echo $nombre_cat ?></a>

                    <?php } ?>   
                </nav>

                <?php
                try {
                    require_once('includes/functions/db_connection.php');
                    $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = 1 ORDER BY evento_id LIMIT 2;
                    SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = 2 ORDER BY evento_id LIMIT 2;
                    SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = 3 ORDER BY evento_id LIMIT 2;";
                    $db_conn->multi_query($sql); 
                } catch (\Exception $error) {
                    echo $error -> getMessage();
                }
                ?>

                <?php 
                    do {
                        $resultado = $db_conn->store_result();
                        $row = $resultado->fetch_all(MYSQLI_ASSOC);         
                ?>
                
                <?php $i = 0; ?>
                <?php foreach ($row as $evento): ?>
                    <?php 
                        $categoria = strtolower($evento['cat_evento']);
                        $titulo = utf8_encode($evento['nombre_evento']);
                        $fecha = $evento['fecha_evento'];
                        $hora = $evento['hora_evento'];
                        $invitado = $evento['nombre_invitado'] ." ". $evento['apellido_invitado'];    
                    ?>
                    <?php if ($i % 2 == 0) { ?>
                        <div id="<?php echo $categoria ?>" class="info-curso ocultar clearfix">
                    <?php } ?>

                            <div class="detalle-evento">
                                <h3><?php echo $titulo ?></h3>
                                <p>
                                    <i class="fa fa-clock"></i> <?php echo $hora ?>
                                </p>
                                <p>
                                    <i class="fa fa-calendar"></i><?php echo $fecha ?>
                                </p>
                                <p>
                                    <i class="fa fa-user"></i> <?php echo $invitado ?>
                                </p>
                            </div>
                    <?php if ($i % 2 == 1) { ?>
                            <a href="calendario.php" class="button float-right">Ver todos</a>
                        </div>
                    <?php } ?>

                <?php $i++; ?>    
                <?php endforeach; ?>
                <?php $resultado->free(); ?>
                <?php  
                    } while ($db_conn->more_results() && $db_conn->next_result()); 
                
                ?>
            </div>
        </div>
    </div>
</section>
<!--programa-->

<?php include_once 'includes/templates/invitados.php' ?>

<div class="parallax contador">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <li>
                <p id="num_invitados" class="numero"></p> invitados
            </li>
            <li>
                <p id="num_dias" class="numero"></p> dias
            </li>
            <li>
                <p id="num_talleres" class="numero"></p> talleres
            </li>
            <li>
                <p id="num_conferencias" class="numero"></p> conferencias
            </li>
        </ul>
    </div>
</div>

<section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
        <ul class="lista-precios clearfix">
            <li>
                <div class="tabla-precio">
                    <h3>Pase por dia</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>

                    </ul>

                    <a href="#" class="button hollow">
                        Comprar
                    </a>
                </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Todos los dias</h3>
                    <p class="numero">$50</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>

                    </ul>

                    <a href="#" class="button">
                        Comprar
                    </a>
                </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Pase por 2 dias</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>

                    </ul>

                    <a href="#" class="button hollow">
                        Comprar
                    </a>
                </div>
            </li>
        </ul>
    </div>
</section>

<section class="contenedor-mapa">
    <h2>Ubicacion</h2>
    <div class="mapa" id="mapa">
</section>

</div>

<section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit explicabo alias suscipit illum ab tempora ipsa exercitationem,necessitatibus modi corporis nam dolorum id quam aperiam esse provident? Ea, provident blanditiis?</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen test">
                    <cite>
                    Osvaldo 
                    Aponte  Escobedo
                    <span>Diseñador en @prima</span>
                </cite>
                </footer>
            </blockquote>
        </div>
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit explicabo alias suscipit illum ab tempora ipsa exercitationem,necessitatibus modi corporis nam dolorum id quam aperiam esse provident? Ea, provident blanditiis?</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen test">
                    <cite>
                    Osvaldo 
                    Aponte  Escobedo
                    <span>Diseñador en @prima</span>
                </cite>
                </footer>
            </blockquote>
        </div>
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit explicabo alias suscipit illum ab tempora ipsa exercitationem,necessitatibus modi corporis nam dolorum id quam aperiam esse provident? Ea, provident blanditiis?</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen test">
                    <cite>
                    Osvaldo 
                    Aponte  Escobedo
                    <span>Diseñador en @prima</span>
                </cite>
                </footer>
            </blockquote>
        </div>
    </div>
</section>

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <p>Registrate al newsletter</p>
        <h3>GldWebCamp</h3>
        <a href="#" class="transparent button">Registro</a>
    </div>
</div>

<section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">
            <li>
                <p id="faltan_dias" class="numero">

                </p>
                dias
            </li>
            <li>
                <p id="faltan_horas" class="numero">

                </p>
                horas
            </li>
            <li>
                <p id="faltan_minutos" class="numero">

                </p>
                minutos
            </li>
            <li>
                <p id="faltan_segundos" class="numero">

                </p>
                segundos
            </li>
        </ul>
    </div>
</section>

<?php
  include_once 'includes/templates/footer.php';
?>

   