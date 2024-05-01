<?php

namespace PaymentSucess;

 
class Payment
{
 
    function PaymentSucess($voiture_id)
    {

        $sql2 = "UPDATE carorder SET paymentStatus = 1 WHERE carId = :SelectedId";
        $stmt2 = $this->pdo->prepare($sql2);  
        $stmt2->bindParam(':SelectedId', $voiture_id);     
        $stmt2->execute(); 
        echo "Data inserted successfully."; 

         
    } 


}

