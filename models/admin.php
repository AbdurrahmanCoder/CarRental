<?php 

require_once 'config.php';

class admin{
    private $db;
    public function __construct()
    {
        try { 
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    public function CommandeAffficher()
    { 
        // $requete = "SELECT carorder.*, membre.*, voiture.*
        // FROM carorderation'
        // INNER JOIN membre ON carorder.id_User = membre.id
        // INNER JOIN voiture ON carorder.voiture_id = voiture_id
        // WHERE membre.id";
    //   $stmt = $this->db->prepare($requete);
    //   $stmt->execute();
    //   return $stmt->fetchAll(PDO::FETCH_ASSOC)
            $requete = "SELECT carorder.*, membre.*, voiture.*
        FROM carorder
        INNER JOIN membre ON carorder.id_User = membre.id
        INNER JOIN voiture ON carorder.voiture_id = voiture_id
       ORDER BY membre.id";
       $stmt = $this->db->prepare($requete);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function VoitureList()
    { 
        $requete = "SELECT  *  FROM voiture;";
       $stmt = $this->db->prepare($requete);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TotalOrder()
    { 
        $requete = "SELECT COUNT(*) AS total_orders FROM carorder;";
       $stmt = $this->db->prepare($requete);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function TotalVehicules()
    { 
        $requete = "SELECT COUNT(*) AS total_voiture FROM voiture;";
       $stmt = $this->db->prepare($requete);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TotalUser()
    { 
        $requete = "SELECT COUNT(*) AS total_membre FROM membre;";
       $stmt = $this->db->prepare($requete);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>