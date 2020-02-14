<?php

namespace app\Controllers;


use app\Config\DB;
use app\Models\Filmovi;

class AdminMoviesController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function loadPage()
    {
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        $model = new Filmovi(DB::instance());
        $filmovi = $model->movies();
        $zanrovi = $model->genres();
        $celebrity = $model->celebrities();

        $this->data['celebrities']= $celebrity;
        $this->data['genres']=$zanrovi;
        $this->data['movies']=$filmovi;

        $this->loadView('adminMovies', $this->data);
    }
    public function deleteMovie(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            try {
                $model = new Filmovi(DB::instance());
                $model->deleteMovie($id);
//                $this->json(null,204);
                $this->redirect("index.php?page=adminMovies");

            }
            catch (\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
                $this->redirect("index.php?page=adminMovies");
            }
        }
    }
    public function addMovie(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_POST['btnInsert']) && isset($_POST['genre']) && isset($_POST['celebrity'])) {

                $movieName = $_POST['movieName'];
                $movieYear = $_POST['movieYear'];
                $time = $_POST['time'];
                $movieDescription = $_POST['movieDescription'];
                $movieLink = $_POST['movieLink'];
                $genre = $_POST['genre'];
                $celebrity = $_POST['celebrity'];

                $fajl_naziv = $_FILES['movie_photo']['name'];
                $fajl_tmpLokacija = $_FILES['movie_photo']['tmp_name'];
                $fajl_tip = $_FILES['movie_photo']['type'];
                $fajl_velicina = $_FILES['movie_photo']['size'];

                $errors = [];

                $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

                if(!in_array($fajl_tip, $dozvoljeni_tipovi)){
                    array_push($errors, "Pogresan tip fajla. - Profil slika");
                    $this->redirect("index.php?page=adminMovies");
                }
                if($fajl_velicina > 3000000){
                    array_push($errors, "Maksimalna velicina fajla je 3MB. - Profil slika");
                    $this->redirect("index.php?page=adminMovies");

                 }
                if(strlen($movieName) == 0){
                    array_push($errors, "Mora se neki title napisati");
                    $this->redirect("index.php?page=adminMovies");
                }
                if(strlen($movieDescription) == 0){
                    array_push($errors, "Mora se neki opis napisati");
                    $this->redirect("index.php?page=adminMovies");
                }
                if(strlen($movieLink) == 0){
                    array_push($errors, "Mora se Link od filma napisati");
                    $this->redirect("index.php?page=adminMovies");
                }
                if($movieYear == 0){
                    array_push($errors, "Nije upisana godina za film");
                    $this->redirect("index.php?page=adminMovies");
                }
                if($time == 0){
                    array_push($errors, "Nije upisano vreme trajanja za film");
                    $this->redirect("index.php?page=adminMovies");
                }

                list($sirina, $visina) = getimagesize($fajl_tmpLokacija);


                $postojecaSlika = null;
                switch($fajl_tip){
                    case 'image/jpeg':
                        $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                        break;
                    case 'image/png':
                        $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                        break;
                }

                $photoVisina = 390;
                $photoSirina = 270;

                $photo = imagecreatetruecolor($photoVisina, $photoSirina);

                imagecopyresampled($photo, $postojecaSlika, 0, 0, 0, 0, $photoVisina, $photoSirina, $sirina, $visina);

                $naziv = time().$fajl_naziv;
                $putanjaSlika = 'Public/images/movies/'.$naziv;

            switch($fajl_tip){
                case 'image/jpeg':
                    imagejpeg($photo, $putanjaSlika, 75);

                    break;
                case 'image/png':
                    imagepng($photo, $putanjaSlika);

                    break;
            }

            $putanjaOriginalnaSlika = 'Public/images/movies/'.$naziv;

            if(move_uploaded_file($fajl_tmpLokacija, $putanjaOriginalnaSlika)){

                try {
                    $modelAdmin = new Filmovi(DB::instance());
                    $modelAdmin->insertMovie($movieYear,$time,$movieName,$putanjaSlika,$movieDescription,$movieLink, $celebrity, $genre);
                    $this->json(null, 204);
                    $this->redirect("index.php?page=adminMovies");

                } catch (\PDOException $ex){
                    $this->json($ex->getMessage(), 500);
                    $this->redirect("index.php?page=adminMovies");
                }
            }


        } else {
            $this->json(null, 403);
            $this->redirect("index.php?page=adminMovies");
        }
        }
        public function editMovie(){
            if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
                $this->redirect("index.php?page=404");
            }
            if(isset($_GET['id'])){
                try{
                    $id=$_GET['id'];
                    $model = new Filmovi(DB::instance());
                    $movieInfo = $model->printOneMovie($id);
                    $this->data['movieInfo']=$movieInfo;
                    $this->loadView('editMovie', $this->data);
                }catch (\PDOException $ex){
                    $this->json($ex->getMessage(), 500);
                    $this->redirect("index.php?page=adminMoives");
                }
            }
        }
        public function updateMovie(){
            if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
                $this->redirect("index.php?page=404");
            }
            if(isset($_POST['btnUpdate'])){

                $id = $_POST['movieId'];
                $movieName = $_POST['movieName'];
                $movieYear = $_POST['movieYear'];
                $time = $_POST['time'];
                $movieDescription = $_POST['movieDescription'];
                $movieLink = $_POST['movieLink'];




                $error = [];

                if (strlen($movieLink) == 0) {
                    array_push($errors, "Mora se  ime napisati");
                    $this->redirect("index.php?page=adminCelebrity");
                }
                if (strlen($movieDescription) == 0) {
                    array_push($errors, "Mora se mesto gde zivi napisati");
                    $this->redirect("index.php?page=adminCelebrity");
                }
                if (strlen($movieName) == 0) {
                    array_push($errors, "Mora se mesto gde zivi napisati");
                    $this->redirect("index.php?page=adminCelebrity");
                }
                if ($time == null) {
                    array_push($errors, "Mora se izabrati pol napisati");
                    $this->redirect("index.php?page=adminCelebrity");
                }
                if ($movieYear == null) {
                    array_push($errors, "Mora se zanimanje napisati");
                    $this->redirect("index.php?page=adminCelebrity");
                }


                if (count($error) > 0) {
                    $this->json($error, 422);
                    exit;
                }

                try {
                    $model = new Filmovi(DB::instance());

                    $model->updateMovie($id, $movieYear, $time,$movieName,$movieDescription,$movieLink);

                    http_response_code(203);
                    $this->redirect("index.php?page=adminMovies");

                } catch (PDOException $ex) {
                    $this->json($ex->getMessage(), 500);
                    $this->redirect("index.php?page=adminMovies");

                }

            } else {
                $this->json(null, 403);
            }
        }

}