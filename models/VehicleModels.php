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
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        return  $result ;  
    } 

    public function VehiculeModelsById($id)
    { 
        $sql = "SELECT * FROM  voiture WHERE  id= :id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id); 
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
 
        return  $result ;

       
    }


    


} 
