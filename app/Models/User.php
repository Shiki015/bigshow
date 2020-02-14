<?php


namespace app\Models;



use app\Config\DB;

class User{
    private $database;

    public function __construct( DB $database)
    {
        $this->database=$database;
    }
    public function login ($uname, $password) {
        $params = [$uname, $password];

        $query = "SELECT * FROM users WHERE username = ? AND pass =  ?";
       // return $this->database->executeOneRow($query, $params);

        $data = $this->database->executeAll($query, $params);
        if(!count($data)) {
            return null;
        }
        return $data[0];

    }

    public function newUser ($uname, $email, $password, $fname, $lname, $vremeRegistracije){

        $params = [$uname, $email, $password, $fname, $lname, $vremeRegistracije, $vremeRegistracije];
        $upit = "INSERT INTO users (idUser, username,  email, pass, firstName, lastName, idRole, createDate, updateDate) VALUES (NULL, ?, ?, ?, ?, ?,2, ?, ?)";

        $this->database->insert_update($upit, $params);
    }

    public function allUsers(){
        return $this->database->executeQuery("SELECT u.idUser, u.username, u.email, u.firstName, u.lastName, u.pass, r.name FROM users u inner join roles r on u.idRole = r.IdRole");
    }

    public function deleteUser($id){
        return $this->database->executeOneRow("DELETE from users where idUser = ?", [$id]);
    }
    public function userInfo($id){
        return $this->database->executeOneRow("SELECT u.idUser, u.username, u.email, u.firstName, u.lastName,u.idRole, r.name FROM users u inner join roles r on u.idRole = r.IdRole where u.idUser = ?",[$id]);
    }
    public function role(){
        return $this->database->executeQuery("Select * from roles");
    }
    public function updateUser($id, $username, $email,$md5Password, $ime, $prezime,$uloga, $vremePromene){
        return $this->database->insert_update("update users set username =?, email = ?,pass = ?, firstName = ?, lastName= ?, idRole= ?, updateDate = ? where idUser = ? ",[$username, $email,$md5Password, $ime, $prezime,$uloga, $vremePromene, $id]);
    }
    public function addUser($username, $email, $md5Password, $ime, $prezime,$uloga, $vremeRegistracije){

        $params= [$username, $email, $md5Password, $ime, $prezime, $uloga, $vremeRegistracije, $vremeRegistracije];

        $upit = "INSERT INTO users (idUser, username,  email, pass, firstName, lastName, idRole, createDate, updateDate) VALUES (NULL, ?, ?, ?, ?, ?,?, ?, ?)";
        $this->database->insert_update($upit, $params);
    }
}