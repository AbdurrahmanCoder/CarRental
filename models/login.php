<?php  
    
    
    namespace LoginForm;
 
    
    // session_start();      
    class Login {
        private $pdo;
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
    
        public function authenticate($email,$password ) {
          
            if (isset( $email ) && isset($password)) {
    
                $sql = "SELECT * FROM membre WHERE email = :email";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['email' => $email]); 
                $user = $stmt->fetch(\PDO::FETCH_ASSOC); 
    
                if ($user) {
                    $emailDb = $user["email"];
                    $mdpDb = $user["mdp"];
                    $pseudoData = $user['pseudo'];
                    $statut = $user['statut'];
                    if ($email == $emailDb && password_verify($password,$mdpDb)) { 
                        $_SESSION['user_id'] = $user['id']; 
                        $_SESSION['email'] = $emailDb;  
                        $_SESSION['membre'] = $user;
                        $_SESSION['pseudoData'] = $pseudoData;    
                        return true;
                    }
                }
            }
        }
    }