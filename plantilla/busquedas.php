<div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-color--white">
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
      <span style="float:right"><?php echo $fecha; ?></span>
      <a href="perfil.php?user=<?php echo $idUser ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">account_box</i>
      @<?php echo $nombreCompleto; ?>  </div></a>
      <hr>
    </div>

    <div class="mdl-cell mdl-cell--4-col mdl-shadow--4dp" style="padding: 5px;">
      <img src="<?php echo $imagen ?>"  style="width: 100%">
    </div>
    <div class="mdl-cell mdl-cell--4-col mdl-shadow--4dp" style="padding: 5px;background-color:blue; color:white">
      <?php
        //Redes sociales
              //Mira si tiene alguna red social
              $cuantasCNX = "SELECT * FROM conexion WHERE `ID-USUARIO`= '$idUser'";
              if ($resultado = $conexion -> query($cuantasCNX)){
                $numCNX = $resultado -> num_rows;
              }

              if ($numCNX != null){
                for ($i=0; $i<$numCNX; $i++){
                  //Muestra cada Red Social que tiene registrada
                  $red = "SELECT conexion.`LINK-PERFIL`, redes.NOMBRE FROM conexion INNER JOIN redes ON redes.`ID-RED`= conexion.`ID-RED` WHERE conexion.`ID-USUARIO`= '$idUser' ORDER BY `ID-USUARIO` ASC LIMIT ".$i.", 1";

                  if ($resultado = $conexion -> query($red)){
                    $valores = $resultado -> fetch_array();
                    echo '<a href="'.$valores[0].'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> '.$valores[1].'</div></a><br>';
                  }
                }
              } else {
                echo '<span>Este usuario aún no ha registrado ninguna Red Social :(</span>';
              }
      ?>
    </div>
    <div class="mdl-cell mdl-cell--4-col">
      <a href="pregunta.php?ID=<?php echo $id; ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> #<?php echo $id; ?></div></a>
      <a href="construccion.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">bookmark_border</i> #Prueba</div></a>
    </div>
  </div>
</div>
