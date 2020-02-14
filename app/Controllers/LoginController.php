<?php


namespace app\Controllers;

use app\Config\DB;
use app\Models\User;

class LoginController extends FrontendController{

    public function __construct()
    {
        parent::__construct();
    }
    public function LoginPage()
    {
        $this->loadView('login', $this->data);
    }

    public function Login()
    {
        if (isset($_POST['btnLogin'])) {

            $uname = $_POST['username'];
            $pass = $_POST['password'];

            $regUName = "/^[a-z]{2,15}$/";
            $regPass = "/^(?=.*\d).{6,}$/";


            $error = [];

            if (!preg_match($regUName, $uname)) {
                $error[] = "Username is not in good format!";
            }
            if (!preg_match($regPass, $pass)) {
                $error[] = "Password is not in good format!";
            }
            if (count($error) > 0) {
                $this->json($error, 422);
                $this->redirect("index.php?page=login");
                exit;
            }

            try {
                $password = md5($pass);
                $model = new User(DB::instance());
                $user = $model->login($uname, $password);
                var_dump($user);
                if ($user == null) {

                    $this->redirect("index.php?page=login");
                    exit;
                }
                $_SESSION['user'] = $user;
                $_SESSION['idRola'] = $user->idRole;
                $this->redirect("index.php?page=pocetna");


            } catch (PDOException $ex) {
                $this->json($ex->getMessage(), 500);
                $this->redirect("index.php?page=login");
            }


        } else {
            $this->json("Error Wrong UserName Or Password", 403);;
            $this->redirect("index.php?page=login");

        }
    }
    public function logout() {
        unset($_SESSION['user']);
        $this->redirect("index.php?page=pocetna");
    }



}