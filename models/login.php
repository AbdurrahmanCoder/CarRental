<?php  
require_once 'config.php';   

session_start();      
try {
$pdo = new PDO('mysql:host='.DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];  
    $sql = "SELECT * FROM membre WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 
    if ($user) {
        $emailDb = $user["email"];
        $mdpDb = $user["mdp"];
        $pseudoData = $user['pseudo'];
        $statut = $user['statut'];
        if ($email == $emailDb && password_verify($password,$mdpDb)) {
            // Authentication successful
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['email'] = $emailDb;  
            $_SESSION['membre'] = $user;
            $_SESSION['pseudoData'] = $pseudoData;  
       // Return a success message
       echo json_encode(["status" => "success", "message" => "Authentication successful"]);
    } else {
        // Authentication failed
        echo json_encode(["status" => "error", "message" => "Incorrect email or password"]);
    }
} else {
    // User not found
    echo json_encode(["status" => "error", "message" => "User not found"]);
}
}
}
