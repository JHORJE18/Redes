<?php
    //Funcion copia todos los archivos
    function copia_completa( $source, $target ) {  
            if ( is_dir( $source ) ) {  
                @mkdir( $target );  
                $d = dir( $source );  
                while ( FALSE !== ( $entry = $d->read() ) ) {  
                    if ( $entry == '.' || $entry == '..' ) {  
                        continue;  
                    }  
                    $Entry = $source . '/' . $entry;   
                    if ( is_dir( $Entry ) ) {  
                        full_copy( $Entry, $target . '/' . $entry );  
                        continue;  
                    }  
                    copy( $Entry, $target . '/' . $entry );  
                }  
        
                $d->close();  
            }else {  
                copy( $source, $target );  
            }  
        } 

        //Eliminamos ficheros ya no necesarios

        //Copiamos archivos de la plataforma
        $origen = '/archivos/';
        $destino = './';
        copia_completa($origen, $destino);
?>