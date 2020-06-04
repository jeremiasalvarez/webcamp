
<?php
  include_once 'includes/templates/header.php';
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

                <nav class="menu-programa">
                    <a href="#talleres"><i class="fa fa-code"></i>Talleres</a>
                    <a href="#conferencias"><i class="fa fa-comment"></i>Conferencias</a>
                    <a href="#seminarios"><i class="fa fa-university"></i>Seminarios</a>
                </nav>


                <div id="talleres" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">
                        <h3>HTML5, CSS3, JavaScript</h3>
                        <p>
                            <i class="fa fa-clock"></i> 16:00hrs
                        </p>
                        <p>
                            <i class="fa fa-calendar"></i>18 de Diciembre de 2020
                        </p>
                        <p>
                            <i class="fa fa-user"></i> Juan Pedro Gonzalez
                        </p>
                    </div>

                    <div class="detalle-evento">
                        <h3>Responsive Web Desing</h3>
                        <p>
                            <i class="fa fa-clock"></i> 19:00hrs
                        </p>
                        <p>
                            <i class="fa fa-calendar"></i>18 de Diciembre de 2020
                        </p>
                        <p>
                            <i class="fa fa-user"></i> Jose Pereira
                        </p>
                    </div>

                    <a href="calendario.php" class="button float-right">Ver todos</a>
                </div>
                <div id="conferencias" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">
                        <h3>Como ser Freelancer</h3>
                        <p>
                            <i class="fa fa-clock"></i> 15:00hrs
                        </p>
                        <p>
                            <i class="fa fa-calendar"></i>18 de Diciembre de 2020
                        </p>
                        <p>
                            <i class="fa fa-user"></i> Juan Pedro Gonzalez
                        </p>
                    </div>

                    <div class="detalle-evento">
                        <h3>Tips para crear tu primera Web</h3>
                        <p>
                            <i class="fa fa-clock"></i> 19:00hrs
                        </p>
                        <p>
                            <i class="fa fa-calendar"></i>19 de Diciembre de 2020
                        </p>
                        <p>
                            <i class="fa fa-user"></i> Jose Pereira
                        </p>
                    </div>

                    <a href="calendario.php" class="button float-right">Ver todos</a>
                </div>
                <div id="seminarios" class="info-curso ocultar clearfix">
                    <div class="detalle-evento">
                        <h3>Diseño UX/UI</h3>
                        <p>
                            <i class="fa fa-clock"></i> 16:00hrs
                        </p>
                        <p>
                            <i class="fa fa-calendar"></i>19 de Diciembre de 2020
                        </p>
                        <p>
                            <i class="fa fa-user"></i> Juan Pedro Gonzalez
                        </p>
                    </div>

                    <div class="detalle-evento">
                        <h3>Diseño para Moviles</h3>
                        <p>
                            <i class="fa fa-clock"></i> 19:00hrs
                        </p>
                        <p>
                            <i class="fa fa-calendar"></i>18 de Diciembre de 2020
                        </p>
                        <p>
                            <i class="fa fa-user"></i> Jose Pereira
                        </p>
                    </div>

                    <a href="calendario.php" class="button float-right">Ver todos</a>
                </div>
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

   