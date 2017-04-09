<div class="mdl-cell mdl-cell--12-col">
    <a href="asistente.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>
    <h1>Eliminar Usuarios</h1>
    <center><img src="https://media.giphy.com/media/374pcIBVEGb6g/giphy.gif"></center>
</div>

<?php
include './conexion.php';
    if ($_GET['CONF'] != null){
        if ($_GET['CONF'] == 'YES'){
            $cantidadSQL = "SELECT * FROM usuario";
            $resultado = $conexion->query($cantidadSQL);
            $cantidad = $resultado->num_rows;

            $mensaje = $mensaje.'> Se estan eliminando '.$cantidad.' usuarios <br>';

            $vaciar = "truncate table usuario";
            if ($resultado = $conexion ->query($vaciar)){
                $mensaje = $mensaje.'> Se han eliminado todos los usuarios <br>';
            } else {
                $mensaje = $mensaje.'> Se ha producido un error elimiando los usuarios <br>';
            }
        }  
        if ($_GET['CONF'] == 'NO'){
            $mensaje = $mensaje.'> Menos mal que has decidido no borrar a los usuarios <br>';
        }
    }


    //Si hay mensajes, muestralos
    if ($mensaje != null){
        echo '<div class="mdl-cell mdl-cell--12-col">';
        echo '<span>'.$mensaje.'</span>';
        echo '</div>';
    }
?>

<div class="mdl-cell mdl-cell--12-col">
<h3>¿Estas seguro de que quieres eliminar a los usuarios?</h3>
<br>
    <a href="asistente.php?accion=delUSER&CONF=YES"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">delete_forever</i> Eliminar</div></a>
    <a href="asistente.php?accion=delUSER&CONF=NO"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">cancel</i> Cancelar</div></a>
</div>