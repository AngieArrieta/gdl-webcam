 <!-----------------------HEADER-------------------->

 <?php include_once '../5PROYECTO_GDLWEBCAMP/includes/templates/header.php'; ?>

<!-----------------------CONTENIDO-------------------->


 <section class="seccion contenedor">
   <h2>Calendario de eventos</h2>

   <?php 

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
                //general.nombre_genera = otra.nombre_otra !!!!!!!!!todo esto para que no traiga el id si no los valores
        $sql.= " ORDER BY evento_id";//ordenarlo por id
        $resultado = $conn->query($sql);//consultamos la base -> ejecuta

        
   } catch (\Exception $e) {
       //throw $th;
       echo $e->getMessage();
   }

   ?>


   <div class="calendario">
        <?php  
            $calendario  = array();
        //while para que muestre todos los resultados
              while( $eventos = $resultado->fetch_assoc() ) {//imprime resultados -- formato  --- fetch evalua
                    $fecha = $eventos['fecha_evento'];

                    $evento = array(//formatear el arreglo a mi manera para agrupar
                    'titulo' => $eventos['nombre_evento'],
                    'fecha'=> $eventos['fecha_evento'],
                    'hora'=> $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => 'fa' . ' ' . $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado']. " " . $eventos['apellido_invitado']
                    );
                $calendario[$fecha][] = $evento;
             }?>



            <!--imprimir todos los eventos-->
            <?php
            //foreach funcion destinada para recorrer arreglos en php
            //$variable as $key => $value
             foreach($calendario as $dia => $lista_eventos){ //recorre el calendario separandolo por dias con un valor de arreglo?>
                    <h3>
                        <i class="fa fa-calendar" ></i>
                        <?php
                        setlocale( LC_TIME, 'spanish');
                        echo strftime("%A, %d de %B del %Y ",strtotime($dia)); ?>
                    </h3>

                    <?php  foreach ($lista_eventos as $evento) { //recorre el array de la lista de eventos por cada dia, cotiene cada titulo etc...para poder imprimir ?>
                        <div class="dia">

                            <p class="titulo"><?php echo $evento['titulo'] ?></p>

                            <p class="hora"> <i class="far fa-clock" aria-hidden="true"></i> <?php echo $evento['fecha']  . " " . $evento['hora'] ?></p>

                            <p>
                            <i class="<?php echo $evento['icono']?>" aria-hidden="true"></i>
                            <?php echo $evento['categoria'] ?></p>

                            <p>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo $evento['invitado'] ?></p>

                         </div>

                     <?php } ?>

                 <?php } ?>

     </div>


   <?php  $conn->close();//se cierra la conexion ?>

                        <!--
                     <pre>
                         < ?php var_dump($calendario)?>
                     </pre>-->



 </section>



 <!-----------------------FOOTER-------------------->


 <?php include_once '../5PROYECTO_GDLWEBCAMP/includes/templates/footer.php'; ?>















 <!-------------------------------------------------------------------->
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
 <script src="../5PROYECTO_GDLWEBCAMP/js/lightbox.js"></script>
 <!--ESCRIBIR NUESTRO CODIGO-->

 <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
 <script>
   window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
   ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
 </script>
 <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>