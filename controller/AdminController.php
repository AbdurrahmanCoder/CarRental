<?php
require_once 'models/admin.php';

require_once "models/VehicleModels.php";
require_once "models/VehicleModels.php";

use Database\Database;
use Vehicule\VehiculeModels;
use AdminDash\adminDash;


// use AdminDash\adminDash;



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
      $TotalUser = $VehiculeAvailable->TotalUser()['total_membre'];
      $TotalVehicules = $VehiculeAvailable->TotalVehicules()['total_voiture']; 
      $TotalOrder = $VehiculeAvailable->TotalOrder()['total_orders']; 
      $NewOrder = $VehiculeAvailable->NewOrderCount();
      
      var_dump($NewOrder); 
      
      require_once 'views/admin/Dashboard.php';
      
    } else if ($id === "addCar") { 
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        echo "hello ";
      } else {
        $VehiculeAvailable = new VehiculeModels($pdo);  
        $typeDeVoiture = $VehiculeAvailable->VehiculeType() ; 
      var_dump($typeDeVoiture);
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
    
    } 
  
    else if ($id === "neworder")  {   

      $VehiculeAvailable = new adminDash($pdo);   
       $CommandeListe  = $VehiculeAvailable->NewOrder();  

      if (isset($_GET['selectedId'])) { 
        $id=  $_GET['selectedId']; 

        var_dump($id);
        $SelectedIdData  = $VehiculeAvailable->NewOrderById($id);  
        var_dump($SelectedIdData);
      }
      require_once 'views/admin/neworder.php'; 
    }  




    else {
      echo "<h1>this is modify</h1>";
    }



  }


  public function checking()
{
  echo "hello ";
}



}

