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
<?php 
    if (!isset($_GET['CarOrderId'])) {
?>
        <div class="Content"> 
          
          <div class="container mt-5"> 
          <div class="OrderListDiv">
 
            <input type="text" id="search" placeholder="Search...">
            <div id="result"></div> 
             


          </div>
          </div>


        </div>
      </div>

<?php  } else  {  ?>
  
  <section class="Section_Review">

<div class="container containerReview">
    <!-- <h2>review</h2>  -->

    <div class="vehicleDiv">

        <div class="vehicleDiv_descrip">

            <div class="vehicleImage">
                <h4>vehicle</h4>
                <!-- <img src="../front/imgRental/ <?php echo $SelectedIdData['photo']; ?>" alt="" width="200px"> -->
                <img src="../front/imgRental/<?php echo $SelectedIdData['photo']; ?>" alt=""
                    width="200px">
                <h4>
                    <?php echo $SelectedIdData['marque']; ?>
                </h4>
            </div>


            <h3>Pick up </h3>

            <div class="vehicleImage">
                <h5>pick up</h5>
                <h3>
                    <?php echo $SelectedIdData['PickUpDate']; ?>
                </h3>
                <p>
                    <?php echo $SelectedIdData['City']; ?>
                </p>
                <hr>

            </div>
        </div>

        <div class="Rate">
            <div>
                <p> <B>Basic rate for
                        days
                    </B></p>
                <p>Included </p>
            </div>


            <div>
                <p>Tarif</p>
                <p><?php echo $SelectedIdData['tarif']; ?> € / jour</p>

            </div>
            <div>
                <p>total Days </p>
                <p><?php ?></p>
            </div>
            <div>
                <p> total paid </p>
                <p><?php echo $SelectedIdData['TotalCost']; ?> </p>
            </div>
            <div>
                <p>FLEETSC </p>
                <p>Included</p>
            </div>
            <div>
                <p>Environmental contribution </p>
                <p>Included</p>

            </div>
            <div>
                <p>Railway Station Surcharge </p>
                <p>Included</p>
            </div>

            <div>

                <?php 
           $statusClass = ($SelectedIdData['OrderStatus'] === 1) ? 'confirmed' : 'pending';
            //  $statusText = ($SelectedIdData['OrderStatus'] === 1) ? 'Confirmed' : 'Pending';
                ?>

                <button id="button" 
                
                data-SelectedId="<?php echo $SelectedIdData['carorder_id']; ?>"
 
                class="button <?php echo $statusClass; ?>"><?php echo $statusClass; ?>  </button>
             </div> 
            
                            <!-- ****************CAR RETURED BUTTON ****************** -->
          

                            <div>

                <?php 
           $statusClass = ($SelectedIdData['ReturnStatus'] === 1) ? 'Returned' : 'NotReturned';
            //  $statusText = ($SelectedIdData['OrderStatus'] === 1) ? 'Confirmed' : 'Pending';
                ?> 
                <button id="ReturnBtn" data-ReturnId="<?php echo $SelectedIdData['carorder_id']; ?>"
                data-Carid="<?php echo $SelectedIdData['voiture_id']; ?>"
                class="button <?php echo $statusClass; ?>"><?php echo $statusClass; ?>  </button> 
                    <p><?php echo gettype($SelectedIdData['OrderStatus']) ?></p> 
            
            
                  </div> 



          
        </div> 
    </div>
</div>
</section>  

  <?php  }   ?>



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
 

                      // car returned to set returned status to 1  and set car status = 0 for availabilty  

 

        let ReturnBtn = document.getElementById('ReturnBtn');

        ReturnBtn.addEventListener('click', CarReturned);

function  CarReturned() {
    
  const SelectedId = this.getAttribute('data-ReturnId');
    const  Carid = this.getAttribute('data-Carid');
console.log("helldzdzdzdzo",SelectedId);
console.log("helldzdzdzdzo",Carid);

    const buttonElement = this; 

    fetch('../models/AdminMod.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `CarReturned=${encodeURIComponent(SelectedId)}&Carid=${encodeURIComponent(Carid)}&action=return`,
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        console.log("eeddededededed");
        console.log(buttonElement); // Use buttonElement instead of this
        buttonElement.classList.remove("NotReturned");
        buttonElement.classList.add("Returned");
        buttonElement.innerHTML = "Returned";
    })
    .catch(error => {
        console.error('Error:', error);
    });

    console.log("clickedme", SelectedId);
}

 







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

    
    .confirmed {
        background-color: #ff8c00;
        /* background-color: orange; */
        /* Orange */
        color: #fff;
    }

    .pending {
        background-color: #3498db;
        /* Blue */
        color: #fff;
    }

    .OrderListDiv{
      display: flex;
      flex-direction: column;
      background-color: palegoldenrod;
      width: 100%;
      gap: 5%;
     }

     .button {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .Returned {
        background-color: #ff8c00;
        /* background-color: orange; */
        /* Orange */
        color: #fff;
    }

    .NotReturned {
        background-color: #3498db;
        /* Blue */
        color: #fff;
    }
</style>