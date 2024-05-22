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
         
            header("Location:/vehicleModel");
            exit();

        } else {
 
            $database = new Database();
            $pdo = $database->getConnection();
            $Home = new Home($pdo);
            $availableLocations =$Home->Location();
          include 'views/navbar.php';
            include 'views/home.php';
        }












    }


}