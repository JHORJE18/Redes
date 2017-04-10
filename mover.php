<?php
//Recojo el valor de donde copio y donde tengo que copiar
function copia($dirOrigen, $dirDestino) {
    //Creo el directorio destino
    mkdir($dirDestino, 0777, true);

    //abro el directorio origen

    if ($vcarga = opendir($dirOrigen))
    {
        while($file = readdir($vcarga)) //lo recorro enterito
        {
            if ($file != "." && $file != "..") //quito el raiz y el padre
            {
                echo "<b>$file</b>"; //muestro el nombre del archivo
                if (!is_dir($dirOrigen.$file)) //pregunto si no es directorio
                {
                    if(copy($dirOrigen.$file, $dirDestino.$file)) //como no es directorio, copio de origen a destino
                    {
                        echo " COPIADO!";
                    }else{
                        echo " ERROR!";
                    }
                }else{
                    echo " — directorio — <br />"; //era directorio llamo a la función de nuevo con la nueva ubicación
                    copia($dirOrigen.$file."/", $dirDestino.$file."/");
                }
                echo "<br />";
            }
        }
        closedir($vcarga);
    }
}

$destino = "";
$origen = "archivos/";
copia($origen, $destino);
?>