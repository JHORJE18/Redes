<!doctype html>
<html lang="es">
  <head>
    <?php include 'plantilla/cabezera.php';
          include 'conexion.php';

          //Cual es el usuario actual?
          if (isset($_SESSION['ID'])){
            $sesion = $_SESSION['ID'];
          } else {
            $sesion = "Invitado";
          }
          
          //Obten ultima version
           $consultaV = "SELECT * FROM version ORDER BY  `version`.`ID` DESC";
              if ($resultado = $conexion -> query ($consultaV)){
                    $fila = $resultado->fetch_array();          //Mete los valores en el array $fila[]
                    $versionULTIMA = $fila[1];
              }


    $seccion = "Inicio" ?>

    <title>Central Redes Socialess | <?php echo $seccion; ?></title>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php
        include './plantilla/cabezera-body.php';
        include './plantilla/menu-lateral.php';
       ?>
      <main class="mdl-layout__content mdl-color--grey-100">

        <div class="mdl-grid demo-content">

          <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div class="mdl-grid">
              <?php include './plantilla/bienvenido.php';?>
            </div>
          </div>

          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">Central Redes Sociales</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                  En esta web puedes ver todas las redes sociales que tienen tus amigos.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="contruccion.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">Investigar mas</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                  Estadisticas
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                        <?php include './plantilla/estadisticas.php' ?>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
