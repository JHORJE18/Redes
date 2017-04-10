<h3>Instalación Central Redes Sociales</h3>
    <p>
        Bienvenido al aistente de instalación para instlar la gran plataforma creada por el alumno "Jorge López Gil", el cual ha realizado esta plataforma como proyecto para la asignatura de Base de datos en el Grado Superior de Desarrollo de Aplicaciones Multiplataforma (DAM). <br>
        A continuación se procedera a instalar la plataforma.<br>
    </p>
    <hr>
    <form action="index.php?paso=1" method="post">
        <h3>Modo de instalación</h3>
        <span>Seleccione el modo con el que quiere comenzar la instalación de la plataforma</span>
        <br>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="guay">
            <input type="radio" id="guay" class="mdl-radio__button" name="modo" value="1" checked>
            <span class="mdl-radio__label">Modo guay</span>
        </label>
        <br>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="normal">
            <input type="radio" id="normal" class="mdl-radio__button" name="modo" value="2">
            <span class="mdl-radio__label">Modo normal</span>
        </label>
        <br>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="avanzado">
            <input type="radio" id="avanzado" class="mdl-radio__button" name="modo" value="3">
            <span class="mdl-radio__label">Modo avanzado</span>
        </label>

        <div><input type="submit" name="comenzar" value="Comenzar Instalación" class="mdl-button mdl-js-button mdl-button--colored"></div>
    </form>