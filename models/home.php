<?php 


namespace Home;

class Home 
{

      private $pdo;  
      
      public function __construct($pdo)
      {
          $this->pdo = $pdo;
      }
   
 
    public function Location()
    { 
        $sql = "SELECT * FROM  location ";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute();
 
         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        return  $result ; 
       
    } 
    
    public function LocationById($id)
    { 
        try {
            $sql = "SELECT * FROM location WHERE id = :id";
            $stmt = $this->pdo->prepare($sql); 
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT); // Assuming id is an integer
            $stmt->execute(); 
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            return $result;
        } catch (\PDOException $e) {
            // Handle any potential errors here
            return null; // Or you can throw an exception if you prefer
        }
    }
  


} 
