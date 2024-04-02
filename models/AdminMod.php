<?php 

require_once "config.php";

use Database\Database;

class Admin{

    private $db;
 
    public function __construct()
    {
        $this->db = new Database(); 
        
 
    } 
    public function CommandeAffficher()
    {
        $pdo = $this->db->getConnection();
        $requete = "SELECT carorder.*, membre.*, voiture.*
        FROM carorder
        INNER JOIN membre ON carorder.id_User = membre.id
        INNER JOIN voiture ON carorder.voiture_id = voiture_id
        WHERE membre.id";

       $stmt = $pdo->prepare($requete);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
public function insertItem($marque, $kilometrage, $tarif,$photo)
{
    $pdo = $this->db->getConnection();
    // echo "non";

    if (empty($photo)) {
        header("Location:index.php?message=er");
      }
      $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME); 
      $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION); 
      $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension; 
      $target_directory = "../front/imgRental/"; 
      if (!file_exists($target_directory)) { 
        mkdir($target_directory, 0777, true);   
      } 
      $target_path = $target_directory . $new_image_name; 
      if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)){   
    //   echo "non";
        // header("Location:index.php?message=er");
    }
      $sql = "INSERT INTO voiture (marque, kilometrage, tarif, photo, fiche) VALUES (:marque, :kilometrage, :tarif, :photo, :fiche)";
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':kilometrage', $kilometrage);
        $stmt->bindParam(':tarif', $tarif);
        $stmt->bindParam(':photo', $new_image_name);
        $stmt->bindValue(':fiche', 'default_value'); 
        $stmt->execute();
       if ($stmt->rowCount() > 0) {
          return true;  
        } else {
        return false;  
    }
    }
    
    public function DeleteItem($id)
{
    $pdo = $this->db->getConnection();

    $sql = "DELETE FROM voiture WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    } 
    }  
   if (isset($_POST['marque']) && isset($_POST['kilometrage']) && isset($_POST['tarif']) && isset($_FILES["image_file"]["tmp_name"])) {
    $marque = $_POST['marque'];
    $kilometrage = $_POST['kilometrage'];
    $tarif = $_POST['tarif'];
    $photo = $_FILES["image_file"]["tmp_name"];
    $datainsert = new Admin;
    if ($datainsert->insertItem($marque, $kilometrage, $tarif, $photo)) {
        echo "data inserted";
    } else {
        echo "data not inserted";
    }

    

}  

 
 if (isset($_POST['id'])) {
    $id = $_POST['id']; 
    $datainsert = new Admin;
    $datainsert->DeleteItem($id);
    echo "data deleted"; 
} else {
    echo "no data submitted";
}

     