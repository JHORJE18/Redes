<div class="mdl-cell mdl-cell--12-col">
    <a href="asistente.php"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">backspace</i> Volver</div></a>
    <h1>Consultar Usuarios</h1>
</div>
<hr>
<div class="mdl-cell mdl-cell--12-col">
    <!--CABEZERA TABLA-->
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="table-layout:fixed;width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                    <th class="mdl-data-table__cell--non-numeric">Apedillos</th>
                    <th class="mdl-data-table__cell--non-numeric">Correo</th>
                    <th class="mdl-data-table__cell--non-numeric">Foto</th>
                    <th class="mdl-data-table__cell--non-numeric">Fecha</th>              
                </tr>
            </thead>
            <tbody>

    <?php 
        $sql = "SELECT * FROM usuario";
        if ($resultado = $conexion->query($sql)){
            $numREG = $resultado->num_rows;
        }
        for ($i=0; $i<$numREG; $i++){
            $sql = "SELECT * FROM usuario LIMIT $i, 1";
            if ($resultado = $conexion->query($sql)){
                $objeto = $resultado->fetch_array();
            }   ?>

            <tr>
                <td class="mdl-data-table__cell--non-numeric">
                    <a href="perfil.php?user=<?php echo $objeto[0] ?>"><div class="mdl-button mdl-js-button mdl-button--colored mdl-js-ripple-effect"><?php echo $objeto[0] ?></div></a>
                </td>    
                <td class="mdl-data-table__cell--non-numeric"><?php echo $objeto[1] ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $objeto[2] ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $objeto[3] ?></td>
                <td class="mdl-data-table__cell--non-numeric">
                        <a href="<?php echo $objeto[5] ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> Foto</div></a>
                </td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $objeto[6] ?></td>             
            </tr>

            <?php
        }
    ?>
    <!--FIN TABLA-->
       </tbody>
</table>

</div>