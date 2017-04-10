<div class="mdl-cell mdl-cell--12-col">
    <a href="asistente.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>
    <h1>Añadir Redes Sociales</h1>
    <center><img src="https://media.giphy.com/media/l41YvpiA9uMWw5AMU/giphy.gif"></center>
</div>

<div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised">
    <i class="material-icons">share</i> Redes Sociales actuales
</div>

<div class="mdl-cell mdl-cell--12-col">
<?php
$mensaje = null;
    //Muestra las redes sociales actuales
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
</div>

<div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised">
    <i class="material-icons">add</i> Añadir Red Social
</div>

<?php
    //Entiendo que vamos a añadir una nueva Red Social
    if (isset($_POST['añadir'])){
        //Compruebo que tengo todos los datos
        if (($_POST['nombre'] != null) && ($_POST['descripcion'] != null) && ($_POST['icono'] != null) && ($_POST['link'] != null)){
            $mensaje = $mensaje.'> Los datos se han recogido <br>';

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $icono = $_POST['icono'];
            $link = $_POST['link'];

           $sql = "INSERT INTO redes (NOMBRE, DESCRIPCION, ICONO, LINK)  VALUES('$nombre', '$descripcion', '$icono', '$link')";

           if ($resultado = $conexion -> query($sql)){
               $mensaje = $mensaje.'> Red social '.$nombre.' añadido correctamente <br>';
           } else {
               $mensaje = $mensaje.'> No se ha podido añador la red social <br>';
           }
        } else {
            $mensaje = $mensaje.'> No se han recibido todos los datos <br>';
        }
    }

    if (isset($mensaje)){
        echo $mensaje;
    }
?>

<div class="mdl-cell mdl-cell--12-col">
    <form action="asistente.php?accion=addRS" method="post" class="mensaje">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="nombre" class="mdl-textfield__input" type="text" id="nombre">
            <label class="mdl-textfield__label" for="nombre">Nombre red social</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="descripcion" class="mdl-textfield__input" type="text" id="descripcion">
            <label class="mdl-textfield__label" for="descripcion">Descripcion de la red social</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="icono" class="mdl-textfield__input" type="text" id="icono">
            <label class="mdl-textfield__label" for="icono">Icono de la red social</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="link" class="mdl-textfield__input" type="link" id="link">
            <label class="mdl-textfield__label" for="link">Enlace oficial</label>
        </div>

        <div><input type="submit" name="añadir" value="Añadir" class="mdl-button mdl-js-button mdl-button--colored"></div>
    </form>
</div>