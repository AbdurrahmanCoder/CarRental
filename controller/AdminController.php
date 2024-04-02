<?php
require_once 'models/admin.php';

require_once "models/VehicleModels.php";
require_once "models/VehicleModels.php";

use Database\Database;
use Vehicule\VehiculeModels;
use AdminDash\adminDash;

use Admin\admin;

class AdminController
{
  private $database;

  public function index()
  {
    require_once 'views/navbar.php';
      $database = new Database();
      $pdo = $database->getConnection();

    $id = isset($_GET["id"]) ? $_GET["id"] : "Dashboard";


    if ($id === "Dashboard") {
      $VehiculeAvailable = new adminDash($pdo);   
      $TotalUser = $VehiculeAvailable->TotalUser()[0]['total_membre'];
      $TotalVehicules = $VehiculeAvailable->TotalVehicules()[0]['total_voiture']; 
      $TotalOrder = $VehiculeAvailable->TotalOrder()[0]['total_orders']; 
      
      require_once 'views/admin/Dashboard.php';
      
    } else if ($id === "addCar") {
      
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        echo "hello ";
      } else {
        
        require_once 'views/admin/Addcar.php';
      }
      
      
    } else if ($id === "orderlist") {
      $VehiculeAvailable = new adminDash($pdo);   
      $CommandeListe = $VehiculeAvailable->CommandeAffficher(); 

        var_dump($CommandeListe);


      require_once 'views/admin/orderlist.php';


    } else if ($id === "deleteCar") {

  
      $VehiculeAvailable = new VehiculeModels($pdo);  
      $results = $VehiculeAvailable->VehiculeModelsFetch();  
      require_once 'views/admin/Delete.php';
   
   
   
   
    } else {
      echo "<h1>this is modify</h1>";
    }



  }
}

