<?php


namespace app\Controllers;


use app\Config\DB;
use app\Models\User;

class SignupController extends FrontendController{

    public function __construct()
    {
        parent::__construct();
    }
    public function SignupPage()
    {
        $this->loadView('signup', $this->data);
    }
    public function Signup(){


        if (isset($_POST["btn"])) {

            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];


            $regUName = "/^[a-z]{2,15}$/";
            $regPass = "/^(?=.*\d).{6,}$/";
            $regFname = "/^[A-Z][a-z]{2,20}$/";

            $error = [];

            if (!preg_match($regUName, $uname)) {
                $error[] = "Username is not in good format!";
            }
            if (!preg_match($regPass, $pass)) {
                $error[] = "Password is not in good format!";
            }
            if (!preg_match($regFname, $fname)) {
                $error[] = "First Name is not in good format!";
            }
            if (!preg_match($regFname, $lname)) {
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

                    $model->newUser($uname, $email, $md5Password, $fname, $lname, $vremeRegistracije);

                    http_response_code(201);


                } catch (PDOException $ex) {
                    $this->json($ex->getMessage(), 500);
                }

        } else {
            $this->json(null, 403);
        }
    }
}