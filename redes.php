<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';
          include 'conexion.php';

    $seccion = "Redes Sociales" ?>

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
              <h1>Actualmente encntramos las siguientes redes sociales en la plataforma</h1>
              <hr>
              <?php 
                    $sql = "SELECT * FROM redes";
                    if ($resultado = $conexion -> query($sql)){
                        $redes = $resultado-> num_rows;
                    }

                    for ($i=0; $i<$redes; $i++){
                        if ($resultado = $conexion->query($sql)){
                            $objeto = $resultado-> fetch_array();
                        }

                        include 'plantilla/RedSocial.php';
                    }
              ?>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
