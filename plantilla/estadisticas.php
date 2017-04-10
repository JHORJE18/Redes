<?php
    include './conexion.php';

    //Consultamos numero de filas (N Usuarios)
    $campos = "SELECT * FROM usuario";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $nuser = $resultado -> num_rows;
    }

    //Consultamos numero de filas (N Conexiones)
    $campos = "SELECT * FROM conexion";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $nconex = $resultado -> num_rows;
    }

    //Consultamos numero de filas (N Redes)
    $campos = "SELECT * FROM redes";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $nredes = $resultado -> num_rows;
    }
?>

<div>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Usuarios:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $nuser ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Conexiones:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $nconex ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Redes sociales:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $nredes ?></strong>
        </span>
    </li>
</div>
