<?php

namespace Payment;

 

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

 

   public  function calculateDateInfo()
    {
        $pickup= new \DateTime($_SESSION['PickUp']);
        $dropoff = new \DateTime($_SESSION['DropOf']);
        $interval = $pickup->diff( $dropoff);
        $days = $interval->format('%a');
        $daysTotal = $days  == 0 ? 1 : $days ; 
               return [
                   'pickupDate' => $pickup,
                   'dropoffDate' => $dropoff,
                   'days' => $days,
                   'daysTotal' => $daysTotal
               ];
        
    }



    function insertDataToDB()
    {

        try {
            $city = $this->result['Location'];
            $pickUpDate = $this->result['PickUp'];
            $pickUpTime = $this->result['PickUpTime'];
            $dropDate = $this->result['DropOf'];
            $dropTime = $this->result['PickUpTime'];
            $checked = 0;
            $id_User = $this->result['UserId'];
            $voiture_id = $this->result['carids'];
            $days = $this->result['days'];
            $total = $this->result['total'];

            $sql = "INSERT INTO `carorder` (`City`, `PickUpDate`, `PickUpTime`, `DropDate`, `DropTime`, `Checked`, `id_User`, `voiture_id`, `days`, `total`) 
            VALUES (:city, :PickUpDate, :PickUpTime, :DropDate, :DropTime, :Checked, :id_User, :voiture_id, :days, :total)";

            $Connect = $pdo->prepare($sql);
            $Connect->bindParam(':city', $city);
            $Connect->bindParam(':PickUpDate', $pickUpDate);
            $Connect->bindParam(':PickUpTime', $pickUpTime);
            $Connect->bindParam(':DropDate', $dropDate);
            $Connect->bindParam(':DropTime', $dropTime);
            $Connect->bindParam(':Checked', $checked);
            $Connect->bindParam(':id_User', $id_User);
            $Connect->bindParam(':voiture_id', $voiture_id);
            $Connect->bindParam(':days', $days);
            $Connect->bindParam(':total', $total);

            $Connect->execute();
        } catch (PDOException $e) {
            echo 'Error inserting data: ' . $e->getMessage();
            $this->success = false;
        }
    }
    function isSuccess()
    {
        return $this->success;
    }
}

