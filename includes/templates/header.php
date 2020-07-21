<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" /> 
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">

  <!-- Place favicon.ico in the root directory -->

  <?php  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace('.php','',$archivo);
  if(pagina == 'invitados' || pagina == 'index' ){
  echo '<link rel="stylesheet" href="../5PROYECTO_GDLWEBCAMP/css/colorbox.css">';
  }else if($pagina == 'conferencia'){
    echo '<link rel="stylesheet" href="../5PROYECTO_GDLWEBCAMP/css/lightbox.css">';
  }
  ?>
  
  <!--<link rel="stylesheet" href="../5PROYECTO_GDLWEBCAMP/css/colorbox.css">-->
  <link rel="stylesheet" href="../5PROYECTO_GDLWEBCAMP/css/normalize.css">
  <link rel="stylesheet" href="../5PROYECTO_GDLWEBCAMP/css/fontawesome-all.min.css">
  <!--cargando fontawesome-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="../5PROYECTO_GDLWEBCAMP/css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
</head>

<body class="<?php echo $pagina ?>">

  <!-------------------------------------------------------------------->

  <!-------HEADER-------->
  <header class="side-header">
    <div class="hero">

      <div class="contenido-header">
        <!--todo el contenido del header-->
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>

      <div class="informacion-evento">
        <div class="clearfix">
          <p class="fecha"><i class="fas fa-calendar-alt"></i>10-12 Dic</p>
          <p class="ciudad"> <i class="fas fa-map-marker-alt"></i>Barranquilla, CO</p>
        </div>
        <!--fin claerfix-->
        <h1 class="nombre-sitio">GDLWEBCAMP</h1>
        <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
      </div>
      <!--Informacion eventp-->


    </div>
    <!--hero, solo la imagen-->
  </header>


  <!-------BARRA-------->
  <div class="barra">
    <!--fondo seccion-->
    <div class="contenedor clearfix">
      <!--margen-->

      <div class="logo">
       <a href="../../5PROYECTO_GDLWEBCAMP/index.php">
        <img src="../5PROYECTO_GDLWEBCAMP/img/logo.svg" alt="logo GDLWEBCAMP">
       </a>
      </div>
      <!--fin logo-->

      <div class="menu-movil">
        <!--Menu de hamburguesa-->
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal">
        <a class="conferencia"   href="../5PROYECTO_GDLWEBCAMP/conferencia.php">Conferencia</a>
        <a href="../5PROYECTO_GDLWEBCAMP/calendario.php">Calendario</a>
        <a href="../5PROYECTO_GDLWEBCAMP/invitados.php">Invitados</a>
        <a href="../5PROYECTO_GDLWEBCAMP/Registro.php">Reservaciones</a>
      </nav>

    </div>
    <!--fin contenedor-->
  </div>
  <!--fin fondo gris-->
