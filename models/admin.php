<?php

// require_once 'config.php';

namespace AdminDash;


class adminDash
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
 
  }


  public function CommandeAffficher()
  {
    //   $requete = "SELECT carorder.*, membre.*, voiture.*
    //   FROM carorder'
    //   INNER JOIN membre ON carorder.id_User = membre.id
    //   INNER JOIN voiture ON carorder.voiture_id = voiture.id
    //   WHERE membre.id";
    // $stmt =$this->pdo->prepare($requete);
    // $stmt->execute();
    // return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //       $requete = "SELECT carorder.*, membre.*, voiture.*
    //   FROM carorder
    //   INNER JOIN membre ON carorder.id_User = membre.id
    //   INNER JOIN voiture ON carorder.voiture_id = voiture_id
    //  ORDER BY membre.id";
    // $requete = "SELECT carorder.*, membre.*, voiture.*, types_de_voiture.*
    //                   FROM carorder 
    //                   INNER JOIN membre ON carorder.id_User = membre.id
    //                   INNER JOIN voiture ON carorder.voiture_id = voiture.id
    //                   INNER JOIN  types_de_voiture ON types_de_voiture.id = voiture.typeId
    //                   ORDER BY membre.id;";
    $requete = "SELECT carorder.*, membre.*, voiture.*, types_de_voiture.*, carorder.id AS carorder_id
    FROM carorder 
    INNER JOIN membre ON carorder.id_User = membre.id
    INNER JOIN voiture ON carorder.voiture_id = voiture.id
    INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
    ORDER BY membre.id  ";
    
    $stmt = $this->pdo->prepare($requete);


    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
  public function VoitureList()
  {
    $requete = "SELECT  *  FROM voiture;";
    $stmt = $this->pdo->prepare($requete);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
  public function TotalOrder()
  {
    $requete = "SELECT COUNT(*) AS total_orders FROM carorder;";
    $stmt = $this->pdo->prepare($requete);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public function TotalVehicules()
  {
    $requete = "SELECT COUNT(*) AS total_voiture FROM voiture;";
    $stmt = $this->pdo->prepare($requete);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
  

  public function TotalUser()
  {
    $requete = "SELECT COUNT(*) AS total_membre FROM membre;";
    $stmt = $this->pdo->prepare($requete);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC);

  }


  public function CarAvailable()
  {
 
    $requete = "SELECT COUNT(*) AS carsCount FROM voiture WHERE carstatus = 0";
    $stmt = $this->pdo->query($requete);
    return $stmt->fetch(\PDO::FETCH_ASSOC)['carsCount'];
  
  }


  public function TotalAmount()
{
    $requete = "SELECT SUM(TotalCost) AS totalAmount FROM carorder";
    $stmt = $this->pdo->query($requete);
    return $stmt->fetch(\PDO::FETCH_ASSOC)['totalAmount'];
}




  public function NewOrderCount()
  {
    $requete = "SELECT COUNT(*) As Total FROM carorder  where OrderStatus = 0 ;";
    $stmt = $this->pdo->prepare($requete);
    $stmt->execute();
    $nb = $stmt->fetch(\PDO::FETCH_ASSOC);
    $nbcompte = $nb['Total'];
    return $nbcompte;

  }
   public function NewOrder()
   {
    // $requete = "SELECT * FROM carorder  where OrderStatus = 0 ";
    $requete = "SELECT carorder.*,location.*, membre.*, voiture.*, types_de_voiture.*, carorder.id AS carorder_id
    FROM carorder 
    INNER JOIN membre ON carorder.id_User = membre.id
    INNER JOIN voiture ON carorder.voiture_id = voiture.id
    INNER JOIN location ON carorder.id_location= location.id
    INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
    WHERE OrderStatus = 0
    ORDER BY membre.id; ";
    $stmt = $this->pdo->prepare($requete);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  // $requete = "SELECT * FROM carorder  where OrderStatus = 0 ";
  public function NewOrderById($id)
  {
    $requete = "SELECT carorder.*, location.*, membre.*, voiture.*, types_de_voiture.*, carorder.id AS carorder_id
      FROM carorder 
      INNER JOIN membre ON carorder.id_User = membre.id
      INNER JOIN location ON carorder.id_location= location.id
      INNER JOIN voiture ON carorder.voiture_id = voiture.id
      INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
      WHERE carorder.id = :id
      ORDER BY membre.id";
      
    $stmt = $this->pdo->prepare($requete);
    $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(\PDO::FETCH_ASSOC); 
    }






}
