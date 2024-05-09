<?php

// require_once "models/Order.php";
// require_once "models/config.php";
// require_once "Session/session.php";


use Database\Database;
use Order\OrderSave;
use Session\Session;
use Home\Home;

class HomeController
{
    private $database;
    private $order;


    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            extract($_POST);

            $SessionInsert = new Session();
            $SessionInsert->handleOrderSearch($_POST);
            $sessionData = $SessionInsert->getSessionData();
            // print_r($sessionData);
            // var_dump($SessionInsert);


            header("Location:/vehicleModel");
            exit();

        } else {
            // echo $_SESSION['user_id'] . "sessiosioidio";

            $database = new Database();
            $pdo = $database->getConnection();
            $Home = new Home($pdo);
            $availableLocations =$Home->Location();
            var_dump($availableLocations);
                include 'views/navbar.php';
            include 'views/home.php';
        }












    }


}