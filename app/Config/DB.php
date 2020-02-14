<?php
namespace app\Config;

class DB {

    private $conn;
    private static $db;

    private function __construct(){
        // echo "DB klasa napravljena!";
        $this->connect();
    }

    public static function instance(){
        if(self::$db === null){
            self::$db = new DB();
        }
        return self::$db;
    }

    private function connect(){
        $this->conn = new \PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE.";charset=utf8", DB_USERNAME, DB_PASSWORD);
        $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery(string $query){
        return $this->conn->query($query)->fetchAll();
    }

    public function executeOneRow(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }
    public function executeAll(string $query, Array $params){
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetchAll();
    }
    public function insert_update (string $query, Array $params) {
        $prepared = $this->conn->prepare($query);
        $prepared->execute($params);
    }
    public function last_Inserted_Id (string $query, Array $params) {
        $prepared = $this->conn->prepare($query);
        $prepared->execute($params);
        return $this->conn->lastInsertId();
    }

}
