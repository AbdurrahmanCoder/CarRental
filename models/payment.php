<?php
class Payment {

    private $pdo;
    private $success = true;
    private $result = [];

    function InsertOrderData() {
        if (isset($_SESSION['user'])) {
            $userFromSession = $_SESSION['user'];
            $this->result += $userFromSession;  
        }
 
 

if (isset($_SESSION['total']) && isset($_SESSION['days'])) {
 
    $this->result += [
        'total' => $_SESSION['total'],
        'days' => $_SESSION['days'],
    ];
}

        if (isset($_SESSION['processed_data'])) {
            $carids = $_SESSION['processed_data']['carids'];
            $marque = $_SESSION['processed_data']['marque'];
            $tarif = $_SESSION['processed_data']['tarif'];
            $img = $_SESSION['processed_data']['img'];

            // Add processed_data-related data to the result array
            $this->result += [
                'carids' => $carids,
                'marque' => $marque,
                'tarif' => $tarif,
                'img' => $img,
            ];
        }

        if (isset($_SESSION['user_id'])) {
            // Add processed_data-related data to the result array
            $this->result += [
                'UserId' => $_SESSION['user_id'],
            ];

            $this->insertDataToDB();
            return $this->result;
        }
    }

    function insertDataToDB() {
       try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
} try {
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
    function isSuccess() {
        return $this->success;
    }
}

 