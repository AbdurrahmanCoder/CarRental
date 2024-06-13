<?php
require_once 'models/admin.php';

require_once "models/VehicleModels.php";
require_once "models/VehicleModels.php";

use Database\Database;
use Vehicule\VehiculeModels;
use AdminDash\adminDash;
use Testimonial\Testimonialmodel;
 
// use AdminDash\adminDash; 
use Admin\admin;  
class AdminController
{
  private $database;
  public function index()
  {

 
    function isAdmind()
    {

      if ($_SESSION['membre']['statut'] == 1) {
        return $_SESSION['membre'];
      }
    }
    
 if (isAdmind()) {
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
        $CarAvailable = $VehiculeAvailable->CarAvailable();
        
        $TotalAmount = $VehiculeAvailable->TotalAmount(); 

        // var_dump($TotalAmount);

        require_once 'views/admin/Dashboard.php';

      } else if ($id === "addCar") 
      
      {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
          echo "hello ";
        }
         else { 
          $VehiculeAvailable = new VehiculeModels($pdo);
          $typeDeVoiture = $VehiculeAvailable->VehiculeType();
           require_once 'views/admin/Addcar.php'; 
        }


      } else if ($id === "orderlist") {
        $VehiculeAvailable = new adminDash($pdo);
        $CommandeListe = $VehiculeAvailable->CommandeAffficher();

        if (isset($_GET['CarOrderId'])) {
          $id = $_GET['CarOrderId'];   
          $SelectedIdData = $VehiculeAvailable->NewOrderById($id); 
         } 

        // var_dump($CommandeListe);

        require_once 'views/admin/orderlist.php';
 

      } 
      
      else if ($id === "deleteCar") {


        $VehiculeAvailable = new VehiculeModels($pdo);
        $results = $VehiculeAvailable->VehiculeModelsFetch();
        require_once 'views/admin/Delete.php';


      }
      
      else if ($id === "modifyCar") {
        $VehiculeAvailable = new VehiculeModels($pdo);
        $results = $VehiculeAvailable->VehiculeModelsFetch();
        require_once 'views/admin/modifycar.php';

      }
      
      
      
      
      else if ($id === "neworder") {

        $VehiculeAvailable = new adminDash($pdo);
        $CommandeListe = $VehiculeAvailable->NewOrder();
 
        if (isset($_GET['selectedId'])) {
          $id = $_GET['selectedId']; 
           $SelectedIdData = $VehiculeAvailable->NewOrderById($id);
         }

        //  if (isset($_GET['confirmed'])) { 
        //    $id=  $_GET['selectedId']; 
        //    var_dump($id);
        //    $SelectedIdData  = $VehiculeAvailable->NewOrderById($id);  
        //    var_dump($SelectedIdData);
        //  }
 
        require_once 'views/admin/neworder.php';


      }
      
      
      else if ($id === "testimonials") {
 

        $VehiculeAvailable = new adminDash($pdo); 
 
        
        $testimonial = new Testimonialmodel($pdo);
        $testimonials = $testimonial->AllTestimonial();    
        
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {  
          
        //   $Idaza = $_POST['id'];   
        //   echo $Idaza;  
          // $approvedTestimonials = $_POST['testimonial'] ?? [];
          // $idsToApprove = array_map('intval', $approvedTestimonials); 
          // $testimonialsApprove = $testimonial->TestimonialApprove($idsToApprove);  
          // }  
          
          require_once 'views/admin/AdminTestimonials.php';  


 
        require_once 'views/admin/AdminTestimonials.php';  
      
      } 
       
      else {
        echo "<h1>404</h1>";
      }



    }

  }

  public function checking()
  {
    echo "hello ";
  }



}
 