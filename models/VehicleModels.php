<?php 


namespace Vehicule;

class VehiculeModels 
{

      private $pdo;  
      
      public function __construct($pdo)
      {
          $this->pdo = $pdo;
      }
  
  

    public function VehiculeModelsFetch()
    { 
        $sql = "SELECT  * FROM  voiture ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
 
        return  $result ;

       
    }
} 
