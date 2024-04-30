<?php

namespace Payment;

// require_once "models/config.php";

use Database\Database;
use Vehicule\VehiculeModels; 
class Payment
{

    private $database;
    private $pdo;
    private $success = true;
    private $result = [];
    private $id;
    private $date1;
    private $date2;
    private $daysChange;
    private $total;
    private $days;

    private $VehiculeAvailable;

    private $VehiculeOrder;

    public function __construct($pdo)
    {

        
        $this->pdo = $pdo; 

        $this->VehiculeAvailable = new VehiculeModels($pdo);
          
    }
    
    
    public function calculateDateInfo()
    {
        $pickup = new \DateTime($_SESSION['PickUp']);
        $dropoff = new \DateTime($_SESSION['DropOf']);
        $interval = $pickup->diff($dropoff);
        $days = $interval->format('%a');
        $daysTotal = $days == 0 ? 1 : $days;
        return [
            'pickupDate' => $pickup,
            'dropoffDate' => $dropoff,
            'days' => $days,
            'daysTotal' => $daysTotal
        ];
        
    }
    
    public function calculateTotal($id)
    {

        $this->VehiculeOrder = $this->VehiculeAvailable->VehiculeModelsById($id);
        $tarif = $this->VehiculeOrder[0]['tarif'];
        $dateInfo = $this->calculateDateInfo();
        $daysTotal = $dateInfo['daysTotal'];
        return $tarif * $daysTotal;
    }


    function insertDataToDB($SessionGetData,$voitureId,$TotalTarif)
    {

        try { 
            $sql = "INSERT INTO carorder (City, PickUpDate, PickUpTime, DropDate, DropTime, OrderStatus,ReturnStatus,TotalCost, PaymentStatus, id_User, voiture_id) 
            VALUES (:city, :pickupDate, :pickupTime, :dropDate, :dropTime, :orderStatus,:ReturnStatus, :totalCost, :paymentStatus, :userId, :carId)";
 
                var_dump( $SessionGetData['DropOf']);
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':city', $SessionGetData['Location']);
            $stmt->bindParam(':pickupDate', $SessionGetData['PickUp']);
            $stmt->bindParam(':pickupTime', $SessionGetData['PickUpTime']);
            $stmt->bindParam(':dropDate', $SessionGetData['DropOf']);
            $stmt->bindParam(':dropTime', $SessionGetData['DropOfTime']);
            $stmt->bindValue(':orderStatus', 0);  
            $stmt->bindValue(':ReturnStatus', 0);  
            $stmt->bindValue(':paymentStatus', 0);  
            $stmt->bindValue(':totalCost',$TotalTarif); 
            $stmt->bindValue(':userId', $_SESSION['user_id']); 
            $stmt->bindParam(':carId',  $voitureId );    
            // Execute the prepared statement
            $stmt->execute();   
 
            $sql2 = "UPDATE voiture SET carstatus = 1 WHERE id = :SelectedId";
            $stmt2 = $this->pdo->prepare($sql2);  
            $stmt2->bindParam(':SelectedId', $voitureId);     
            $stmt2->execute(); 
            echo "Data inserted successfully."; 

        } catch (\PDOException $e) { 

            echo 'Error inserting data: ' . $e->getMessage();


            $this->success = false;
        }
    }
    // function isSuccess()
    // {
    //     return $this->success;
    // }
}

