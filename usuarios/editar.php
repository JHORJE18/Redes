<?php

    //Vamos a editar datos
    if ($_REQUEST['editar'] != null){

        //Cambiar nombre
        if ($_REQUEST['nombre']){
            $nombre = $_REQUEST['nombre'];
            $sql = "UPDATE `usuarios` SET `NOMBRE` = '$nombre' WHERE `usuario`.`ID` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."El nombre ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."El nombre no se ha podido cambiar correctamente <br>";
            }
        }

        //Cambiar apedillo
        if ($_REQUEST['apedillo']){
            $apedillo = $_REQUEST['apedillo'];
            $sql = "UPDATE `usuarios` SET `APEDILLOS` = '$apedillo' WHERE `usuario`.`ID` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."El apedillo ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."El apedillo no se ha podido cambiar correctamente <br>";
            }
        }

        //Cambiar foto
        if ($_REQUEST['foto']){
            $foto = $_REQUEST['foto'];
            $sql = "UPDATE `usuarios` SET `FOTO` = '$foto' WHERE `usuario`.`ID` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."La foto ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."La foto no se ha podido cambiar correctamente <br>";
            }
        }

        //Red Social
        if ($_REQUEST['red']){
            $idRED = $_REQUEST['red'];
            $link = $_REQUEST['link'];

            echo 'Se ha obtenido la red '.$idRED;
            if ($link != null){
                $sql = "UPDATE conexion SET `LINK-PERFIL` = '$link' WHERE `ID-RED`= '$idRED' AND `ID-USUARIO`= '$perfilUser[0]'";
            } else {
                $mensaje = $mensaje."No se ha introducido el link de la Red Social que quieres cambiar <br>";
            }
        }

    }
?>

<?php
        //Si no hay cambios muestra el formulario
        if ($mensaje != null){
            echo '<span>'.$mensaje.'</span>';
            echo '<a href="perfil.php"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">backspace</i> Volver a mi perfil</div></a>';
        }   else {
?>
<form action="perfil.php?edit=1" method="post" class="add">

    <h3>Editar campos</h3>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="email" class="mdl-textfield__input" type="email" id="email" value="<?php echo $perfilUser[3] ?>" disabled>
        <label class="mdl-textfield__label" for="email">Correo electrónico</label>
    </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="nombre" class="mdl-textfield__input" type="text" id="nombre" value="<?php echo $perfilUser[1] ?>">
        <label class="mdl-textfield__label" for="nombre">Nombre</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="apedillo" class="mdl-textfield__input" type="text" id="apedillo" value="<?php echo $perfilUser[2] ?>">
        <label class="mdl-textfield__label" for="apedillo">Apedillos</label>
    </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="foto" class="mdl-textfield__input" type="text" id="foto" value="<?php echo $perfilUser[5] ?>">
        <label class="mdl-textfield__label" for="foto">Foto perfil</label>
    </div>
    <hr>

      <div class="mdl-cell mdl-cell--12-col">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised">
              <i class="material-icons">bookmark</i> Redes Sociales
            </div>
            <?php

            //Obtiene numero de redes sociales
            $total = "SELECT * FROM `redes` ORDER BY `ID-RED` ASC";
            if ($resultado = $conexion -> query($total)){
                $totalREDES = $resultado -> num_rows;
            }
            for ($i=0; $i<$totalREDES; $i++){
                $consultaRED = "SELECT * FROM `redes` ORDER BY `ID-RED` ASC LIMIT ".$i.", 1";
                if ($resultadoRED = $conexion -> query($consultaRED)){
                    $redID = $resultadoRED->fetch_array(); 
                }
                    echo '<div class="mdl-cell mdl-cell--4-col">
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="red'.$i.'">
                                <input type="radio" id="red'.$i.'" class="mdl-radio__button" name="red" value="'.$redID[0].'">
                                <span class="mdl-radio__label">'.$redID[1].'</span>
                            </label>
                        </div>';
            }
            ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="link" class="mdl-textfield__input" type="text" id="link">
                <label class="mdl-textfield__label" for="link">Link Perfil</label>
            </div>
        </div>
      </div>
    <hr>
    <div>
        <input type="submit" name="editar" value="editar" id="editar" class="mdl-button mdl-js-button mdl-button--colored">
    </div><br>
</form>

        <?php } ?>