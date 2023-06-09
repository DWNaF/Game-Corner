<?php

namespace gdb;
require_once("../config/config.php");

class GameForm{

    public static function generateForm() : void {
        ?>
        <form method="POST" enctype="multipart/form-data" action="upload.php">
            <h2>NEW GAME</h2>
            <div id="form_name_container">
                <label for="name">Name</label>
                <input type="text" name="name" id="form_name" placeholder="Enter game's name" >
            </div>
            <div id="form_description_container">
                <label for="description">Description</label>
                <textarea name="description" id="form_description" placeholder="Enter description's game" required></textarea>
            </div>
            <div id="form_file_container">
                <label for="file">Image</label>
                <input type="file" name="file" id="form_file">
            </div>
            <div id="form_buttons_container">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
        <?php
    }

}