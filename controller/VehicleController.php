<?php

// require_once 'models/config.php';
// require_once 'models/User.php';

// require_once "models/database.php";
// require_once "models/User.php";     

require_once "Session/session.php";
require_once "models/VehicleModels.php";

use Database\Database;
use Order\OrderSave;

use Session\Session;
use Vehicule\VehiculeModels;


class VehicleController
{


    private $database;
    private $order;


    public function index()
    {

        // $id_User = $_SESSION['user_id'];
        // var_dump($id_User);

        // $order = new OrderSave($pdo); 
        // $CarOrder = $order->VehiculeOrderRetrive($id_User);

        // $VehiculeFetch = new OrderSave($pdo);   

        $SessionInsert = new Session();
        $sessionData = $SessionInsert->getSessionData();

        $database = new Database();
        $pdo = $database->getConnection();
        $VehiculeAvailable = new VehiculeModels($pdo);  
        $results = $VehiculeAvailable->VehiculeModelsFetch();
        var_dump($results);



        // print_r($sessionData);

        require_once 'views/navbar.php';
        require_once 'views/vehiclemodels.php';

        // function UserLoggedIn()
// {
//     if (isset($_SESSION['pseudoData'])) {

        //         return $_SESSION['pseudoData'];
//     }
// }
    




    }

}


