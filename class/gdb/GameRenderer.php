<?php

namespace gdb;

class GameRenderer
{

    private ?array $games;

    public function __construct(?array $gameTable){
        $this->games = $gameTable;
    }

    public function getHTML() : void{
        ?>
        <div id="games_render">
            <div>
                <h1>Games</h1>
            </div>
            <div id="games_container">
                <?php
                foreach ($this->games as $game){
                    ?>
                    <div class="game_container">
                        <div>
                            <?=$game->name?>
                        </div>
                        <div>
                            <img class="game_image" src="<?=UPLOADS_PATH . $game->image?>">
                            <p><?=$game->description?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        <?php
    }
}