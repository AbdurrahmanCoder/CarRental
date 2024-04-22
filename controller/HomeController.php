<?php

// require_once "models/Order.php";
// require_once "models/config.php";
// require_once "Session/session.php";


use Database\Database;
use Order\OrderSave;
use Session\Session;

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
            print_r($sessionData);
 
            // $id_User =  $_SESSION['user_id'];  
            // $database = new Database();
            // $pdo = $database->getConnection(); 
            // $order = new OrderSave($pdo); 
            // $order->insertOrderSaveData($Location,$PickUp,$PickUpTime,$DropOf,$DropOfTime,$Checked,$id_User); 
             header("Location:/vehicleModel");
             exit(); 

        } else { 
            // echo $_SESSION['user_id'] . "sessiosioidio";

            include 'views/navbar.php';
            include 'views/home.php';
        }












    }


}