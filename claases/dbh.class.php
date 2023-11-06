
<?php


class Dbh {
    private $host ="localhost";
    private $user ="root";
    private $pwd ="root";
    private $dbName ="CommerceLinkDB";


    protected function connect(){

        try{
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);

        echo "conected";
        //optional pull data from database fetch mode associative ar
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
        }catch(PDOException $ex){
            echo "error occured " .$ex->getMessage();
            die();
        }
    
    }

}
