 <?php 
$Dashboard = new UserDashboard();
$UserOrder = $Dashboard->CommandeAffficher(); 
  var_dump($UserOrder);
   if (isset($_SESSION['user_id'])) {
          echo $_SESSION['user_id'];
        }
        
        
        echo "ekelkejklezj";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
        <link rel="stylesheet" href="front\css\checkout.css">

    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .order-container {
            display: flex;
            justify-content: space-around;
            border: 1px solid #ddd; 
            padding: 20px;
            background-color: #fff;
            margin:10rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom:20px;
        }

        .car-details, .user-details {
            width: 48%;
        }

        .images {
            width: 100%;
            max-width: 200px;
            height: auto;
            border-radius: 8px;
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

        .confirmed {
            background-color: #ff8c00; /* Orange */
            color: #fff;
        }

        .pending {
            background-color: #3498db; /* Blue */
            color: #fff;
        }
    </style>
</head>
<body>

<?php 
foreach ($UserOrder as $order) {
 
    ?>
 
    <!--//tocheck-->
   <section class="Section_Review">

            <div class="container containerReview">
                <!-- <h2>review</h2>  -->

                <div class="vehicleDiv">

                    <div class="vehicleDiv_descrip">

                        <div class="vehicleImage">
                            <h4>vehicle</h4>
                            <img src="views\admin\front\<?php echo $order['photo']; ?>" alt="" width="200px">
                            <h4>
                                <?php echo $order['marque']; ?>
                            </h4>
                        </div>


                        <h3>Pick up </h3>

                        <div class="vehicleImage">
                            <h5>pick up</h5>
                            <h3>
                                <?php echo $order['PickUpDate']; ?>
                            </h3>
                            <p> 
                                <?php echo $order['City']; ?>
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
                            <p><?php echo $order['tarif']; ?> € / jour</p>

                        </div>
                        <div>
                            <p>total Days </p>
                            <p><?php echo $order['days']; ?></p>
                        </div>
                        <div>
                            <p> total paid </p>
                            <p><?php echo $order['total']; ?> </p>
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
            $statusClass = ($order['Checked'] === 1) ? 'confirmed' : 'pending';
            $statusText = ($order['Checked'] === 1) ? 'Confirmed' : 'Pending';
            ?>
            <button class="button <?php echo $statusClass; ?>"><?php echo $statusText; ?></button>

                        </div>
 
                    </div>

                </div>
            </div>
        </section>
   
 



    <!--//tocheck-->
    
    
    
    
    <?php
}
?>


    


</body>
</html>



