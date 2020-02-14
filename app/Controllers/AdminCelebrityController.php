<?php


namespace app\Controllers;


use app\Config\DB;
use app\Models\Celebrity;

class AdminCelebrityController extends FrontendController{
    public function __construct()
    {
        parent::__construct();
    }
    public function loadPage()
    {
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        $model = new Celebrity(DB::instance());
        $celebrity = $model->getAllCelebrities();
        $gender = $model->gender();
        $profession = $model->profession();

        $this->data['gender'] = $gender;
        $this->data['profession'] = $profession;
        $this->data['celebrity']= $celebrity;

        $this->loadView('adminCelebrity', $this->data);
    }
    public function deleteCelebrity(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            try {
                $model = new Celebrity(DB::instance());
                $model->deleteCelebrity($id);
                $this->redirect("index.php?page=adminCelebrity");
            }
            catch (\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
                $this->redirect("index.php?page=adminCelebrity");
            }
        }
    }
    public function editCelebrity(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_GET['id'])){
            try{
                $id=$_GET['id'];
                $model = new Celebrity(DB::instance());
                $celebrityInfo = $model->getOneCelebrity($id);
                $gender = $model->gender();
                $profession = $model->profession();

                $this->data['gender'] = $gender;
                $this->data['profession'] = $profession;
                $this->data['celebrityInfo']=$celebrityInfo;
                $this->loadView('editCelebrity', $this->data);
            }catch (\PDOException $ex){
                $this->json($ex->getMessage(), 500);
                $this->redirect("index.php?page=adminCelebrity");
            }
        }

    }
    public function updateCelebrity(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_POST['btnUpdate'])){

            $id = $_POST['idCelebrity'];
            $ime = $_POST['fname'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $height = $_POST['height'];
            $residence = $_POST['residence'];
            $gender = $_POST['gender'];
            $profession = $_POST['profession'];




            $error = [];

            if (strlen($ime) == 0) {
                array_push($errors, "Mora se  ime napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if (strlen($residence) == 0) {
                array_push($errors, "Mora se mesto gde zivi napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if ($gender == null) {
                array_push($errors, "Mora se izabrati pol napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if ($profession == null) {
                array_push($errors, "Mora se zanimanje napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }

            if ($height == null) {
                array_push($errors, "Mora se visina napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if (count($error) > 0) {
                $this->json($error, 422);
                exit;
            }

            try {
                $model = new Celebrity(DB::instance());

                $model->updateCelebrity($id, $ime, $dateOfBirth,$residence,$gender,$profession,$height);

                http_response_code(203);
                $this->redirect("index.php?page=adminCelebrity");

            } catch (PDOException $ex) {
                $this->json($ex->getMessage(), 500);
                $this->redirect("index.php?page=adminCelebrity");

            }

        } else {
            $this->json(null, 403);
        }


    }
    public function addCelebrity(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_POST['btnInsert'])) {

            $ime = $_POST['fname'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $height = $_POST['height'];
            $residence = $_POST['residence'];
            $gender = $_POST['gender'];
            $profession = $_POST['profession'];

            $fajl_naziv = $_FILES['celebrity_photo']['name'];
            $fajl_tmpLokacija = $_FILES['celebrity_photo']['tmp_name'];
            $fajl_tip = $_FILES['celebrity_photo']['type'];
            $fajl_velicina = $_FILES['celebrity_photo']['size'];


            $error = [];

            $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

            if (!in_array($fajl_tip, $dozvoljeni_tipovi)) {
                array_push($errors, "Pogresan tip fajla. - Profil slika");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if ($fajl_velicina > 3000000) {
                array_push($errors, "Maksimalna velicina fajla je 3MB. - Profil slika");
                $this->redirect("index.php?page=adminCelebrity");

            }
            if (strlen($ime) == 0) {
                array_push($errors, "Mora se  ime napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if (strlen($residence) == 0) {
                array_push($errors, "Mora se mesto gde zivi napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if ($gender == null) {
                array_push($errors, "Mora se izabrati pol napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }
            if ($profession == null) {
                array_push($errors, "Mora se zanimanje napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }

            if ($height == null) {
                array_push($errors, "Mora se visina napisati");
                $this->redirect("index.php?page=adminCelebrity");
            }


            list($sirina, $visina) = getimagesize($fajl_tmpLokacija);


            $postojecaSlika = null;
            switch ($fajl_tip) {
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

            $naziv = time() . $fajl_naziv;
            $putanjaSlika = 'images/movies/' . $naziv;

            switch ($fajl_tip) {
                case 'image/jpeg':
                    imagejpeg($photo, $putanjaSlika, 75);

                    break;
                case 'image/png':
                    imagepng($photo, $putanjaSlika);

                    break;
            }

            $putanjaOriginalnaSlika = 'Public/images/movies/' . $naziv;

            if (move_uploaded_file($fajl_tmpLokacija, $putanjaOriginalnaSlika)) {
                if (count($error) > 0) {
                    $this->json($error, 422);
                    exit;
                }

                try {
                    $model = new Celebrity(DB::instance());

                    $model->addCelebrity($ime, $dateOfBirth,$residence,$gender,$profession,$putanjaSlika,$height);
                    $this->redirect("index.php?page=adminCelebrity");
//                http_response_code(204);


                } catch (PDOException $ex) {
                    $this->json($ex->getMessage(), 500);
                }

            } else {
                $this->json(null, 403);
            }
        }
    }
}