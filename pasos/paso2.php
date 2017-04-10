<h3>Comprobando la conexión con la Base de datos</h3>

<?php 
    switch ($modo){
        case 1:
            echo '<span>Ahora ten paciencia y espera a los mensajes que te indicaran si todo ha ido bien o hay errores</span><br>';
            echo '<img src="https://media.giphy.com/media/26BRuo6sLetdllPAQ/giphy.gif" style="width: 100%">';
            break;
        case 2:
            echo '<span>A continuación se muestran los mensajes del estado de la creación de la Base de datos</span>';
            break;
        case 3:
            echo '<span>Se muestra el estado de la validación</span>';
    }
?>

<?php 
    //Validando Base de Datos
        $mensaje = "> Se esta recibiendo datos <br>";

        //Comprobamos que recibimos todos los datos
        if (($_POST['server'] != null) && ($_POST['data'] != null) && ($_POST['user'] != null)){
            $mensaje = $mensaje.'> Datos introducidos, comprobando que son válidos <br>';
                //Conexion TEMPORAL
                $SERVER = $_POST['server'];
                $USER = $_POST['user'];
                $PASS = $_POST['pass'];
                $DATA = $_POST['data'];

                //Crea la Base de Datos
                $creaBBDD = "CREATE DATABASE $DATA";
                $conecta = new mysqli($SERVER, $USER, $PASS);
                if ($conecta->query($creaBBDD)){
                    $mensaje = $mensaje.'> Se ha creado correctamente la Base de Datos '.$DATA.'<br>';
                    $conecta = new mysqli($SERVER, $USER, $PASS, $DATA);
                    if ($conecta->connect_errno){
                        $mensaje = $mensaje.'> Se ha producido un error al intentar conectar con la Base de Datos <br>';
                    }   else {
                        $mensaje = $mensaje.'> Se ha podido conectar con la Base de datos <br>';
                        $mensaje = $mensaje.'> Procediendo a guardar la configuración de la Base de Datos <br>';

                        $nuevoarchivo = fopen('conexion.php', "w");
                        if ($nuevoarchivo){
                            fwrite($nuevoarchivo,"<?php \n\$BASE = \"$DATA\"; \n\$conexion = new mysqli(\"$SERVER\", \"$USER\", \"$PASS\", \"$DATA\"); \n?>");
                            fclose($nuevoarchivo);
                            $mensaje = $mensaje.'> Se ha escrito los datos para la nueva Base de Datos correctamente <br>';
                            $OK = true;
                        } else {
                            $mensaje = $mensaje.'> No se ha podido crear / abrir el fichero conexion.php, comprueba que tienes permisos de escritura en el servidor <br>';

                            $borraBBDD = "DROP DATABASE $DATA";
                            if ($conecta->query($borraBBDD)){
                                $mensaje = $mensaje.'> Se ha borrado la Base de Datos <br>';
                            }
                        }
                    }
                } else {
                    $mensaje = $mensaje.'> No se ha podido crear la Base de datos <br>';
                }
        }   else {
            //Falta algo
            $mensaje = $mensaje.'> Faltan datos, la contraseña puede estar vacia, pero el resto de datos tienen que tener algo <br>';
        }

    echo '<p>'.$mensaje.'</p>';

    //Si todo sale bien...
    if (isset($OK)){
        echo '<a href="index.php?paso=3&modo='.$modo.'"><div class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect"><i class="material-icons">check</i> Siguiente</div></a>';
    }
?>

        <a href="index.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>