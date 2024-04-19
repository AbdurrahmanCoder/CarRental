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

          <table class="table">

            <tr>
              <th>ID</th>
              <th>City</th>
              <th>PickUpDate</th>
              <th>PickUpTime</th>
              <th>DropDate</th>
              <th>DropTime</th>
              <th>nom</th>
              <th>prenom</th>
              <th>email</th>
              <th>Details</th>
            </tr>
            </thead>
            <tbody>
        </div>

      </div>
    </div>

    <input type="text" id="search" placeholder="Search...">

    <div id="result"> 

    </div> 

  </body> 
    <script >X
      document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');
        const resultDiv = document.getElementById('result'); 
        searchInput.addEventListener('keyup', function () {
          const query = searchInput.value;
          
          console.log(query) 
          if (query !== '') {
            fetch('../models/AdminMod.php', {
              method: 'POST',
              headers: {
                'Content-Type':'application/json'
              },
              body: JSON.stringify({
                action: 'search',
                query: query
              }) 
            })
              .then(response => response.text())
              .then(data => {
                resultDiv.innerHTML = data;
                console.log(data)
              })
              .catch(error => console.error('Error:', error));
          }
        });
      });
    </script>



  </html>



  <?php
}
?>