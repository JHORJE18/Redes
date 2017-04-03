<!doctype html>
<html lang="es">
  <head>
    <?php include './plantilla/cabezera.php';
          include './conexion.php';

    if ($_GET['user'] !=  null){
      //Quiere ver a un usuario
      $usuarioVER = $_GET['user'];
    } else if ($_SESSION['ID'] != null){
      $usuarioVER = $_SESSION['ID'];
    } 

    //Si el usuario quiere editar la pagina, muestrale lo administrativo, comprobanod que sea el mismo
    if (($_GET['edit'] != null) && ($usuarioVER = $_SESSION['ID'])){
      $editV = true;
    } else {
      $editV = false;
    }

    //Obten datos usuario
            $consuta = ("SELECT * FROM  `usuario` WHERE  `ID` =  '$usuarioVER'");
            $resultado = $conexion -> query($consuta);

                $perfilUser = $resultado->fetch_array();
              
              if ($perfilUser[5] == null){
                $perfilUser[5] = "images/user.jpg";
              }

        //Generamos nombre completo
        $usuarioCOMPLETO = $perfilUser[1].' '.$perfilUser[2];
          $seccion = $usuarioCOMPLETO;
    ?>

    <title>Central Redes Sociales | <?php echo $seccion; ?></title>
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
            Perfil: <?php echo $usuarioCOMPLETO ?>
          </center></div>

          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <a href="perfil.php?edit=1"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">build</i>Editar Perfil</div></a>
          </div>

          <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div class="mdl-grid">
              <?php
                  echo '<div class="mdl-cell mdl-cell--12-col">';
                  echo '<h1>Perfil: '.$usuarioCOMPLETO.'</h1>';
                  echo "<hr>";

            //Mostrar panel de editor
            if ($editV){
                include './usuarios/editar.php';
            } else {
              //Mostrar panel de usuarios ?>

              <span>Nombre: <?php echo $perfilUser[1] ?></span><br>
              <span>Apedillos: <?php echo $perfilUser[2] ?></span><br>
              <span>Correo: <?php echo $perfilUser[3] ?></span><br>
              <span>Fecha registro: <?php echo $perfilUser[6] ?></span><br>

              <hr>
              <h2>Redes Sociales</h2>
              
              <?php
              //Mira si tiene alguna red social
              $cuantasCNX = "SELECT * FROM conexion WHERE `ID-USUARIO`= '$perfilUser[0]'";
              if ($resultado = $conexion -> query($cuantasCNX)){
                $numCNX = $resultado -> num_rows;
              }

              if ($numCNX != null){
                for ($i=0; $i<$numCNX; $i++){
                  //Muestra cada Red Social que tiene registrada
                  $red = "SELECT conexion.`LINK-PERFIL`, redes.NOMBRE  FROM conexion INNER JOIN redes WHERE `ID-RED`= '$perfilUser[0]' ORDER BY `ID-USUARIO` ASC LIMIT ".$i.", 1";
                  echo $red;
                  if ($resultado = $conexion -> query($red)){
                    $valores = $resultado ->fetch_array();
                    echo '<a href="'.$valores[0].'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> '.$red[1].'</div></a>';
                  }
                }
              } else {
                echo '<span>Este usuario aún no ha registrado ninguna Red Social :(</span>';
              }
            }

            echo '</div>';
              ?>
            </div>
            
          </div>

          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="mdl-shadow--4dp mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <img src="<?php echo $perfilUser[5] ?>" style="width: 100%">
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">@<?php echo $usuarioCOMPLETO ?></h2>
              </div>
              <?php include './usuarios/redes.php' ?>
              <div class="mdl-card__actions mdl-card--border">
                <a href="contruccion.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">Añadir Amigo</a>
                <a href="contruccion.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">Eliminar Amigo</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop mdl-color--white">
              <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                  Estadisticas
                </div>
                <div class="mdl-cell mdl-cell--12-col">
                        <?php                     
                        include './cositas/estadisticas.php' ?>
                </div>
              </div>
            </div>
          </div>

          <div class="mdl-shadow--4dp mdl-cell mdl-cell--4-col mdl-cell--12-col mdl-color--white">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#panel-preguntas" class="mdl-tabs__tab is-active">Preguntas</a>
                <a href="#panel-amigos" class="mdl-tabs__tab">Amigos</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="panel-preguntas">
              <?php
                //Busqueda preguntas
                  for ($i=0; $i < 5; $i++) {
                    //Variables
                    $fecha = "18/02/2017";
                    $hora = "12:00";
                    $idusuario = 1;
                    $usuario = "JHORJE18";
                    $id = 20;
                    $pregunta = "¿Quien prefeririras ser de estos personajes?";
                    $opcionA = "Ser el megaSuperHEROE Hulk, capaz de destrozar todo lo que se encuentra en su camino!!";
                    $opcionB = "Ser un benito señor que lo sabe todo, pero no existe en este universo";

                    include './Plantilla/busqueda-preguntas.php';
                  }
              ?>
            </div>

            <div class="mdl-tabs__panel" id="panel-amigos">
              <?php
                  //Busqueda usuarios
                  for ($i=0; $i < 10; $i++) {
                    //Variables
                    $fecha = "18/02/2017";
                    $hora = "12:00";
                    $idusuario = 1;
                    $usuario = "JHORJE18";
                    $id = 20;
                    $pregunta = "¿Quien prefeririras ser de estos personajes?";
                    $opcionA = "Ser el megaSuperHEROE Hulk, capaz de destrozar todo lo que se encuentra en su camino!!";
                    $opcionB = "Ser un benito señor que lo sabe todo, pero no existe en este universo";

                    include './Plantilla/busqueda-usuarios.php';
                  }
              ?>
            </div>
          </div>
          </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Perfil: <?php echo $usuarioCOMPLETO ?>
          </center></div>
        </div>
      </main>
    </div>
  </body>
</html>
