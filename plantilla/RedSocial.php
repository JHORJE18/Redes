<div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-color--white">
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <span style="float:right" class="mdl-badge" data-badge="<?php echo $numero ?>">Conexiones</spna>
        <a href="<?php echo $objeto[4] ?>" target="_blank"><div class="mdl-button mdl-js-button mdl-button--accent mdl-js-ripple-effect">
        <?php echo $objeto[1]; ?>  </div></a>
        <hr>
    </div>

    <div class="mdl-cell mdl-cell--2-col" style="padding: 5px;">
      <img src="<?php echo $objeto[3] ?>"  style="width: 100%">
    </div>

    <div class="mdl-cell mdl-cell--8-col" style="padding: 5px;">
      <span><?php echo $objeto[2] ?></span>
    </div>

    </div>
</div>