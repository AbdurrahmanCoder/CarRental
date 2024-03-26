<?php

require_once "models/Order.php";


use Database\Database; 
use Order\OrderSave;

class HomeController
{
    private $database;
    private $order;
    
    
    public function index()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            
            $Location = isset($_POST["Location"]) ? $_POST["Location"] : null;
            $PickUp = isset($_POST["PickUp"]) ? $_POST["PickUp"] : null;
            $PickUpTime = isset($_POST["PickUpTime"]) ? $_POST["PickUpTime"] : null;
            $DropOf = isset($_POST["DropOf"]) ? $_POST["DropOf"] : null;
            $DropOfTime = isset($_POST["DropOfTime"]) ? $_POST["DropOfTime"] : null; 
            $Checked = 1;  
            $id_User =  $_SESSION['user_id'];  
            $database = new Database();
            $pdo = $database->getConnection(); 
            $order = new OrderSave($pdo);

            $order->insertOrderSaveData($Location,$PickUp,$PickUpTime,$DropOf,$DropOfTime,$Checked,$id_User); 
            header("Location:/vehicleModel");
            exit();
 
 
        } else {

            echo    $_SESSION['user_id'] ."sessiosioidio";

            include 'views/navbar.php';
            include 'views/home.php';
        }












    }


}