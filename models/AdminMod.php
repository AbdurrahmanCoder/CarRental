<?php

require_once "Database.php";

use Database\Database;

class Admin
{

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
    public function insertItem($marque, $kilometrage, $tarif, $photo, $carType)
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
        if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_path)) {
            //   echo "non";
            // header("Location:index.php?message=er");
        }
        
        $sql = "INSERT INTO voiture (marque, kilometrage, tarif, photo ,typeId,carstatus) VALUES (:marque, :kilometrage, :tarif, :photo,:typeId,:carstatus )";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':kilometrage', $kilometrage);
        $stmt->bindParam(':tarif', $tarif);
        $stmt->bindParam(':photo', $new_image_name);
         $stmt->bindValue(':carstatus', 0);
        $stmt->bindValue(':typeId', $carType);
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

    public function confirmed($SelectedId)
    {
        $pdo = $this->db->getConnection();
        $sql = "UPDATE carorder SET orderstatus = 1 WHERE id = :SelectedId; ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':SelectedId', $SelectedId, PDO::PARAM_INT);
        $stmt->execute(); 
    }

}



// if (isset($_POST['marque']) && isset($_POST['kilometrage']) && isset($_POST['tarif']) && isset($_FILES["image_file"]["tmp_name"]) && isset($_POST['carType'])) {
//     $marque = $_POST['marque'];
//     $kilometrage = $_POST['kilometrage'];
//     $tarif = $_POST['tarif'];
//     $photo = $_FILES["image_file"]["tmp_name"];
//     $carType = $_POST['carType'];
 

//     $datainsert = new Admin;
//     if ($datainsert->insertItem($marque, $kilometrage, $tarif, $photo, $carType)) {
//         echo "data inserted";
//     } else {
//         echo "data not inserted";
//     }
// }


// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $datainsert = new Admin;
//     $datainsert->DeleteItem($id);
//     echo "data deleted";
// } else {
//     echo "no data submitted";
// }


// if (isset($_POST['SelectedId'])) {
//     $SelectedId = $_POST['SelectedId'];
//     $datainsert = new Admin;
//     $datainsert->confirmed($SelectedId);
//     echo "confirmed";
// } else {
//     echo "no data submitted";
// }



// if (isset($_POST['query'])) {
//     $id = $_POST['query']; 
//     echo "data deleted";
// } else {
//     echo "no data submitted";
// }

if(isset($_POST['action'])) {
    $action = $_POST['action']; 
    if( $action  == "insert")
    { 
        if (isset($_POST['marque']) && isset($_POST['kilometrage']) && isset($_POST['tarif']) && isset($_FILES["image_file"]["tmp_name"]) && isset($_POST['carType'])) {
            $marque = $_POST['marque'];
                $kilometrage = $_POST['kilometrage'];
                $tarif = $_POST['tarif'];
                $photo = $_FILES["image_file"]["tmp_name"];
                $carType = $_POST['carType']; 
                $datainsert = new Admin;
                if ($datainsert->insertItem($marque, $kilometrage, $tarif, $photo, $carType)) {
                    echo "data inserted";
                } else {
                    echo "data not inserted";
                } 

            } 
}


}