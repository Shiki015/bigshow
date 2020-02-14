<?php

namespace app\Models;


use app\Config\DB;

class Frontend{

    private $database;

    public function __construct( DB $database)
    {
        $this->database=$database;
    }

    public function getNavigation()
    {
        return $this->database->executeQuery("Select * from navigation");
    }
}