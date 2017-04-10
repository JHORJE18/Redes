<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

      //Obten lo que esta buscando
      if (isset($_REQUEST['buscar'])) {
        $busca = $_REQUEST['buscar'];
        $seccion = "Busqueda: ".$busca;
      }  else if (isset ($_GET['busca'])) {
        $busca = $_GET['busca'];
        $seccion = "Busqueda: ".$busca;
      } else {
        $busca = null;
        $seccion = "Buscando nada";
      }

      //Limito la busqueda
      $TAMANO_PAGINA = 10;

      //Examino la pagina a mostrar
      if (isset($_GET['pag'])){
        $pagina = $_GET['pag'];
      } else {
        $pagina = null;
      }
      if (!$pagina){
        $inicio = 0;
        $pagina = 1;
      } else  {
        $inicio = ($pagina -1) * $TAMANO_PAGINA;
      }

      //Miro numero de campos
      if ($busca != null){
        $valor = "%".$busca."%";
        $consultaCAMPOS = "SELECT * FROM usuario WHERE CONCAT( NOMBRE, \" \", APEDILLOS, \" \", CORREO) LIKE '%$valor%'";
                  if ($resultado = $conexion -> query($consultaCAMPOS)){
                      //Determinamos numero tablas
                      $num_total_reg = $resultado -> num_rows;
                  }
        //Calculo total de paginas
        $total_paginas = ceil($num_total_reg / $TAMANO_PAGINA);
      } else  {
        $total_paginas = 1;
      }

      include './plantilla/cabezera.php';
      ?>



    <title>YT Subs | <?php echo $seccion; ?></title>
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
            Buscando: <?php if ($busca != null) {echo $busca;} else { echo "a la nada";} ?>
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
        <?php
    if ($busca != null){
         //Sentencia SQL
        $criterio = "ORDER BY NOMBRE ASC";
        $maxREG = $inicio + $TAMANO_PAGINA;
        while ($inicio < $maxREG){
              $consulta = "SELECT * FROM usuario WHERE CONCAT( NOMBRE, \" \", APEDILLOS, \" \", CORREO) LIKE '%$valor%' ".$criterio." limit ".$inicio.",".$TAMANO_PAGINA;
              if ($resultado = $conexion -> query($consulta)){
                    $obj = $resultado->fetch_array();          //Mete los valores en el array $fila[]
                    if ($obj != null){
                      //Asignamos valores
                      $fecha = $obj[6];
                      $nombreCompleto = $obj[1].' '.$obj[2];
                      $idUser = $obj[0];
                      $imagen = $obj[5];

                      include 'plantilla/busquedas.php';
                    }
              }
              $inicio++;
        }
    } else {
      echo '<center><h1>Oye tu, que yo sepa, no estas buscando nada :/</h1></center>';
    }
             ?>
    </div>

<?php 
    if ($busca != null){  ?>
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
            <span>  Pagina</span> <?php
                      for ($i=1; $i<=$total_paginas; $i++){
                        //Muestra botones
                        echo '<a href="./buscar.php?pag='.$i.'&busca='.$busca.'"><div class="mdl-button mdl-js-button mdl-js-ripple-effect';
                          if ($i != $pagina){
                            echo ' mdl-button--accent">'.$i.'</div></a>';
                          } else {
                            echo 'mdl-button--raised mdl-button--colored">'.$i.'</div></a>';
                          }
                      }

                    ?>
          </div>
  
  <?php 
    } ?>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Buscando: <?php if ($busca != null) {echo $busca;} else { echo "a la nada";} ?>
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>
