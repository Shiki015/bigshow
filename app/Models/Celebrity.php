<?php


namespace app\Models;


use app\Config\DB;


class Celebrity{


    private $database;

    public function __construct( DB $database)
    {
        $this->database=$database;
    }

    public function getAllCelebrity()
    {
        return $this->database->executeQuery("SELECT c.id_celebrity, c.birthName, c.celebrityPhoto, cp.name_cp FROM celebrity c join celebrityProfession cp where c.id_cp=cp.id_cp");
    }

    public function getOneCelebrity($id){
        return $this->database->executeOneRow("Select * from celebrity c join celebrityProfession cp on c.id_cp=cp.id_cp join gender g on c.id_gender=g.id_gender where c.id_celebrity = ?",[$id]);
    }
    public function getAllCelebrities(){
        return $this->database->executeQuery("SELECT c.id_celebrity, c.birthName, c.dateOfBirth, c.residence, cp.name_cp, g.gender, c.height from celebrity c inner join celebrityProfession cp on c.id_cp = cp.id_cp inner join gender g on c.id_gender = g.id_gender order by c.id_celebrity  ");
    }
    public function gender(){
        return $this->database->executeQuery("SELECT * from gender");
    }
    public function profession(){
        return $this->database->executeQuery("SELECT * from celebrityProfession");
    }
    public function deleteCelebrity($id){
         $this->database->executeOneRow("delete from celebrity where id_celebrity = ?", [$id]);
    }
    public function addCelebrity($ime, $dateOfBirth,$residence,$gender,$profession,$putanjaSlika,$height){
        return $this->database->insert_update("insert into celebrity values(NULL, ?, ?, ?, ?, ?, ?, ?)",[$ime, $dateOfBirth,$residence,$gender,$profession,$putanjaSlika,$height]);
    }
    public function updateCelebrity($id, $ime, $dateOfBirth,$residence,$gender,$profession,$height){
        return $this->database->insert_update("update celebrity set birthName = ?, dateOfBirth = ?, residence = ?, id_gender = ?, id_cp = ?, height = ? where id_celebrity = ?", [$ime, $dateOfBirth,$residence,$gender,$profession,$height,$id]);
    }
}
