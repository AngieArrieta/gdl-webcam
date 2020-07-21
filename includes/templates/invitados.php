
 <section class="seccion contenedor">
   <h2>Invitados</h2>

<?php 
        try {
                require_once('../5PROYECTO_GDLWEBCAMP/includes/funciones/bd_conexion.php');//crear conexion          nombre de tabla concatenada
                $sql = " SELECT * FROM invitados ";//escribir consulta
                $resultado = $conn->query($sql);//consultamos la base -> ejecuta
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
   ?>


   <div class="calendario">
        
        <section class="invitados contenedor seccion">
          
            <ul class="lista-invitados clearfix">

                <?php  while( $invitados = $resultado->fetch_assoc() ) { ?>

                    <li>
                        <div  class="invitado">
                            <a class="invitado-info" href="#invitado<?php  echo $invitados['invitado_id']; ?>">
                                <img src="../5PROYECTO_GDLWEBCAMP/img/<?php echo $invitados['url_imagen'] ?>" alt="imagen invidado">
                                <p><?php echo $invitados['nombre_invitado']. " " . $invitados['apellido_invitado'] ?></p>
                            </a>
                        </div>
                    </li>

                    <div style="display:none;">
                        <div class="invitado-info" id="invitado<?php  echo $invitados['invitado_id']; ?>">
                             <h2> <?php  echo $invitados['nombre_invitado'] . " " .  $invitados['apellido_invitado']; ?>  </h2>
                             <img src="../5PROYECTO_GDLWEBCAMP/img/<?php echo $invitados['url_imagen'] ?>" alt="imagen invidado">
                             <p> <?php  echo $invitados['descripcion']; ?> </p>
                        </div>
                    </div>

                    <pre>
                    <?php var_dump($invitados) ?>
                    </pre>


                 <?php } ?>
         

             </ul>
        </section>

     </div>


   <?php  $conn->close();?>


 </section>
