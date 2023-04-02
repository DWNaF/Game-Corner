<?php

require_once "../config/config.php";
use gdb\GameForm;

ob_start();

if (isset($_GET["success"]) && !$_GET["success"]){
    ?>
        <div id="alert_container">
            <p>Echec de la validation du formulaire. Réessayez !</p>
        </div>
    <?php
}
GameForm::generateForm();
$content = ob_get_clean();
Template::render($content, "games_form");
?>