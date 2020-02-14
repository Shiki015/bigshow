<?php

namespace app\Controllers;


use app\Config\DB;
use app\Models\Filmovi;

class MovieDetailController extends FrontendController{

    public function __construct()
    {
        parent::__construct();
    }

    public function MovieDetailPage()
    {

        if(isset($_GET['id'])){
            $idMovie=$_GET['id'];
            $model = new Filmovi(DB::instance());
            $podaci = $model->MovieDetail($idMovie);

            $this->data['ispis']=$podaci;
        }
        $film = $model->getAllMovies();
        $this->data['filmovi'] = $film;

        $this->loadView("movie-detail",$this->data);


    }



}