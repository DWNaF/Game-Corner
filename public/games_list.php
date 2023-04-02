<?php
require_once "../config/config.php";

use gdb\GamesDB;

ob_start();

$gamesDB = new GamesDB();
$gamesDB->getAllGames();
?>

<?php
$content = ob_get_clean();
Template::render($content, "games_list");
?>