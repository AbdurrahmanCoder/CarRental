<?php

namespace Session;

session_start(); // Starting the session
class Session {
    public function handleOrderSearch($postData) {
 
        $_SESSION['Location'] = isset($postData['Location']) ? $postData['Location'] : null;
        $_SESSION['PickUp'] = isset($postData['PickUp']) ? $postData['PickUp'] : null;
        $_SESSION['PickUpTime'] = isset($postData['PickUpTime']) ? $postData['PickUpTime'] : null;
        $_SESSION['DropOf'] = isset($postData['DropOf']) ? $postData['DropOf'] : null;
        $_SESSION['DropOfTime'] = isset($postData['DropOfTime']) ? $postData['DropOfTime'] : null;
        $_SESSION['Checked'] = 1;  // Assuming this is a default value
        
        echo "Form data has been successfully stored in session variables.";
    }
    public function getSessionData() {
        // Return session data as an array
        return $_SESSION;
    }

    


}

// // Creating an instance of FormHandler
// $formHandler = new FormHandler();

// // Calling the method to handle form data
// $formHandler->handleFormData();
 