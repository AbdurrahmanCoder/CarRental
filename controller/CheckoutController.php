<?php
  

//   require_once "models/config.php";
//   require_once "models/Order.php";
//   require_once "models/Payment.php"; 



use Vehicule\VehiculeModels;
use Database\Database;
use Payment\Payment;
use Session\Session; 
use StripePayment\StripePayment; 

class CheckoutController
{

    private $database;
    private $date2;
    private $id;



    public function index()
    {
        $database = new Database();
        $pdo = $database->getConnection();

        $Session = new Session();
        $SessionGetData = $Session->getSessionData();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $id = $_POST['SelectedCarID'];

            $Session->VoitureId($id);

            $payment = new Payment($pdo);

            $TotalTarif = $payment->calculateTotal($id);
            

            $dateInfo = $payment->calculateDateInfo();

            $VehiculeAvailable = new VehiculeModels($pdo);  
            $results = $VehiculeAvailable->VehiculeModelsById($id);

            require_once 'views/navbar.php';
            require_once 'views/checkout.php';

        } else {

            $payment = new Payment($pdo);

            $voitureId = $SessionGetData['VoitureId'] ?? null;

            $TotalTarif = $payment->calculateTotal($voitureId);

            var_dump($this->id ."id bro ");

            $payment->insertDataToDB($SessionGetData, $voitureId , $TotalTarif);

            $StripePayment = new StripePayment(); 
            $StripePayment->payment($TotalTarif); 
 
            require_once 'views/payment.php';

            // var_dump($SessionGetData);

            // $this->insertDataToDB();




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

