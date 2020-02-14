<?php

namespace app\Controllers;

use app\Config\DB;
use app\Models\Filmovi;

class MoviesController extends FrontendController{

    public function __construct()
    {
        parent::__construct();
    }

    public function MoviePage()
    {
        $movieModel = new Filmovi(DB::instance());
        $movies = $movieModel->selectMovies();

        $this->data['movies']= $movies;
        $this->loadView('movie-list', $this->data);
    }
    public function moviePrinting()
    {
        $movieModel = new Filmovi(DB::instance());
        $movies = $movieModel->readyForPrintMovies();

        $this->json($movies);

    }
    public function searchMovies() {

        if(isset($_GET['valueSearch'])) {
            try {
                $data ="%".strtolower($_GET['valueSearch'])."%";

                $model = new Filmovi(DB::instance());
                $model = $model->getSearchMovies($data);

                $this->json($model);

            } catch (\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        } else {
            $this->json("No search data", 403);
        }
    }

    public function moviesPagination(){

        if(isset($_GET['pagPage'])){
            try {
                $paginationPage = $_GET['pagPage'];
                $model = new Filmovi(DB::instance());
                $paginationData = $model->moviesPagination($paginationPage);
                $this->json($paginationData);
            } catch (\PDOException $ex) {
                $this->json($ex, 500);
            }
        } else {
            try {
                $paginationPage = 0;
                $model = new Filmovi(DB::instance());
                $paginationData = $model->moviesPagination($paginationPage);

                $this->json($paginationData);
            } catch (\PDOException $ex) {
                $this->json($ex, 500);
            }

        }

    }

}