<?php

namespace app\Controllers;


use app\Config\DB;
use app\Models\Filmovi;

class PocetnaController extends FrontendController {
    public function __construct()
    {
        parent::__construct();
    }

    public function pocetnaPage()
    {
        $filmoviModel = new Filmovi(DB::instance());
        $film = $filmoviModel->getAllMovies();
        $this->data['filmovi'] = $film;

        $this->loadView("pocetna",$this->data);
    }
    public function error(){
        $this->loadView("404", $this->data);
    }

}