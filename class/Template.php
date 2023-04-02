<?php
require_once "../config/config.php";

class Template
{

    public static function render(string $content, string $page) : void{?>

        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link href="<?=CSS_PATH?>root.css" rel="stylesheet">
            <link href="<?=CSS_PATH?>header.css" rel="stylesheet">
            <link href="<?=CSS_PATH?>footer.css" rel="stylesheet">
            <link href="<?=CSS_PATH . $page?>.css" rel="stylesheet">
            <title>TP5</title>

        </head>
        <body>
        <?php include (INCLUDES_PATH . "header.php"); ?>

        <div id="injected-content">
            <?php echo $content ?>
        </div>

        <?php include (INCLUDES_PATH . "footer.php");?>

        </body>
        </html>

        <?php
    }

}
