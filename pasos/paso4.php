<h3>Crear cuenta Super Usuario</h3>

<?php 
    switch ($modo){
        case 1:
            echo '<span>Ahora vas a crearte una cuenta, con la que tendras permisos de "Super Usuario" para que puedas editar cosas en la plataforma</span><br>';
            echo '<img src="https://media.giphy.com/media/3o6EhWeei7wsp2jc1G/giphy.gif" style="width: 100%">';
            break;
        case 2:
            echo '<span>Ahora vamos a crearte una cuenta y esta cuenta sera la única que tendrá permisos de Super Usuario, para modificar parametros de la plataforma</span>';
            break;
        case 3:
            echo '<span>Crea una cuenta con la que recibiras permiso de super usuario, necesario para poder modificar parametros de la plataforma</span>';
    }
?>

    <form action="index.php?paso=5&modo=<?php echo $modo ?>" method="post">
        <button class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Crear cuenta</button>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
            <input name="email" class="mdl-textfield__input" type="email" id="email">
            <label class="mdl-textfield__label" for="email">Correo electronico</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
            <input name="nombre" class="mdl-textfield__input" type="text" id="nombre">
            <label class="mdl-textfield__label" for="nombre">Nombre</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
            <input name="apedillos" class="mdl-textfield__input" type="text" id="apedillos">
            <label class="mdl-textfield__label" for="apedillos">Apedillos</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
            <input name="password" class="mdl-textfield__input" type="password" id="password">
            <label class="mdl-textfield__label" for="password">Nueva contraseña</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label">
            <input name="passwordC" class="mdl-textfield__input" type="password" id="passwordC">
            <label class="mdl-textfield__label" for="repasswordC">Confirma la contraseña</label>
        </div>

        <div><input type="submit" name="go" value="Enviar" class="mdl-button mdl-js-button mdl-button--colored"></div>
        <a href="index.php?paso=3&modo=<?php echo $modo ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>    </form>