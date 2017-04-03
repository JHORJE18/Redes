<!doctype html>
<html lang="es">
  <head>
    <?php include './Plantilla/cabezera.php';
    $seccion = "Zona en construcción"?>

    <title>Vota | Zona en construcción</title>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php
        include './Plantilla/cabezera-body.php';
        include './Plantilla/menu-lateral.php';
       ?>
      <main class="mdl-layout__content mdl-color--grey-100">

        <div class="mdl-grid demo-content">
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Zona en contrucción
          </center></div>

          <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-color--white">
            <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--12-col"><center>
                <h1>
                  <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">build</i></button>
                  Zona aún en construcción
                  <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">build</i></button>
                </h1>
                <hr>
                <h3>La zona a la que estas intentando acceder aún esta en proceso de contrucción, por lo que tendras que tener paciencia, bueno mejor dicho, MUCHA paciencia</h3>
                <br>
                <div id="progres" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="width:100%"></div>
              </div>
            </div>
          </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Zona en contrucción
          </center></div>
        </div>
      </main>
    </div>
  </body>
</html>
