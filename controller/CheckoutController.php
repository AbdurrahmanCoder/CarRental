<?php


require_once "models/config.php";
require_once "models/Order.php";
require_once "models/Payment.php";


use Vehicule\VehiculeModels;
use Database\Database;
use Payment\Payment;



class CheckoutController
{

    private $database;
    private $date2;

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['SelectedCarID'];

            $database = new Database();
            $pdo = $database->getConnection();
            
            $payment = new Payment();
            
            
            $VehiculeAvailable = new VehiculeModels($pdo);


            $VehiculeOrder = $VehiculeAvailable->VehiculeModelsById($id);
            $tarif = $VehiculeOrder[0]['tarif'];


            
            $DateInfo = $payment->calculateDateInfo(); 

            $daysTotal = $DateInfo['daysTotal']; 
            $TotalTarif = $tarif * $daysTotal ; 
            echo "  tarif is " .$tarif  ."total days are "   .$daysTotal; 


            var_dump($VehiculeOrder);

            require_once 'views/navbar.php';
            require_once 'views/checkout.php';

        } else {
            // $this->handleGetRequest();
        }
    }



}










//     public function index()
//     {
//         // $Id = $_POST['SelectedCarID'];
//         // echo $Id;
//         // $database = new Database();
//         // $pdo = $database->getConnection();
//         // $date1 = new DateTime($_SESSION['PickUp']);
//         // $date2 = new DateTime($_SESSION['DropOf']);
//         // $interval = $date1->diff($date2);
//         // $days = $interval->format('%a');
//         // $daysChange = $days == 0 ? 1 : $days;

//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//             $VehiculeAvailable = new VehiculeModels($pdo);
//             $VehiculeOrder = $VehiculeAvailable->VehiculeModelsById($Id);

//             var_dump($VehiculeOrder);
//             $tarif = $VehiculeOrder[0]['tarif'];
//             $total = $daysChange * $tarif;

//             var_dump($total);

//             require_once 'views/navbar.php';
//             require_once 'views/checkout.php';
//         } else {


//             // if ($_SERVER['REQUEST_METHOD'] == 'GET') { 

//             echo "working";





//             // }

//         }




//     }

// }

