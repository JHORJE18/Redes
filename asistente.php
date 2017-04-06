<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';

    if ($_GET['accion'] != null){
        $accion = $_GET['accion'];
    }   else {
        $accion = null;
    }

    $seccion = "Asistente"?>

    <title>Central Redes Sociales | $seccion</title>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php
        include './plantilla/cabezera-body.php';
        include './plantilla/menu-lateral.php';
       ?>
      <main class="mdl-layout__content mdl-color--grey-100">

        <div class="mdl-grid demo-content">
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Asistente
          </center></div>

          <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-color--white">
            <div class="mdl-grid">
                <?php 
                switch ($accion){
                    //Por defecto
                    case null:
                        include 'asistente/intro.php';
                        break;
                    default:
                        include 'asistente/intro.php';
                        break;

                    //Instalación
                    case "moverBBDD";
                        include 'asistente/moverBBDD.php';
                        break;

                    //Añadir caracteristicas
                    case "addRS";
                        include 'asistente/addRS.php';
                        break;
                    
                    //Eliminar
                    case "delTODO":
                        include 'asistente/delTODO.php';
                        break;
                }
                ?>              
            </div>
          </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Asistente
          </center></div>
        </div>
      </main>
    </div>
  </body>
</html>
