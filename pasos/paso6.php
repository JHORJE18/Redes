<h3>Moviendo archivos y cargando plataforma</h3>

<?php 
    switch ($modo){
        case 1:
            echo '<span>Bien, ya se va a proceder a copiar los archivos en el directorio actual, tras pulsar el boton GO!, te cargara la plataforma ya construida</span><br>';
            echo '<img src="https://media.giphy.com/media/l46C4JfWleIDjtDJm/giphy.gif" style="width: 100%">';
            break;
        case 2:
            echo '<span>A continuación se autoeliminara este fichero y se procedera a copiar los archivos de la plataforma, ten paciencia</span>';
            break;
        case 3:
            echo '<span>Se va a redirigir al archivo encargado de eliminar este instlador y copiara los archivos de la plataforma</span>';
    }
?>
        <a href="mover.php"><div class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">check_circle</i> Go!</div></a>
        <a href="index.php?paso=5&modo=<?php echo $modo ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>