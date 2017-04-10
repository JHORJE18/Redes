<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Central Redes Sociales | Instalación</title>
    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <?php
        //Variables
        $numPasos = 6;

        //Paso de la instalación en el que estamos
        if (isset($_GET['paso'])){
            $paso = $_GET['paso'];
        } else {
            $paso = 0;
        }

        //Modo de instalación en el que estamos
        if (isset($_GET['modo'])){
            $modo = $_GET['modo'];
        } else if (isset($_POST['modo'])) {
            $modo = $_POST['modo'];
        }  else {
            $modo = 1;
        }

        //Generamos el porcentaje
        $porcentaje = ceil($paso / $numPasos * 100);
    ?>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
      <header class="demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--grey-100 mdl-color-text--grey-800">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Central Redes Sociales | Instalación</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search" disabled>
              <label class="mdl-textfield__label" for="search">No puedes buscar nada ahora...</label>
            </div>
          </div>
        </div>
      </header>
      <div class="demo-ribbon"></div>
      <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <div class="demo-crumbs mdl-color-text--grey-500">
              <h3>Instalación <?php echo $porcentaje ?>% | Paso <?php echo $paso ?> | Modo <?php echo $modo ?><br>
              <div id="porcentaje" class="mdl-progress mdl-js-progress" style="width: 100%"></div></h3>
                <script>
                document.querySelector('#porcentaje').addEventListener('mdl-componentupgraded', function() {
                    this.MaterialProgress.setProgress(<?php echo $porcentaje ?>);
                });
                </script>
            </div>
            <?php 
                if ($paso != 0){
                    include './pasos/paso'.$paso.'.php';
                } else {
                    include './pasos/principal.php';
                }
            ?>
          </div>
        </div>
        <footer class="demo-footer mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <ul class="mdl-mini-footer--link-list">
              <li><a href="http://www.floridauniversitaria.es/es-ES/Paginas/FloridaUniversitaria.aspx?Perfil=Florida%20Universitaria">Florida Universitaria</a></li>
              <li><a href="https://github.com/JHORJE18/Redes">GitHub</a></li>
              <li><a href="https://github.com/JHORJE18">Perfil GitHub</a></li>
            </ul>
          </div>
        </footer>
      </main>
    </div>
  </body>
</html>