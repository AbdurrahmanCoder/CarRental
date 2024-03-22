<?php
require_once 'models/admin.php';
class AdminController
{

  public function index()
  {
    require_once 'views/navbar.php';

    $id = isset($_GET["id"]) ? $_GET["id"] : "Dashboard";


    if ($id === "Dashboard") {


      require_once 'views/admin/Dashboard.php';

    } else if ($id === "addCar") {

      require_once 'views/admin/Addcar.php';

    } else if ($id === "orderlist") {
      require_once 'views/admin/orderlist.php'; 
    }
    
    
    else if ($id === "deleteCar") {


      require_once 'views/admin/Delete.php'; 
    }
    
    
    
    
    
    else {
      echo "<h1>this is modify</h1>";
    }



  }
}

?>