<h3>Conexión con Base de Datos</h3>

<?php 
    switch ($modo){
        case 1:
            echo '<span>Ahora vamos a poner los datos necesarios para que la plataforma se comunique con nuestra Base de Datos, tranquilo no necesitas saber sobre Base de datos, de eso se encarga la plataforma</span><br>';
            echo '<img src="https://media.giphy.com/media/26vUHsp0KX9w0vBDO/giphy.gif" style="width: 100%">';
            break;
        case 2:
            echo '<span>Primero vamos a crear la configuración para conectar con la Base de datos</span>';
            break;
        case 3:
            echo '<span>Sin más, introduce los datos necesarios para conectar con la Base de datos, se creara una base de datos con el nombre que especifiques</span>';
    }
?>

    <form action="index.php?paso=2&modo=<?php echo $modo ?>" method="post">
        <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Conexión con la Base de Datos</button>
        <br>
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
        <a href="index.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>
    </form>