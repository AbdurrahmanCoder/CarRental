<?php


namespace Order;

class OrderSave
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function insertOrderSaveData($Location, $PickUp, $PickUpTime, $DropOf, $DropOfTime, $Checked, $id_User)
    {

        $sql = "INSERT INTO carorder (City, PickUpDate, PickUpTime, DropDate, DropTime,Checked,id_User) VALUES (:City, :PickUpDate, :PickUpTime, :DropDate, :DropTime,:Checked,:id_User)";
        $stmt = $this->pdo->prepare($sql);
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
        $sql = "SELECT  * FROM  carorder WHERE  id_User = :id_User ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_User', $id_User);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
 
        return  $result ;

    }
  



}
