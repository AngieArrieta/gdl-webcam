

  <!-----------------------HEADER-------------------->

  <?php include_once '../5PROYECTO_GDLWEBCAMP/includes/templates/header.php'; ?>

  <!-----------------------CONTENIDO-------------------->

  <!--Seccion del contenido SECCION1-->

  <section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, ducimus consequatur eveniet quisquam quis
      velit excepturi quod accusantium officiis cupiditate assumenda, sapiente eius reiciendis veritatis iste
      reprehenderit blanditiis placeat dicta!</p>
  </section>

  <!--Seccion del contenido 1-->
  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop muted poster="../PROYECTO_GDLWEBCAMP/img/bg-talleres.jpg">
        <source src="../5PROYECTO_GDLWEBCAMP/video/video.mp4" type="video/mp4">
        <source src="../5PROYECTO_GDLWEBCAMP/video/video.webm" type="video/webm">
        <source src="../5PROYECTO_GDLWEBCAMP/video/video.ogv" type="video/ogg">
      </video>

    </div>


    <!--seccion programa-->
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>
          <?php 
           try {
            require_once('../5PROYECTO_GDLWEBCAMP/includes/funciones/bd_conexion.php');//crear conexion          nombre de tabla concatenada
            $sql = " SELECT * FROM categoria_evento ";//escribir consulta
            $resultado = $conn->query($sql);//consultamos la base -> ejecuta
              } catch (\Exception $e) {
                  echo $e->getMessage();
              }
          ?>
          <nav class="menu-programa">
              <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ 
                $categoria=$cat['cat_evento'] ;?>
            <a href="#<?php echo strtolower($categoria) ?>">
            <i class="fa <?php echo $cat['icono'] ?>"></i> <?php echo $categoria ?>
            </a>
          <?php } ?>
          </nav>

         
          <?php  //nueva consulta

            //pasos que SIEMPRE hay que hacer para conectar una base de datos IMPORTANTE728
            try {
              //code...
                require_once('../5PROYECTO_GDLWEBCAMP/includes/funciones/bd_conexion.php');//crear conexion          nombre de tabla concatenada
                $sql = "SELECT evento_id, nombre_evento, fecha_evento , hora_evento , cat_evento,icono , nombre_invitado, apellido_invitado ";//escribir consulta
                $sql.= " FROM eventos ";//concatenando
                $sql.= " INNER JOIN categoria_evento ";//uniendo las tablas
                $sql.= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";//iguales ON-COMUN
                $sql.= " INNER JOIN invitados ";//uniendo las tablas
                $sql.= " ON eventos.id_inv = invitados.invitado_id ";//iguales
                $sql.= " AND eventos.id_cat_evento = 1"  ;   
                $sql.= " ORDER BY evento_id LIMIT 2";//ordenarlo por id
                $resultado = $conn->query($sql);//consultamos la base -> ejecuta
            } catch (\Exception $e) {
              //throw $th;
              echo $e->getMessage();
            }

            ?>

            <?php  $eventos = $resultado->fetch_assoc() ?>
            <pre>
              <?php  var_dump($eventos);?>
            </pre>
          





          <!--talleres-->
          <div id="talleres" class="info-curso ocultar clearfix">

            <div class="detalle-evento">
              <h3>HTML5, CSS3 y JavaScript</h3>
              <p><i class="far fa-clock"></i> 16:00 hrs</p>
              <p><i class="fa fa-calendar"></i> 10 de Dic</p>
              <p><i class="fa fa-user"></i> Juan Pablo De la torre Valdez</p>
            </div>

            <div class="detalle-evento">
              <h3>Responsive Web Design</h3>
              <p><i class="far fa-clock"></i> 20:00 hrs</p>
              <p><i class="fa fa-calendar"></i> 10 de Dic</p>
              <p><i class="fa fa-user"></i> Juan Pablo De la torre Valdez</p>
            </div>

            <a href="#" class="button float-right">Ver todos</a>
          </div>

          <!------------->
          <div id="conferencias" class="info-curso ocultar clearfix">

            <div class="detalle-evento">
              <h3>Como ser freelancer</h3>
              <p><i class="far fa-clock"></i> 10:00 hrs</p>
              <p><i class="fa fa-calendar"></i> 10 de Dic</p>
              <p><i class="fa fa-user"></i>Gregorio Sanchez</p>
            </div>

            <div class="detalle-evento">
              <h3>Tecnologias del futuro</h3>
              <p><i class="far fa-clock"></i> 17:00 hrs</p>
              <p><i class="fa fa-calendar"></i> 10 de Dic</p>
              <p><i class="fa fa-user"></i>sSusan Sanchez</p>
            </div>

            <a href="#" class="button float-right">Ver todos</a>
          </div>

           <!------------->
          <div id="seminarios" class="info-curso ocultar clearfix">

            <div class="detalle-evento">
              <h3>Diseño UI/UX para moviles</h3>
              <p><i class="far fa-clock"></i> 17:00 hrs</p>
              <p><i class="fa fa-calendar"></i> 11 de Dic</p>
              <p><i class="fa fa-user"></i> Harold Garcia</p>
            </div>

            <div class="detalle-evento">
              <h3>Aprende a programar en una mañana</h3>
              <p><i class="far fa-clock"></i> 10:00 hrs</p>
              <p><i class="fa fa-calendar"></i> 11 de Dic</p>
              <p><i class="fa fa-user"></i> Susana Rivera</p>
            </div>

            <a href="#" class="button float-right">Ver todos</a>
          </div>


        </div>
      </div>
    </div>
  </section>
  <!--Seccion del contenido (SECCION)2-->

  <?php include_once '../5PROYECTO_GDLWEBCAMP/includes/templates/invitados.php'; ?>

  <!--Seccion del contenido 2-->
  <div class="contador parallax">
    <div class="contenedor clearfix">
      <ul class="resumen-evento">
        <li>
          <p class="numero"></p>Invitados
        </li>
        <li>
          <p class="numero"></p>Talleres
        </li>
        <li>
          <p class="numero"></p>Dias
        </li>
        <li>
          <p class="numero"></p>Conferencias
        </li>
      </ul>
    </div>
  </div>

  <!--Seccion del contenido (SECCION)3-----------tabla de precios-->
  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">

        <li>
          <div class="tabla-precio">
            <h3>Pase por dia</h3>
            <p class="numero">$30</p>
            <ul>
              <li> <span> <i class="fas fa-check"></i> </span> Bocadillo Gratis.</li>
              <li><span> <i class="fas fa-check"></i> </span> Todas las conferencias.</li>
              <li><span> <i class="fas fa-check"></i> </span> Todos los talleres.</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>

        </li>

        <li>
          <div class="tabla-precio">
            <h3>Todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li> <span> <i class="fas fa-check"></i> </span> Bocadillo Gratis.</li>
              <li><span> <i class="fas fa-check"></i> </span> Todas las conferencias.</li>
              <li><span> <i class="fas fa-check"></i> </span> Todos los talleres.</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>

        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por dos dias</h3>
            <p class="numero">$45</p>
            <ul>
              <li> <span> <i class="fas fa-check"></i> </span> Bocadillo Gratis.</li>
              <li><span> <i class="fas fa-check"></i> </span> Todas las conferencias.</li>
              <li><span> <i class="fas fa-check"></i> </span> Todos los talleres.</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>

        </li>

      </ul>
    </div>
  </section>

  <!--Seccion mapa-->

  <div id="mapa" class="mapa">

  </div>

  <!--TESTIMONIOS-->
  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <!--t1-->
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime in nihil doloribus cupiditate rem omnis
            quae laudantium, modi dolores placeat ipsa et, architecto minima quod perspiciatis asperiores odit
            laboriosam
            quas.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
          </footer>
        </blockquote>
      </div>

      <!--t2-->
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime in nihil doloribus cupiditate rem omnis
            quae laudantium, modi dolores placeat ipsa et, architecto minima quod perspiciatis asperiores odit
            laboriosam
            quas.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
          </footer>
        </blockquote>
      </div>

      <!--t3-->
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime in nihil doloribus cupiditate rem omnis
            quae laudantium, modi dolores placeat ipsa et, architecto minima quod perspiciatis asperiores odit
            laboriosam
            quas.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
          </footer>
        </blockquote>
      </div>
    </div>
  </section>

  <!--REGISTRO PARALLAX-->
  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Registrate al newsletter</p>
      <h3>GDLWEBCAMP</h3>
      <a href="#" class="button transparente">Registro</a>
    </div>
  </div>

  <!-------CUENTA REGRESIVA--------->
  <section class="seccion">
    <h2>faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li>
          <p id="dias" class="numero"></p> Días
        </li>
        <li>
          <p id="horas" class="numero"></p> Horas
        </li>
        <li>
          <p id="minutos" class="numero"></p> Minutos
        </li>
        <li>
          <p id="segundos" class="numero"></p> Segundos
        </li>
      </ul>
    </div>
  </section>


 
  <!-----------------------FOOTER-------------------->


  <?php include_once '../5PROYECTO_GDLWEBCAMP/includes/templates/footer.php'; ?>









  <!--------------------------------extensiones------------------------------------>
 
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"></script>')</script>
  <script src="js/plugins.js"></script>
  <script src="../5PROYECTO_GDLWEBCAMP/js/vendor/jquery.animateNumbre.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
  <script src="../5PROYECTO_GDLWEBCAMP/js/main.js"></script>
  <script src="../5PROYECTO_GDLWEBCAMP/js/vendor/jquery.countdown.min.js"></script>
  <script src="../5PROYECTO_GDLWEBCAMP/js/vendor/jquery.lettering.js"></script>
  <script src="../5PROYECTO_GDLWEBCAMP/js/jquery.colorbox-min.js"></script>
  <!--ESCRIBIR NUESTRO CODIGO-->

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>