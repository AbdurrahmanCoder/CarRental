  
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
        .selectedtag{

            background-color: red;
            color: green;
        }
        

main{ 
  display: flex;
  /* gap: 10%; */
} 

#dashboardLink
{
  /* width: 100%; */
  background-color: #006aff;
}  

    .DashboardSideBar {
        /* background-color: red; */
        width: 15%;
        background-color: black;
    }



    .NewOldOrder {
        width: 70%;
        margin-left: 2%;
        /* display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
    height: 240px; */
    }

    .DashboardSideBar a {
          font-size: large;

          color: #838383;
        }

.flex{
    display: flex;
    /* background-color: red; */
    height: 50px;
}
/* 

        .DashboardSideBar a:hover {
 

          background-color: rgba(255, 255, 255, .3);
          color: #fff;
        }

 */


    </style>
</head>
<body>

<main>

    <div class="DashboardSideBar">
        
        <a  id="NewOrder" class="nav-link">new order </a>
        <a  id="OldOrder"  class="nav-link">old order</a> 
        
    </div>
    
    <div class="NewOldOrder">
        
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
                        <!-- <img src="../front/imgRental/ <?php echo $order['photo']; ?>" alt="" width="200px"> -->
                        <img src="../front/imgRental/<?php echo $order['photo']; ?>" alt="" width="200px">
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
                        <p><?php ?></p>  
                    </div>
                    <div>
                        <p> total paid </p>
                        <p><?php echo $order['TotalCost']; ?> </p>
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
               
                    <div class="flex">

                        <div> 
                            <?php  
            $statusClass = ($order['OrderStatus'] === 1) ? 'confirmed' : 'pending';
            $statusText = ($order['OrderStatus'] === 1) ? 'Confirmed' : 'Pending';
            ?>
            <button class="button <?php echo $statusClass; ?>"><?php echo $statusText; ?></button> 
        </div> 


        <div> 
        <a href=" ../<?php echo $order['invoice']?>" download class="invoice-btn">
        
        
        <button class="button"> Invoice</button> 
    </a>
    </div> 


    </div>
        
    </div>
    
</div>
</div>
</section>





<!--//tocheck-->




<?php
}
?>
</div>





</main>
</body>

<script> 
 

document.addEventListener('DOMContentLoaded', function() {
    let selectors = document.querySelectorAll('.DashboardSideBar > a');

    selectors.forEach(selector => {
        selector.addEventListener('click', function(e) {
             e.preventDefault();  

            // Remove the color from all links
            selectors.forEach(sel => {
                sel.style.color = "";
            });

            // Change the color of the clicked link
            this.style.color = "white";

            // Perform navigation programmatically
            let orderId = this.id;
            if (orderId === "NewOrder") {
                window.location.href = "/user?id=newOrder";
            } else if (orderId === "OldOrder") {
                window.location.href = "/user?id=oldOrder";
            }
        });
    });

    // Set the color of the link corresponding to the current page
    let currentPath = window.location.pathname;
    if (currentPath.includes("newOrder")) {
        document.getElementById("NewOrder").style.color = "white";
    } else if (currentPath.includes("oldOrder")) {
        document.getElementById("OldOrder").style.color = "white";
    }
});























</script>

</html>






