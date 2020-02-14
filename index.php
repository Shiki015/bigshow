<?php

require_once "app/Config/setup.php";
require_once "app/Config/config.php";


use app\Controllers\AdminCelebrityController;
use app\Controllers\AdminUsersController;
use app\Controllers\AdminMoviesController;
use app\Controllers\CelebritiesController;
use app\Controllers\CelebrityDetailController;
use app\Controllers\LoginController;
use app\Controllers\MovieDetailController;
use app\Controllers\MoviesController;
use app\Controllers\PocetnaController;
use app\Controllers\SignupController;


$celebrityDetailController = new CelebrityDetailController();
$pocetnaController = new PocetnaController();
$movieController = new MoviesController();
$celebrityController= new CelebritiesController();
$movieDetailController = new MovieDetailController();
$loginController = new LoginController();
$signupController = new SignupController();
$adminUsersController = new AdminUsersController();
$adminMoviesController = new AdminMoviesController();
$adminCelebrityController = new AdminCelebrityController();

if(isset($_GET["page"])){
    switch($_GET["page"])
    {
        case "adminUsers":
            $adminUsersController->loadPage();
            break;

        case "deleteUser":
            $adminUsersController->deleteUser();
            break;

        case "editUser":
            $adminUsersController->editUser();
            break;

        case "updateUser":
            $adminUsersController->updateUser();
            break;

        case "addUser":
            $adminUsersController->addUser();
            break;

        case "adminMovies":
            $adminMoviesController->loadPage();
            break;

        case "deleteMovie":
            $adminMoviesController->deleteMovie();
            break;

        case "addMovie":
            $adminMoviesController->addMovie();
            break;

        case "editMovie":
            $adminMoviesController->editMovie();
            break;

        case "updateMovie":
            $adminMoviesController->updateMovie();
            break;

        case "adminCelebrity":
            $adminCelebrityController->loadPage();
            break;

        case "deleteCelebrity":
            $adminCelebrityController->deleteCelebrity();
            break;

        case "editCelebrity":
            $adminCelebrityController->editCelebrity();
            break;

        case "addCelebrity":
            $adminCelebrityController->addCelebrity();
            break;

        case "updateCelebrity":
            $adminCelebrityController->updateCelebrity();
            break;

        case "show-movies":
            $movieController->moviePrinting();
            break;

        case "searchMovies":
            $movieController->searchMovies();
            break;

        case "paginate":
            $movieController->moviesPagination();
            break;

        case "pocetna":
            $pocetnaController->pocetnaPage();
            break;

        case "celebrities":
            $celebrityController->celebrityPage();
            break;

        case "printCelebrities":
            $celebrityController->celebrityPrinting();
            break;

        case "celebrity-detail":
            $celebrityDetailController->CelebrityDetailPage();
             break;

        case "showMoviesForActor";
            $celebrityDetailController->MoviesForActor();
            break;

        case "movie-detail":
             $movieDetailController->MovieDetailPage();
             break;

        case "movie-list":
            $movieController->MoviePage();
            break;


        case "signup":
             $signupController->SignupPage();
             break;

        case "register":
             $signupController->Signup();//poziva se metoda za registrovanje novih korisnika
             break;

        case "login":
             $loginController->LoginPage();
             break;

        case "DoLogIn":
            $loginController->Login();// logovanje na sajt
            break;

        case 'logout':
            $loginController->logout();
            break;

        case "404":
            $pocetnaController->error();
            break;

        default:
            $pocetnaController->pocetnaPage();
            break;
    }
}else{
    $pocetnaController->pocetnaPage();

}
















