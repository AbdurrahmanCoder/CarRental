<?php


//namespace Register;
require_once "models/config.php";


class Register
{

    private $pdo;

    public function __construct() {
        try { 
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
   
    public function insertData()
    {
        try {

            // Validate and sanitize input data
            $pseudoValue = isset($_POST['pseudo']) ? filter_var($_POST['pseudo']) : 'default_pseudo_value';

            // Check for required fields
            $requiredFields = ['pseudo', 'mdp', 'nom', 'prenom', 'email', 'telephone'];
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field])) {
                    throw new \Exception("Field '$field' is missing in POST data.");
                }
            } 
            $sql = "INSERT INTO membre (pseudo, mdp, nom, prenom, email, telephone, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :telephone, :statut)";
            $mdpencrpt = password_hash($_POST['mdp'], PASSWORD_BCRYPT); 
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudoValue);
            $stmt->bindParam(':mdp', $mdpencrpt);
            $stmt->bindParam(':nom', $_POST['nom']);
            $stmt->bindParam(':prenom', $_POST['prenom']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':telephone', $_POST['telephone']);
            $stmt->bindValue(':statut', 0);
            $stmt->execute();
            $response = "true";
            echo  $response; 
        } catch (\Exception $e) { 
            echo "Error: " . $e->getMessage();
        }
    }
} 
