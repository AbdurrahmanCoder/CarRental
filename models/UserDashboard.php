<?php

namespace User; 
use Database\Database;

class UserDashboard
{
    private $db;
    private $userId;

    public function __construct()
    {
        if (isset($_SESSION['user_id'])) {
            $this->userId = $_SESSION['user_id']; 
            $this->db = new Database(); 
        }  
    } 
    public function CommandeAffficher()
    { 
        try {
            $requete = "SELECT carorder.*, voiture.id AS vid, voiture.*, location.*
            FROM `carorder`
            INNER JOIN voiture ON voiture.id = carorder.voiture_id
            INNER JOIN location ON location.id = carorder.id_location
            WHERE carorder.id_User = :userId AND carorder.ReturnStatus = 0"; 
            $pdo = $this->db->getConnection();
            $stmt = $pdo->prepare($requete);
            $stmt->bindParam(':userId', $this->userId, \PDO::PARAM_INT);
            $stmt->execute();  
            // Fetch data as associative array
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\PDOException $e) {
            // Handle any database errors
            echo "Error: " . $e->getMessage();
            return false;
        }    
    }

    public function OldOrders()
    { 
        try {
            $requete = "SELECT carorder.*, voiture.id AS vid, voiture.*, location.*
            FROM `carorder`
            INNER JOIN voiture ON voiture.id = carorder.voiture_id
            INNER JOIN location ON location.id = carorder.id_location
            WHERE carorder.id_User = :userId AND carorder.ReturnStatus = 1";  
            $pdo = $this->db->getConnection();
            $stmt = $pdo->prepare($requete);
            $stmt->bindParam(':userId', $this->userId, \PDO::PARAM_INT);
            $stmt->execute();  
            // Fetch data as associative array
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\PDOException $e) {
            // Handle any database errors
            echo "Error: " . $e->getMessage();
            return false;
        }    
    }  

}
