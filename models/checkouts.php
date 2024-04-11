<?php
 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data sent from JavaScript
    
    $carids = $_POST['carids'];
    $marque = $_POST['marque'];
    $tarif = $_POST['tarif'];
    $img= $_POST['img'];

 
    // Store the data in the session
    $_SESSION['processed_data'] = array('carids' => $carids, 'marque' => $marque,'tarif' => $tarif,'img' => $img);
} else {
    // Handle the case where data is not sent via POST
    echo "No data received.";
}



 