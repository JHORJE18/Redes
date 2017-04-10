<h3>Creando tablas y relaciones</h3>

<?php 
    switch ($modo){
        case 1:
            echo '<span>Ahora ten paciencia y espera a los mensajes que te indicaran si las tablas se han podido crear bien o hay errores</span><br>';
            echo '<img src="https://media.giphy.com/media/3o7qEcFE19nWq16Ze8/giphy.gif" style="width: 100%">';
            break;
        case 2:
            echo '<span>A continuación se muestran los mensajes sobre el estado de la creación de las tablas</span>';
            break;
        case 3:
            echo '<span>Se muestra el estado de la creacion de tablas</span>';
    }
?>

<?php 
    include 'conexion.php';
    include 'sql.php';

    $mensaje = null;
    $OK = 0;
    
    //Crear tabla Conexion
    if ($conexion ->query($tCONEXION)){
        $mensaje = $mensaje.'> Se ha creado la tabla Conexion <br>';
        $OK++;
    } else {
        $mensaje = $mensaje.'> No se ha podido crear la tabla Conexion <br>';
    }

    //Crear tabla Redes
    if ($conexion ->query($tREDES)){
        $mensaje = $mensaje.'> Se ha creado la tabla Redes <br>';
        $OK++;
    } else {
        $mensaje = $mensaje.'> No se ha podido crear la tabla Redes <br>';
    }

    //Crear tabla Usuario
    if ($conexion ->query($tUSUARIO)){
        $mensaje = $mensaje.'> Se ha creado la tabla Usuario <br>';
        $OK++;
    } else {
        $mensaje = $mensaje.'> No se ha podido crear la tabla Usuario <br>';
    }

    //Crear relaciones
    if ($conexion ->query($relaciones)){
        $mensaje = $mensaje.'> Se han creado las relaciones entre tablas <br>';
        $OK++;
    } else {
        $mensaje = $mensaje.'> No se han podido crear las relaciones entre tablas <br>';
    }

    //Todo con éxito
    echo $OK;
    if (isset($OK) && $OK == 4){
        $mensaje = $mensaje.'> Todas las tablas se han podido crear y se puede continuar <br>';
    }

    echo '<p>'.$mensaje.'</p>';

    //Si todo sale bien...
    if (isset($OK) && $OK = 4){
        echo '<a href="index.php?paso=4&modo='.$modo.'"><div class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">check</i> Siguiente</div></a>';
    }
?>

        <a href="index.php?paso=2&modo=<?php echo $modo ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>