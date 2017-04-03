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

        //Facebook
        if ($_REQUEST['facebook']){
            $facebook = $_REQUEST['facebook'];
            $sql = "UPDATE `redes_sociales` SET `FACEBOOK` = '$facebook' WHERE `ID_USUARIO` = '$perfilUser[0]'";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);

            if($result){
                $mensaje = $mensaje."Facebook ha sido cambiado correctamente <br>";
            }   else {
                $mensaje = $mensaje."Facebook no se ha podido cambiar correctamente <br>";
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
        <input name="nombre" class="mdl-textfield__input" type="text" id="nombre" value="<?php echo $perfilUser[2] ?>">
        <label class="mdl-textfield__label" for="nombre">Nombre</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="apedillo" class="mdl-textfield__input" type="text" id="apedillo" value="<?php echo $perfilUser[3] ?>">
        <label class="mdl-textfield__label" for="apedillo">Apedillos</label>
    </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="foto" class="mdl-textfield__input" type="text" id="foto" value="<?php echo $perfilUser[5] ?>">
        <label class="mdl-textfield__label" for="foto">Foto perfil</label>
    </div>
    <hr>
    <h3>Redes Sociales</h3>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input name="facebook" class="mdl-textfield__input" type="text" id="facebook" value="<?php echo $red[1] ?>">
        <label class="mdl-textfield__label" for="facebook">Perfil Facebook</label>
    </div>
    <hr>
    <div>
        <input type="submit" name="editar" value="editar" id="editar" class="mdl-button mdl-js-button mdl-button--colored">
    </div><br>
</form>

        <?php } ?>