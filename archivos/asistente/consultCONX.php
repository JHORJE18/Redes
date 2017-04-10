<div class="mdl-cell mdl-cell--12-col">
    <a href="asistente.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>
    <h1>Consultar Conexiones</h1>
</div>
<hr>
<div class="mdl-cell mdl-cell--12-col">
    <!--CABEZERA TABLA-->
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="table-layout:fixed;width:100%;">
            <thead>
                <tr>
                    <th>ID Red Social</th>
                    <th>ID Usuario</th>
                    <th class="mdl-data-table__cell--non-numeric">Link</th>
                    <th class="mdl-data-table__cell--non-numeric">Fecha</th>
                </tr>
            </thead>
            <tbody>

    <?php 
        $sql = "SELECT * FROM conexion";
        if ($resultado = $conexion->query($sql)){
            $numREG = $resultado->num_rows;
        }
        for ($i=0; $i<$numREG; $i++){
            $sql = "SELECT * FROM conexion LIMIT $i, 1";
            if ($resultado = $conexion->query($sql)){
                $objeto = $resultado->fetch_array();
            }   ?>

            <tr>
                <td><?php echo $objeto[0] ?></td>
                <td>
                    <a href="perfil.php?user=<?php echo $objeto[1] ?>"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><?php echo $objeto[1] ?></div></a>
                </td>    
                <td class="mdl-data-table__cell--non-numeric">
                        <a href="<?php echo $objeto[2] ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Enlace</div></a>
                </td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $objeto[3] ?></td>             
            </tr>

            <?php
        }
    ?>
    <!--FIN TABLA-->
       </tbody>
</table>

</div>