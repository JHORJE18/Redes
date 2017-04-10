<?php
include 'conexion.php';

      if (isset($_SESSION['ID'])) {
          //Sesion Abierta
          $idUsuario = $_SESSION['ID'];

                //Obten imagen
                $consultaFoto = ("SELECT * FROM  `usuario` WHERE  `ID` = '$idUsuario'");
                $resultadoFoto = $conexion -> query($consultaFoto);

                    $perfilUserOTO = $resultadoFoto->fetch_array();

          $nombre = $perfilUserOTO[1];
          $apedillo = $perfilUserOTO[2];
          if ($perfilUserOTO[5] != null){
            $imagenUsuario = $perfilUserOTO[5];
          } else {
            $imagenUsuario = "imagenes/user.jpg";
          }
      }   else {
          $nombre = "Invitado";
          $apedillo = "Anónimo";
          $imagenUsuario = "imagenes/user.jpg";
      }
 ?>

<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
  <header class="demo-drawer-header">
    <img src="<?php echo $imagenUsuario; ?>" class="demo-avatar">
    <div class="demo-avatar-dropdown">
      <span style="font-size: 18px">@<?php echo $nombre; ?>, <?php echo $apedillo; ?></span>
      <div class="mdl-layout-spacer"></div>
      <button id="opcionesBA" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-button--accent">
        <i class="material-icons" role="presentation">arrow_drop_down</i>
        <span class="visuallyhidden">Opciones</span>
      </button>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="opcionesBA">
          <?php
                //Si tiene sesion abierta, muestra cerrar sesion, sino Registrarse / Iniciar sesion
              if(isset($_SESSION['ID'])){
                  echo '<li class="mdl-menu__item"><a href="logout.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">close</i> Cerrar Sesión</a></li>';
              }   else    {
                  echo '<li class="mdl-menu__item"><a href="usuarios.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">account_box</i> Iniciar Sesión</a></li>';
                  echo '<li class="mdl-menu__item"><a href="usuarios.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        <i class="material-icons">face</i> Crear cuenta</a></li>';
              }
          ?>
      </ul>
    </div>
  </header>
  <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
    <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Inicio</a>
    <a class="mdl-navigation__link" href="perfil.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_box</i>Perfil</a>
    <a class="mdl-navigation__link" href="redes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">public</i>Redes Sociales</a>
    <a class="mdl-navigation__link" href="contacto.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">contacts</i>Contacto</a>
    <div class="mdl-layout-spacer"></div>
    <a class="mdl-navigation__link" href="asistente.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Ayuda</span></a>
  </nav>
</div>