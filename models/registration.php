<?php


namespace REG;

class Registration
{

    // private $pdo; 
   
    public function insertData($pdo)
    {
        try {
           // $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Validate and sanitize input dat a
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
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudoValue);
            $stmt->bindParam(':mdp', $mdpencrpt);
            $stmt->bindParam(':nom', $_POST['nom']);
            $stmt->bindParam(':prenom', $_POST['prenom']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':telephone', $_POST['telephone']);
            $stmt->bindValue(':statut', 0);
            $stmt->execute();
              $response = "true";           
              return $response ;
 
        } catch (\Exception $e) { 
            echo "Error: " . $e->getMessage();
            $response = "false";           
            return $response ;

       
        }
    }
} 
