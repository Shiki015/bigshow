<?php


namespace app\Controllers;


use app\Config\DB;
use app\Models\Celebrity;
use app\Models\Filmovi;


class CelebrityDetailController extends FrontendController{


    public function __construct()
    {
        parent::__construct();
    }

    public function CelebrityDetailPage()
    {

        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $model = new Celebrity(DB::instance());
            $podaci = $model->getOneCelebrity($id);

            $this->data['ispis']=$podaci;

            $filmovi = new Filmovi(DB::instance());
            $movies = $filmovi->getMoviesForCelebrity($id);

            $this->data['filmovi']= $movies;
        }






        $this->loadView("celebrity-detail",$this->data);


    }
}