<?php


namespace Order;


use Database\Database;

class OrderSave
{     private $pdo; 
    public function __construct()
    {
        $this->pdo= new Database();
    }
 
    public function insertOrderSaveData($Location, $PickUp, $PickUpTime, $DropOf, $DropOfTime, $Checked, $id_User)
    {

        $connect = $this->pdo->getConnection();
        $sql = "INSERT INTO carorder (City, PickUpDate, PickUpTime, DropDate, DropTime,Checked,id_User) VALUES (:City, :PickUpDate, :PickUpTime, :DropDate, :DropTime,:Checked,:id_User)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':City', $Location);
        $stmt->bindParam(':PickUpDate', $PickUp);
        $stmt->bindParam(':PickUpTime', $PickUpTime);
        $stmt->bindParam(':DropDate', $DropOf);
        $stmt->bindParam(':DropTime', $DropOfTime);
        $stmt->bindParam(':Checked', $Checked);
        $stmt->bindParam(':id_User', $id_User);
        $stmt->execute(); 
        $response = $stmt->rowCount() > 0 ? "true" : "false";
        echo $response;

    } 


    public function VehiculeOrderRetrive($id_User)
    {  
        $connect = $this->pdo->getConnection();

        $sql = "SELECT  * FROM  carorder WHERE  id_User = :id_User ";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id_User', $id_User);
        $stmt->execute(); 
         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        return  $result ; 
    } 
    public function VehiculeOrderExists($id_User)
    { 
        $connect = $this->pdo->getConnection();
        
        $sql = "SELECT COUNT(*) FROM carorder WHERE id_User = :id_User";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id_User', $id_User);
        $stmt->execute(); 
         $count = $stmt->fetchColumn(); 
        return $count > 0;
    }  
  
}
