<h3>Comprobando la conexión con la Base de datos</h3>

<?php 
    switch ($modo){
        case 1:
            echo '<span>Ahora ten paciencia y espera a los mensajes que te indicaran si todo ha ido bien o hay errores</span><br>';
            echo '<img src="https://media.giphy.com/media/26BRuo6sLetdllPAQ/giphy.gif" style="width: 100%">';
            break;
        case 2:
            echo '<span>A continuación se muestran los mensajes del estado de la creación de tu cuenta</span>';
            break;
        case 3:
            echo '<span>Se muestra el estado de la validación</span>';
    }
?>

<?php 
include 'conexion.php';

  //Si la contraseña y la confirmar contraseña coinciden continua
  if (($_POST['password']) == ($_POST['passwordC'])) {

    if(!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apedillos'])) {
        //Procesar valores
        $correo = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apedillos = $_POST['apedillos'];
        $contrasena = $_POST['password'];
        $fecha = date("Y-m-d");
    
        //Convertir valores
        $correo = strtolower ( $correo ); //AUTOMATICAMENTE MINUSCULAS

            //Datos que enviara a la BBDD
           $sql = "INSERT INTO usuario (NOMBRE, APEDILLOS, CORREO, CONTRASENA, FECHA, ESTADO)  VALUES('$nombre', '$apedillos', '$correo', '$contrasena', '$fecha', '2')";

            //Introducir datos en BBDD
           $result= $conexion -> query($sql);


        if($result){
         $mensaje = "Cuenta Correctamente Creada";
         $OK = true;

                 //Email information
                $email = $correo;
                $admin_email = "wiijlg@hotmail.com";
                $subject = "Central Redes Sociales | Registrado";
                $separa = "\n--------------------------------------------------\n";
                $datos = "Ya estas registrado!\nCorreo: ".$correo."\nContraseña: ".$contrasena;

                $comment = $separa.$datos.$separa;
                        
                //Enviar correo
                mail($email, "$subject", $comment, "From:" . $admin_email);


        } else {    //No se puede insertar
         //Es por el USUARIO??
                $consultaUSUARIO = "SELECT * FROM usuario WHERE CORREO='$correo'";
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

    echo '<p>'.$mensaje.'</p>';

    //Si todo sale bien...
    if (isset($OK)){
        echo '<a href="index.php?paso=6&modo='.$modo.'"><div class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">check</i> Siguiente</div></a>';
    }
?>

        <a href="index.php?paso=4&modo=<?php echo $modo ?>"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>