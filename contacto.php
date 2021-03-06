<!doctype html>
<html lang="es">
  <head>

  <?php
  include 'conexion.php';

  $seccion = "Contacto";

      include './plantilla/cabezera.php';


      //Contacto a traves del MAIL
      if (isset($_REQUEST['email']))  {
        
        //Email information
        $admin_email = "wiijlg@hotmail.com";
        $email = $_REQUEST['email'];
        $subject = "Soporte Central Redes Sociales | ".$_REQUEST['subject'];
        $separa = "\n-------------------------\n";
        $comment = "--SOPORTE CENTRAL REDES--".$separa.$_REQUEST['comment'].$separa."Enviado por: ".$email;
                
        //Enviar correo
        mail($admin_email, "$subject", $comment, "From:" . $email);
        
        //Mensaje
        $mensaje = "Gracias por enviar el mensaje!";
      }

      ?>



    <title>YT Subs | <?php echo $seccion; ?></title>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php
        include './plantilla/cabezera-body.php';
        include './plantilla/menu-lateral.php';
       ?>
      <main class="mdl-layout__content mdl-color--grey-100">

        <div class="mdl-grid demo-content">
          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Contactar
          </center></div>

    <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-color--white">
    <div class="mld-grid mdl-cell mdl-cell--12-col">
        <h1>Contacta con el soporte</h1>
        <hr>
                  <?php 
                    if ($mensaje != null){
                        echo '<span>'.$mensaje.'</span><hr>';
                    }
                  ?>
        <div id="p" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="width:100%"></div>
            <br>
                <center>
                    <a href="mailto:wiijlg@hotmail.com"><div class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent"><i class="material-icons">email</i>Correo Electronico</div></a>
                </center>
            <br>
        <div id="p" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="width:100%"></div>

          <div class="mdl-grid">
              <div class="mdl-cell mdl-cell--12-col mdl-color--white">
                  <h1>Envia un mensaje</h1>
                  <hr>
                    <form action="contacto.php" method="post" class="mensaje">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input name="email" class="mdl-textfield__input" type="text" id="email">
                          <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <input name="subject" class="mdl-textfield__input" type="subject" id="subject">
                          <label class="mdl-textfield__label" for="subject">Asunto</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                          <textarea name="comment" class="mdl-textfield__input" type="text" rows= "5" id="comment" ></textarea>
                          <label class="mdl-textfield__label" for="comment">Mensaje</label>
                        </div>
                      <div><input type="submit" name="submit" value="Enviar" class="mdl-button mdl-js-button mdl-button--colored"></div>
                      <br>
                    </form>
                  </div>
          </div>

    </div>
    </div>

          <div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--colored"><center>
            Contactar
          </center></div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>
