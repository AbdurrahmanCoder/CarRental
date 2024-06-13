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
        // $requete = "SELECT carorder.*, membre.*, voiture.*
        // FROM carorder
        // INNER JOIN membre ON carorder.id_User = membre.id
        // INNER JOIN voiture ON carorder.voiture_id = voiture_id
        // WHERE membre.id";
        $requete = "SELECT carorder.*, membre.*, voiture.*, location.*, types_de_voiture.*, carorder.id AS carorder_id
        FROM carorder 
        INNER JOIN membre ON carorder.id_User = membre.id
        INNER JOIN voiture ON carorder.voiture_id = voiture.id
        INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
        INNER JOIN location ON carorder.id_location= location.id
        ORDER BY membre.id;";

        $stmt = $pdo->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // public function ShowDataBySearch($search)
    // {
    //     $pdo = $this->db->getConnection();

    //      $requete = "SELECT carorder.*, membre.*, voiture.*, types_de_voiture.*, carorder.id AS carorder_id
    //         FROM carorder 
    //         INNER JOIN membre ON carorder.id_User = membre.id
    //         INNER JOIN voiture ON carorder.voiture_id = voiture.id
    //         INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
    //         WHERE carorder.id LIKE '% $search %'

    //         ";
    //     $stmt = $pdo->prepare($requete);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function ShowDataBySearch($search)
    {
        $pdo = $this->db->getConnection();

        // $requete = "SELECT carorder.*, membre.*, voiture.*, types_de_voiture.*, carorder.id AS carorder_id
        //             FROM carorder 
        //             INNER JOIN membre ON carorder.id_User = membre.id
        //             INNER JOIN voiture ON carorder.voiture_id = voiture.id
        //             INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
        //             WHERE carorder_id LIKE :searchTerm"; 
        // Add the % wildcards to the search term

 

        $requete = "SELECT  carorder.*,location.*, membre.*, voiture.*,  types_de_voiture.*, carorder.id AS carorder_id
                    FROM carorder 
                    INNER JOIN membre ON carorder.id_User = membre.id
                    INNER JOIN voiture ON carorder.voiture_id = voiture.id
                    INNER JOIN types_de_voiture ON types_de_voiture.id = voiture.typeId
                    INNER JOIN location ON carorder.id_location= location.id
                    WHERE carorder.id LIKE :searchTerm OR membre.nom LIKE :searchTerm";

        // -- WHERE carorder.id LIKE :searchTerm";  

        $searchWithWildcards = '%' . $search . '%';
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':searchTerm', $searchWithWildcards, PDO::PARAM_STR);
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
        }

        $sql = "INSERT INTO voiture (marque, kilometrage, tarif, photo ,typeId,carstatus) 
        VALUES (:marque, :kilometrage, :tarif, :photo,:typeId,:carstatus )";
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

    public function CarReturned($SelectedId,$carid)
    {
        $pdo = $this->db->getConnection();
        $sql = "UPDATE carorder SET ReturnStatus = 1 WHERE id = :SelectedId; ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':SelectedId', $SelectedId, PDO::PARAM_INT);
        $stmt->execute();


        $sql2 = "UPDATE voiture SET carstatus = 0 WHERE id = :carid; ";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':carid', $carid, PDO::PARAM_INT);
        $stmt2->execute(); 
    }

    public function CarUpdate($id,$tarif,$kilometrage)
    {
        try {
            $pdo = $this->db->getConnection();
            $sql = "UPDATE voiture SET kilometrage = :kilometrage, tarif = :tarif WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':tarif', $tarif, PDO::PARAM_INT);
            $stmt->bindParam(':kilometrage', $kilometrage, PDO::PARAM_INT);
            $stmt->execute(); 
            return true;
        } catch (PDOException $e) {
            // Handle the exception as needed
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function TestimonialDelete($id)
    {
        try {
            $pdo = $this->db->getConnection();
            $sql = "DELETE from temoignage  WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute(); 
            return true;
        } catch (PDOException $e) {
            // Handle the exception as needed
            echo "Error: " . $e->getMessage();
        }
    }
    









}

 

$AdminInstance = new Admin;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if (isset($data->action)) {
        $action = $data->action;

        if ($action === 'search') {
            $query = $data->query;
            echo "Search results for: " . $query;
            $result = $AdminInstance->ShowDataBySearch($query);

            $table = '<table>
            <tr>
            <th class="table_header">ID User</th>
            <th class="table_header">City</th>
            <th class="table_header">PickUpDate	</th>
            <th class="table_header">PickUpTime</th>
            <th class="table_header">DropDate</th>
            <th class="table_header">DropTime</th>
            <th class="table_header">nom</th>
            <th class="table_header">prenom</th>
            <th class="table_header">email</th>
            <th class="table_header">details</th>
             </tr>';

            // Loop through each $result item to create table rows
            foreach ($result as $data) {
                $table .= '
                <tr>
        <td>' . $data['carorder_id'] . '</td>
            <td>' . $data['City'] . '</td>
            <td>' . $data['PickUpDate'] . '</td>
            <td>' . $data['PickUpTime'] . '</td>
            <td>' . $data['DropDate'] . '</td>
            <td>' . $data['DropTime'] . '</td>
            <td>' . $data['nom'] . '</td>
            <td>' . $data['prenom'] . '</td>
            <td>' . $data['email'] . '</td>
            <td>  <a href="/admin?id=orderlist&CarOrderId=' .$data['carorder_id'] . '">
                <p>More details</p>
            </a>
        </td>
         
            </tr>';
            }

            // Close the table
            $table .= '</table>';

            echo $table;


        } elseif ($action === 'all') {


            echo "All data from the database";
            $result = $AdminInstance->CommandeAffficher();


            $table = '<table>
    <tr>
    <th class="table_header">ID User</th>
        <th class="table_header">City</th>
        <th class="table_header">PickUpDate	</th>
        <th class="table_header">PickUpTime</th>
        <th class="table_header">DropDate</th>
        <th class="table_header">DropTime</th>
        <th class="table_header">nom</th>
        <th class="table_header">prenom</th>
        <th class="table_header">email</th>
        <th class="table_header">details</th>
     </tr>';
 
 
                foreach ($result as $data) {
                $table .= '
        <tr>
        <td>' . $data['carorder_id'] . '</td>
            <td>' . $data['City'] . '</td>
            <td>' . $data['PickUpDate'] . '</td>
            <td>' . $data['PickUpTime'] . '</td>
            <td>' . $data['DropDate'] . '</td>
            <td>' . $data['DropTime'] . '</td>
            <td>' . $data['nom'] . '</td>
            <td>' . $data['prenom'] . '</td>
            <td>' . $data['email'] . '</td>
            <td>  <a href="/admin?id=orderlist&CarOrderId=' .$data['carorder_id'] . '">
                <p>More details</p>
            </a>
        </td> 
            </tr>';
            } 
            // Close the table
            $table .= '</table>';
            echo $table;
            // echo var_dump($result);

        } else {
            echo "nothing";
        }
    } else {
        echo "Invalid JSON format";
    }
} else {
    echo "Invalid request method";
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'insert':


            if (isset($_POST['marque']) && isset($_POST['kilometrage']) && isset($_POST['tarif']) && isset($_FILES["image_file"]["tmp_name"]) && isset($_POST['carType'])) {
                $marque = $_POST['marque'];
                $kilometrage = $_POST['kilometrage'];
                $tarif = $_POST['tarif'];
                $photo = $_FILES["image_file"]["tmp_name"];
                $carType = $_POST['carType'];
                $datainsert = new Admin;
                $sucess = $datainsert->insertItem($marque, $kilometrage, $tarif, $photo, $carType);
                echo "not working" . $action;
                if ($sucess) {

                    echo "data inserted";
                } else {
                    echo "data not inserted";
                }
            } else {
                "not working" . $action;
            }
            
            break;
        case 'delete':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $datainsert = new Admin;
                $datainsert->DeleteItem($id);
                echo "data deleted";
            } else {
                echo "no data submitted";
            }
            break;
        case 'confirmed':
            if (isset($_POST['SelectedId'])) {
                $SelectedId = $_POST['SelectedId'];
                $datainsert = new Admin;
                $datainsert->confirmed($SelectedId);
                echo "confirmed";
            } else {
                echo "no data submitted";
            }
            break;
        case 'return':
            if (isset($_POST['CarReturned'])) {
                $SelectedId = $_POST['CarReturned'];
                $Carid = $_POST['Carid']; 
                $datainsert = new Admin;

                $datainsert->CarReturned($SelectedId,$Carid); 

                echo "returned"; 
                
                
            } else {
                echo "no data submitted";
            }
            break;
        case 'search':

            if (isset($_POST['query'])) {
                $query = $_POST['query'];

                echo "confirmed", $query;
            } else {
                echo "no data from query ";
            }

            break;

            case 'update':  
                
                if (isset($_POST['tarif']) && isset($_POST['carId']) && isset($_POST['kilometrage'])     ) { 
                    $id = $_POST['carId']; 
                    $tarif = $_POST['tarif']; 
                    $kilometrage = $_POST['kilometrage']; 

                    echo $id,$tarif, $kilometrage,"from adminMOD database"; 
                    
                    $datainsert = new Admin;
                    if ($datainsert->CarUpdate($id, $tarif, $kilometrage)) {
                        // Return JSON response
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Car updated successfully',
                            'carId' => $id,
                            'tarif' => $tarif,
                            'kilometrage' => $kilometrage
                        ]);
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Failed to update car'
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Invalid input'
                    ]); 
                } 

                break; 


                case 'TestimonialDelete':

                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $datainsert = new Admin;
                        $datainsert ->TestimonialDelete($id);

                        echo "confirmed", $query;
                    } else {
                        echo "no data from query ";
                    }
        
                    break;

  



        default:
            // Handle unrecognized action
            echo "Unrecognized action";
            break;
    }
}

