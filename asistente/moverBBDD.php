<div class="mdl-cell mdl-cell--12-col">
    <h1>Mover la Base de Datos</h1>
    <center><img src="https://media.giphy.com/media/xTiTnxpQ3ghPiB2Hp6/giphy.gif"></center>
</div>

<?php
include './conexion.php';
    //Recibimos datos para configurar Conexion.php
    if ($_POST['go'] != null){
        $mensaje = "Se ha recibido datos";
    }

    //Si hay mensajes, muestralos
    if ($mensaje != null){
        echo '<div class="mdl-cell mdl-cell--12-col">';
        echo '<span>'.$mensaje.'</span>';
        echo '</div>';
    }
?>

<div class="mdl-cell mdl-cell--8-col">
    <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Genera nueva Conexion</button>
    <span>Tienes que generar la nueva configuración para conectar con la nueva Base de datos, rellenando este formulario</span>
    <form action="asistente.php?accion=moverBBDD" method="post" class="config">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="server" class="mdl-textfield__input" type="text" id="server">
                <label class="mdl-textfield__label" for="server">Servidor de la Base de datos</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="data" class="mdl-textfield__input" type="text" id="data">
                <label class="mdl-textfield__label" for="data">Nombre de la Base de datos</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="user" class="mdl-textfield__input" type="text" id="user">
                <label class="mdl-textfield__label" for="user">Usuario</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="pass" class="mdl-textfield__input" type="password" id="pass">
                <label class="mdl-textfield__label" for="pass">Contraseña</label>
            </div>
            <div><input type="submit" name="go" value="Enviar" class="mdl-button mdl-js-button mdl-button--colored"></div>
        <br>
    </form>
</div>

<div class="mdl-cell mdl-cell--4-col">
    <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Descargar codigo SQL</button>
    <a href="asistente/tablas.sql" download="Tablas SQL"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">save</i> Descargar SQL</div></a>
</div>