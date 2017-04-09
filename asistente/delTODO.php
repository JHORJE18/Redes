<div class="mdl-cell mdl-cell--12-col">
    <a href="asistente.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>
    <h1>Eliminar TODO</h1>
    <center><img src="https://media.giphy.com/media/374pcIBVEGb6g/giphy.gif"></center>
</div>

<?php
include './conexion.php';
    if ($_GET['CONF'] != null){
        if ($_GET['CONF'] == 'YES'){
            //Eliminamos todo
            function BorrarDirectorio($directorio) {
                $archivos = scandir($directorio); //hace una lista de archivos del directorio
                $num = count($archivos); //los cuenta

                //Los borramos
                for ($i=0; $i<=$num; $i++) {
                    unlink ($archivos[$i]); 
                }

                //borramos el directorio
                rmdir ($directorio);
                }

            BorrarDirectorio("./");
        }  
        if ($_GET['CONF'] == 'NO'){
            $mensaje = $mensaje.'> Menos mal que has decidido no borrar todo <br>';
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
<h3>¿Estas seguro de que quieres eliminar TODA la plataforma?</h3>
<br>
<spna>Esto eliminara todos los archivos de la web<br>
        Si aceptas borrar TODO, no volveras a ver esta web en la dirección actual</span>
<br>
    <a href="asistente.php?accion=delTODO&CONF=YES"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">delete_forever</i> Eliminar</div></a>
    <a href="asistente.php?accion=delTODO&CONF=NO"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">cancel</i> Cancelar</div></a>
</div>