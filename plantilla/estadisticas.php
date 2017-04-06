<?php
    include './conexion.php';

    //Consultamos numero de filas (N Usuarios)
    $campos = "SELECT * FROM usuario";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $users = $resultado -> num_rows;
    }

    //Consultamos numero de filas (N Conexiones)
    $campos = "SELECT * FROM conexion";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $subs = $resultado -> num_rows;
    }

    //Consultamos numero de filas (N Redes)
    $campos = "SELECT * FROM redes";
    if ($resultado = $conexion -> query($campos)){
        //Determinamos numero tablas
         $views = $resultado -> num_rows;
    }
?>

<div>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Usuarios:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $users ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Conexiones:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $views ?></strong>
        </span>
    </li>
    <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <span>Redes sociales:</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <strong><?php echo $subs ?></strong>
        </span>
    </li>
</div>
