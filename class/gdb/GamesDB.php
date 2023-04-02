<?php

namespace gdb;
use PDO;

class GamesDB{
    private PDO $pdo;

    public function __construct(){
        try{
            $config = parse_ini_file("../config/config_db.ini");
            $dsn = 'mysql:dbname=' . $config['db_name'] . ';host='. $config['db_host']. ';port=' . $config['db_port'];
            $this->pdo = new PDO($dsn, $config['db_user'], $config['db_pwd']);
        }
        catch (\Exception $ex){
            die("Erreur : " . $ex->getMessage()) ;
        }
    }

    public function getAllGames() : void{
        $sql = "SELECT * FROM games" ;
        $statement = $this->pdo->prepare($sql) ;
        $statement->execute() or die(var_dump($statement->errorInfo()));
        $games_list = $statement->fetchAll(PDO::FETCH_CLASS);
        $gameRenderer = new GameRenderer($games_list);
        $gameRenderer->getHTML();
    }

    public function createGame($name, $description=null, $imgFile=null) : bool{
        $sql = "INSERT INTO games (name, description, image) VALUES (:name, :desc, :img)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":name", $name);
        $statement->bindValue(":desc", $description);
        $statement->bindValue(":img", $imgFile);

        if ($statement->execute()) return true;
        else return false;
    }

}