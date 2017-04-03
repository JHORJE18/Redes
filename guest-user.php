<?
  session_start();
?>

<?php include("conexion.php");
?>

<?php
//Confirmamos que queremos registrar y procedemos a registrar
if(isset($_POST["iniciar"])){

    if(!empty($_POST['correo']) && !empty($_POST['password'])) {
    //Obten datos introducidos
    $correo=$_POST['correo'];
    $password=$_POST['password'];

    //CONSULTA USUARIO
    $consultaUSUARIO = "SELECT * FROM usuarios WHERE CORREO='$correo'";
        if ($resultado = $conexion -> query($consultaUSUARIO)){
        //Determinamos numero tablas
         $usuarioN = $resultado -> num_rows;
        }

        if ($usuarioN > 0){     //Existe usuario
            //CONSULTA CONTRASEÑA
            $consultaCONTRASENA = "SELECT * FROM usuarios WHERE USUARIO='$usuario' AND CONTRASENA='$password'";
                if ($resultado = $conexion -> query($consultaCONTRASENA)){
                //Determinamos numero tablas
                 $passwordN = $resultado -> num_rows;
                }
            if ($passwordN > 0){
                session_start();
                        $_SESSION['correo']=$correo;
                        header("Location: index.php");
            }   else    {
                $mensaje = "La contraseña introducida es incorrecta";
            }
        }   else    {           //No existe usuario
            $mensaje = "El usuario introducido no existe, registrate";
        }

    }   else    {
        $mensaje = "Todos los campos son obligatorios";
    }
}

//Confirmamos que quiere recuperar sus datos
if (isset($_POST['recuperar'])){
    if (isset($_POST['usuario'])){
        //Ha puesto algo en el campo Usuario
        $user = $_POST['usuario'];
        $division = explode("@", $user);

        if ($division[1] != null){
            //Correo valido macho
            $valeCORREO = "SELECT * FROM usuarios WHERE CORREO LIKE '$user'";
              if ($resultado = $conexion -> query($valeCORREO)){
                    $datos = $resultado->fetch_array();          //Mete los valores en el array $fila[]
              }

            //Email information
                $email = $user;
                $admin_email = "wiijlg@hotmail.com";
                $subject = "Central Redes Sociales | Datos de su cuenta";
                $separa = "\n--------------------------------------------------\n";
                $info = "Has solicitado recuperar tus datos, aqui te los dejo\nUsuario: ".$datos[1]."\nCorreo: ".$datos[2]."\nContraseña: ".$datos[3];

                $comment = $separa.$info.$separa;
                        
                //Enviar correo
                mail($email, "$subject", $comment, "From:" . $admin_email);


        }   else  {
            $mensaje = "Ponga su <strong>correo</strong> en el campo Usuario";
        }
    }   else {
        //No ha puesto nada en usuario
        $mensaje = "Ponga su <strong>correo</strong> en el campo Usuario";
    }
}

//Confirmamos que queremos registrar y procedemos a registrar
if(isset($_POST["registrar"])){

  //Si la contraseña y la confirmar contraseña coinciden continua
  if (($_POST['password']) == ($_POST['passwordC'])) {

    if(!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apedillo'])) {
        //Procesar valores
        $correo = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apedillos = $_POST['apedillos'];
        $contrasena = $_POST['password'];
        $fecha = date("Y-m-d");
    
        //Convertir valores
        $correo = strtolower ( $correo ); //AUTOMATICAMENTE MINUSCULAS

            //Datos que enviara a la BBDD
           $sql = "INSERT INTO usuarios (NOMBRE, APEDILLOS, CORREO, CONTRASENA, FECHA)  VALUES('$nombre', '$apedillos', '$correo', '$contrasena', '$fecha')";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);


        if($result){
         $mensaje = "Cuenta Correctamente Creada";

                 //Email information
                $email = $correo;
                $admin_email = "wiijlg@hotmail.com";
                $subject = "Central Redes Sociales | Registrado";
                $separa = "\n--------------------------------------------------\n";
                $datos = "Ya estas registrado!\nUsuario: ".$usuario."\nCorreo: ".$correo."\nContraseña: ".$contrasena;

                $comment = $separa.$datos.$separa;
                        
                //Enviar correo
                mail($email, "$subject", $comment, "From:" . $admin_email);


        } else {    //No se puede insertar
         //Es por el USUARIO??
                $consultaUSUARIO = "SELECT * FROM usuarios WHERE CORREO='$correo'";
                if ($resultado = $conexion -> query($consultaUSUARIO)){
                    //Determinamos numero tablas
                     $consultaUsuarios = $resultado -> num_rows;
                }
            if ($consultaUsuarios != 0){
                $mensaje = "El correo ya esta registrado";
                }   else    {
                $mensaje = "Error desconocido ".$sql ;
            }
        }  
        } else {
             $mensaje = "Tienes que rellenar todos los datos!";
        }
      } else {
        $mensaje = "La contraseña para registrarse no coincide";
      }
}
?>

    <div class="mdl-grid">

       <?php if ($mensaje) {
          echo ('<div class="mdl-cell mdl-cell--12-col mdl-shadow--4dp mdl-button mdl-button--raised mdl-button--accent"><center>');
          echo $mensaje;
          echo ('</center></div>');
        }   
        ?>

      <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <h1>Iniciar Sesión</h1>
                <hr>
                   <form action="usuarios.php" method="post" class="iniciar">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="correo" class="mdl-textfield__input" type="text" id="correo">
                        <label class="mdl-textfield__label" for="correo">Correo</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="password" class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Contraseña</label>
                      </div>
                    <div><input type="submit" name="iniciar" value="Iniciar Sesion" class="mdl-button mdl-js-button mdl-button--colored"></div>
                    <div><input type="submit" name="recuperar" value="Recuperar datos" class="mdl-button mdl-js-button mdl-button--colored"></div>
                  </form>
                </div>
        </div>
      </div>

      <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
              <h1>Crear una cuenta</h1>
                <hr>
              <form action="usuarios.php" method="post" class="registro">

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

                  <div><input type="submit" name="registrar" value="Registrarse" id="registrar" class="mdl-button mdl-js-button mdl-button--colored"></div><br>
              </form>
            </div>
          </div>
      </div>

    </div>
