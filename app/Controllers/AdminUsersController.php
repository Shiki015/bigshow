<?php


namespace app\Controllers;


use app\Config\DB;
use app\Models\User;

class AdminUsersController extends FrontendController{
    public function __construct()
    {
        parent::__construct();
    }
    public function loadPage()
    {
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }

        $model = new User(DB::instance());
        $users = $model->allUsers();
        $role = $model->role();

        $this->data['role']=$role;
        $this->data['users']=$users;
        $this->loadView('adminUsers', $this->data);
    }
    public function deleteUser(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_GET['idUser'])){
            $id=$_GET['idUser'];
            try {
                $model = new User(DB::instance());
                $model->deleteUser($id);
                $this->redirect("index.php?page=adminUsers");
                }
                catch (\PDOException $ex) {
                    $this->json($ex->getMessage(), 500);
                    $this->redirect("index.php?page=adminUsers");
                }
        }
    }
    public function editUser(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }

        if(isset($_GET['idUser'])){
            try{
                $id=$_GET['idUser'];
                $model = new User(DB::instance());
                $userInfo = $model->userInfo($id);
                $role = $model->role();

                $this->data['role']=$role;
                $this->data['userInfo']=$userInfo;
                $this->loadView('editUser', $this->data);
            }catch (\PDOException $ex){
                $this->json($ex->getMessage(), 500);
                $this->redirect("index.php?page=adminUsers");
            }
        }

    }
    public function updateUser(){
        if($_SESSION['user']->idRole == 2 || !isset($_SESSION['user'])) {
            $this->redirect("index.php?page=404");
        }
        if(isset($_POST['btnUpdate'])){

            $id=$_POST['idUser'];
            $ime = $_POST['fname'];
            $prezime = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $uloga = $_POST['uloga'];


            $regUName = "/^[a-z]{2,15}$/";
            $regPass = "/^(?=.*\d).{6,}$/";
            $regFname = "/^[A-Z][a-z]{2,20}$/";

            $error = [];

            if (!preg_match($regUName, $username)) {
                $error[] = "Username is not in good format!";
            }
            if (!preg_match($regPass, $pass)) {
                $error[] = "Password is not in good format!";
            }
            if (!preg_match($regFname, $ime)) {
                $error[] = "First Name is not in good format!";
            }
            if (!preg_match($regFname, $prezime)) {
                $error[] = "Last Name is not in good format!";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Email is not in good format!";
            }
            if (count($error) > 0) {
                $this->json($error, 422);
                exit;
            }

            try {
                $md5Password = md5($pass);
                $vremePromene = date("Y-m-d H:i:s", time());
                $model = new User(DB::instance());

                $model->updateUser($id, $username, $email,$md5Password, $ime, $prezime,$uloga, $vremePromene);

                http_response_code(203);
                $this->redirect("index.php?page=adminUsers");

            } catch (PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }

        } else {
            $this->json(null, 403);
        }


    }
    public function addUser(){
        if(isset($_POST['btnInsert'])){

            $ime = $_POST['fname'];
            $prezime = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pass = md5($_POST['pass']);
            $uloga = $_POST['uloga'];

            $regUName = "/^[a-z]{2,15}$/";
            $regPass = "/^(?=.*\d).{6,}$/";
            $regFname = "/^[A-Z][a-z]{2,20}$/";

            $error = [];

            if (!preg_match($regUName, $username)) {
                $error[] = "Username is not in good format!";
            }
            if (!preg_match($regPass, $pass)) {
                $error[] = "Password is not in good format!";
            }
            if (!preg_match($regFname, $ime)) {
                $error[] = "First Name is not in good format!";
            }
            if (!preg_match($regFname, $prezime)) {
                $error[] = "Last Name is not in good format!";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Email is not in good format!";
            }
            if (count($error) > 0) {
                $this->json($error, 422);
                exit;
            }

            try {
                $md5Password = md5($pass);
                $vremeRegistracije = date("Y-m-d H:i:s", time());
                $model = new User(DB::instance());

                $model->addUser($username, $email, $md5Password, $ime, $prezime, $uloga, $vremeRegistracije);
                $this->redirect("index.php?page=adminUsers");
//                http_response_code(204);



            } catch (PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }

        } else {
            $this->json(null, 403);
        }
    }
}