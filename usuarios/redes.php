
<div class="mdl-card__supporting-text mdl-color-text--grey-600">
    <?php 
        $numREDES = "SELECT * FROM CONEXION WHERE `ID-USUARIO`='$perfilUser[0]'";
        if ($resultado = $conexion -> query($numREDES)){
            $numRED = $resultado -> num_rows;
        }

        for ($i=0; $i<$numRED; $i++){
            ?> 
                <a href="<?php echo $link ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect"><i class="material-icons">arrow_forward</i> <?php echo $nombreRED ?></div></a>
<?php
        }

    ?>
</div>