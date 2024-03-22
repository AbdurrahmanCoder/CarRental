<?php 
require_once 'config.php';

 class UserDashboard 
{
    private $db;
    private $userId;  
    
    public function __construct()
    {
        if (isset($_SESSION['user_id'])) {
            $this->userId = $_SESSION['user_id'];
        }

        try { 
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

public function CommandeAffficher()
{
    try {
        $requete = "SELECT carorder.*, membre.id AS mid, membre.*, voiture.id AS vid, voiture.* FROM `carorder` 
                    INNER JOIN membre ON membre.id = carorder.id_User 
                    INNER JOIN voiture ON voiture.id = carorder.voiture_id 
                    WHERE carorder.id_User = :userId";

        $stmt = $this->db->prepare($requete);
        $stmt->bindParam(':userId', $this->userId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch data as associative array
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}}
 