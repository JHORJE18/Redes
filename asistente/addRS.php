<div class="mdl-cell mdl-cell--12-col">
    <h1>Añadir Redes Sociales</h1>
    <center><img src="https://media.giphy.com/media/l41YvpiA9uMWw5AMU/giphy.gif"></center>
</div>

<div class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised">
    <i class="material-icons">share</i> Redes Sociales actuales
</div>

<div class="mdl-cell mdl-cell--12-col">
<?php
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
    </form>
</div>