<?php

use gdb\GamesDB;

require_once "../config/config.php";

$array = array("name" => false, "description" => false, "image" => false, "db_error" => false);
$gamesDb = new GamesDB();
if (isset($_POST['name']) && !empty($_POST['name'])) $array["name"] = true;
if (isset($_POST['description']) && !empty($_POST['description'])) $array["description"] = true;
if (isset($_FILES) && !empty($_FILES["file"])) $array["image"] = true;

foreach ($array as $key => $value) {
    if ($key != "db_error" && $value == false) {
        header("Location: game_form.php?success=0");
        exit();
    }
}

$temp_file_name = $_FILES["file"]["tmp_name"];
$file_name = $_FILES["file"]["name"];
$directory = "./css/assets/uploads/";
$full_name = $directory . $file_name;
$moved = move_uploaded_file($temp_file_name, $full_name);

if ($moved) {
    $success = $gamesDb->createGame($_POST['name'], $_POST['description'], $file_name);
    $array["db_error"] = $success;
}


if (!$array['db_error']) header("Location: game_form.php?success=0");
else header("Location: games_list.php?success=1");
exit();
