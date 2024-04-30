<?php 


namespace Vehicule;

class VehiculeModels 
{

      private $pdo;  
      
      public function __construct($pdo)
      {
          $this->pdo = $pdo;
      }
   
      public function TypesofVoiture()
      {   
          $sql = "SELECT  * FROM  types_de_voiture ";
          $stmt = $this->pdo->prepare($sql);
          $stmt->execute();  
          $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
          return  $result ;  
      } 
    public function VehiculeModelsFetch()
    {   
        $sql = "SELECT  * FROM  voiture where carstatus = 0 ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();  
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        return  $result ;  
    } 
    
    public function VehiculeModelsFetchByType($selectedType)
    { 
        $sql = "SELECT voiture.*, types_de_voiture.*
        FROM voiture
        INNER JOIN types_de_voiture ON voiture.typeId = types_de_voiture.id 
        WHERE carstatus = 0 AND types_de_voiture.id = :ids";    
     
        $stmt = $this->pdo->prepare($sql);
         $stmt->bindParam(':ids', $selectedType); 
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
    public function VehiculeModelsDelteById($id)
    { 
        $sql = "SELECT * FROM  voiture WHERE  id= :id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id); 
        $stmt->execute();

         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        return  $result ; 
       
    }


    public function VehiculeType()
    { 
        $sql = "SELECT * FROM  types_de_voiture ";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute();
 
         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        return  $result ; 
       
    }









    


} 
