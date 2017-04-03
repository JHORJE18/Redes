
<div class="mdl-card__supporting-text mdl-color-text--grey-600">
    <?php 
        //Mira si tiene alguna red social
              $cuantasCNX = "SELECT * FROM conexion WHERE `ID-USUARIO`= '$perfilUser[0]'";
              if ($resultado = $conexion -> query($cuantasCNX)){
                $numCNX = $resultado -> num_rows;
              }

              if ($numCNX != null){
                for ($i=0; $i<$numCNX; $i++){
                  //Muestra cada Red Social que tiene registrada
                  $red = "SELECT conexion.`LINK-PERFIL`, redes.NOMBRE  FROM conexion INNER JOIN redes WHERE `ID-USUARIO`= '$perfilUser[0]' ORDER BY `ID-USUARIO` ASC LIMIT ".$i.", 1";

                  if ($resultado = $conexion -> query($red)){
                    $valores = $resultado -> fetch_array();
                    echo '<a href="'.$valores[0].'" target="_blank"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> '.$valores[1].'</div></a>';
                  }
                }
              } else {
                echo '<span>Este usuario aún no ha registrado ninguna Red Social :(</span>';
              }
            ?> 
</div>