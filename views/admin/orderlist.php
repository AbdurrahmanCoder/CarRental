<?php
  // $results = new admin;
  // $orderList = $results->CommandeAffficher(); 
  
  
  if (!isAdmin()) {
    header("Location: login.php");
    exit();
  } else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
      
      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="front\css\admin.css">
      <link rel="stylesheet" href="front\css\home.css">
    </head>

    <body>
      
      <div class="container">
        <?php

        include_once ("header.php") ?>
        <div class="Content">
          
          
          
          <div class="container mt-5">
            


          <div class="OrderListDiv">
 
            <input type="text" id="search" placeholder="Search...">
            <div id="result"></div> 
            



          </div>
          </div>


        </div>


      </div>
      
      
      

     
    </body> 
     <script >
    document.addEventListener('DOMContentLoaded', function () {
    const resultDiv = document.getElementById('result');

     function fetchAllData() {
        fetch('../models/AdminMod.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'all'
            })
        })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          resultDiv.innerHTML = data;    
        })  
        .catch(error => console.error('Error:', error)); 
    } 
      fetchAllData(); 

        const searchInput = document.getElementById('search');
        searchInput.addEventListener('keyup', function () {
        const query = searchInput.value.trim();
          if (query !== '') {
            fetch('../models/AdminMod.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    query: query,
                    action: 'search'
                })
            })
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = data;
                console.log(data);
            })
            .catch(error => console.error('Error:', error));
        } else {
            // If search input is empty, fetch all data
            fetchAllData();
        }
    });
});
 

  </script> 



    </html>



    <?php
  }
  ?>
  
  
  
  <style>
  table {
      width: 100%;
      border-collapse: collapse;
  }
  th, td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
  }
  th {
      background-color: #f2f2f2;
  }


/* *************************************ICON ********************************* */
 .search-container {
        position: relative;
        width: 300px; /* Adjust the width as needed */
        height: 40px; /* Adjust the height as needed */
    }
    
    /* Style for the search input */
    #search {
        width: 100%;
        height: 100%;
        padding: 10px 40px 10px 10px; /* Adjust the padding to make space for the icon */
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 20px; /* Adjust border radius as needed */
        outline: none;
    }
    
    /* Style for the search icon */
    .search-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 20px; /* Adjust the icon width as needed */
        height: 20px; /* Adjust the icon height as needed */
        fill: #999; /* Adjust icon color as needed */
    }


    .OrderListDiv{
      display: flex;
      flex-direction: column;
      background-color: palegoldenrod;
      width: 100%;
      gap: 5%;
     }

</style>