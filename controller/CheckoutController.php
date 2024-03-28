<?php


require_once "models/config.php";
require_once "models/Order.php";


use Vehicule\VehiculeModels;
use Database\Database;

class CheckoutController
{

    private $database; 
    public function index()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Id = $_POST['SelectedCarID'];
            echo $Id;
            $database = new Database();
            $pdo = $database->getConnection();
            $VehiculeAvailable = new VehiculeModels($pdo);
            $VehiculeOrder = $VehiculeAvailable->VehiculeModelsById($Id);
            
             var_dump($VehiculeOrder);  
            $date1 = new DateTime($_SESSION['PickUp']);
            $date2 = new DateTime($_SESSION['DropOf']);
            $interval = $date1->diff($date2);
            $days = $interval->format('%a');
            $daysChange = $days == 0 ? 1 : $days;
            $tarif = $VehiculeOrder[0]['tarif'];
            $total = $daysChange * $tarif; 
            var_dump($total); 

            require_once 'views/navbar.php';
            require_once 'views/checkout.php';
        } else {


            // if ($_SERVER['REQUEST_METHOD'] == 'GET') { 

            echo "working";

            // }

        }





    }

}

