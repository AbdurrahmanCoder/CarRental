<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front\css\admin.css">
    <link rel="stylesheet" href="front\css\home.css">

    <script src="front\js\adminPanel.js" async> </script>
</head>

<body>
    <main>
    

<div class="DashboardSideBar">


    
    <!-- <div class="container"> -->
        <?php
        include_once ("header.php") ?>
        </div>
       
       
       <div class="NewListcarDiv">


           
           <div class="Content">
               <div class="container mt-5">
                   <?php
                if (isset($_GET['selectedId'])) {
                    ?>


<article class="MainArticle">


    
 


 


    <section class="Section_Review">
        <div class="container containerReview">
            <div class="vehicleDiv">
                <div class="vehicleDiv_descrip">
                    <div class="vehicleImage">
                        <h4>Vehicle</h4>
                        <img src="../front/imgRental/<?php echo $SelectedIdData['photo']; ?>" alt="Vehicle Photo" width="200px">
                        <h4><?php echo $SelectedIdData['marque']; ?></h4>
                    </div>
                    <div class="pickupInfo">
                        <h3>Pick Up</h3>
                        <div class="pickupDetails">
                            <h5>Pick Up Date</h5>
                            <h3><?php echo $SelectedIdData['PickUpDate']; ?></h3>
                            <p><?php echo $SelectedIdData['City']; ?></p>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="Rate">
                    <div>
                        <p><strong>Basic Rate for Days</strong></p>
                        <p>Included</p>
                    </div>
                    <div>
                        <p>Tarif</p>
                        <p><?php echo $SelectedIdData['tarif']; ?> € / jour</p>
                    </div>
                    <div>
                        <p>Total Days</p>
                        <p><?php echo $SelectedIdData['totalDays']; ?></p>
                    </div>
                    <div>
                        <p>Total Paid</p>
                        <p><?php echo $SelectedIdData['TotalCost']; ?></p>
                    </div>
                    <div>
                        <p>FLEETSC</p>
                        <p>Included</p>
                    </div>
                    <div>
                        <p>Environmental Contribution</p>
                        <p>Included</p>
                    </div>
                    <div>
                        <p>Railway Station Surcharge</p>
                        <p>Included</p>
                    </div>
                    <div>
                        <button id="button" data-SelectedId="<?php echo $SelectedIdData['carorder_id']; ?>
                        " class="button <?php echo ($SelectedIdData['OrderStatus'] === 1) ? 'confirmed' : 'pending'; ?>">
                        <?php echo ($SelectedIdData['OrderStatus'] === 1) ? 'Confirmed' : 'Pending'; ?>
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- <section>
            <div class="customerInfo">
            
            <div>
                <p>nom</p>
                <p><?php echo $SelectedIdData['nom'] ?></p>
            </div>
            
            <div>
                <p>prenom</p>
                <p><?php echo $SelectedIdData['prenom'] ?></p>
            </div>
            
            <div>
                <p>email</p>
                <p><?php echo $SelectedIdData['email'] ?></p>
            </div>    
            
            
            
            
            <div class="paymentStatus">
                <p>Payment Status</p>
                <p class="payment-status <?php echo ($SelectedIdData['PaymentStatus'] === 1) ? 'paid' : 'not-paid'; ?>"></p>
                <p><?php echo ($SelectedIdData['PaymentStatus'] === 1) ? 'Paid' : 'Not Paid'; ?></p>
                </div>
            </div>
        </section> -->
        
        <section class="customerInfoSection">
    <div class="customerInfo">
        <div class="infoRow">
            <p class="infoLabel">Nom</p>
            <p class="infoValue"><?php echo $SelectedIdData['nom'] ?></p>
        </div>
        <div class="infoRow">
            <p class="infoLabel">Prenom</p>
            <p class="infoValue"><?php echo $SelectedIdData['prenom'] ?></p>
        </div>
        <div class="infoRow">
            <p class="infoLabel">Email</p>
            <p class="infoValue"><?php echo $SelectedIdData['email'] ?></p>
        </div>
        <div class="paymentStatus">
            <p class="statusLabel">Payment Status</p>
            <div class="statusIndicator <?php echo ($SelectedIdData['PaymentStatus'] === 1) ? 'paid' : 'not-paid'; ?>"></div>
            <p class="statusText"><?php echo ($SelectedIdData['PaymentStatus'] === 1) ? 'Paid' : 'Not Paid'; ?></p>
        </div>
    </div>
</section>





</article>

<?php
                } else {
                    ?>
                    <table class="table">
                        <thead>
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
                                <th>details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($CommandeListe as $ComData) { ?>
                                <tr>
                                    <td>
                                        <?php echo $ComData['carorder_id']; ?>

                                    </td>
                                    
                                    <td>
                                        <?php echo $ComData['City']; ?>
                                    </td>
                                    <td>
                                        <?php echo $ComData['PickUpDate']; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $ComData['PickUpTime']; ?>
                                        
                                    </td>
                                    <td>
                                        <?php echo $ComData['DropDate']; ?>
                                    </td>

                                    <td>
                                        <?php echo $ComData['DropTime']; ?>
                                    </td>

                                    <td>
                                        <?php echo $ComData['nom']; ?>
                                    </td>


                                    <td>
                                        <?php echo $ComData['prenom']; ?>
                                    </td>


                                    <td>
                                        <?php echo $ComData['email']; ?>
                                    </td>
                                    <td>
                                        <a href="/admin?id=neworder&selectedId=<?php echo $ComData['carorder_id']; ?>">
                                            <p>More details</p>
                                        </a>
                                    </td>
                    </div>
                    <?php
                            }

                            ?>
            </div>
        <!-- </div> -->



        
        
        
    </body>

    </html>
    <?php


                }


                ?>


</div>
</main>


<style>
    /* Add your styles here */

    
    main{ 
  display: flex;
  /* gap: 10%; */
} 
.DashboardSideBar {
    /* background-color: red; */
    width: 15%;
    background-color: red;
}



.NewListcarDiv {
    width: 70%;
    margin-left: 2%;
    /* display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
    height: 240px; */
}


    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    /* .order-container {
        display: flex;
        justify-content: space-around;
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #fff;
        margin: 10rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    } */

    .car-details,
    .user-details {
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





    /* 


    .button:hover {
    background-color: #0056b3;
}

.confirmed {
    background-color: #28a745;
}

.pending {
    background-color: #ffc107;
}
 */
    /* Styling for Section_Review */ 







    .vehicleDiv {
    padding: 16px;
}

.total h3 {
    font-size: 36px;
}


.total p {
    position: relative;

    text-align: end;
    font-size: 20px;
}

h3 {

    font-size: 36px;

}

.vehicleDiv {

    position: relative;
    display: flex;
    justify-content: space-between;
    width:100rem;
}

.vehicleDiv_descrip {

    width: 40%;
}

.vehicleImage {

    background-color: #f7f7f7;
}

.Section_Review {
    border-image-slice: 1;
    /* Ensure the entire border is used for the gradient */
    /* Add padding to prevent content from touching the border */
    border-image: linear-gradient(to top, #fafafa, #fbfbfb, #fcfcfc, #fdfdfd);
    /* Define the linear gradient */

    margin-top: 20px;

}

.containerReview {
    background-color: white;
    border: 1px solid #bfbfbf;
    border-radius: 5px;
}

.Rate {

    width: 100%;
    margin: 0 auto;
    width: 39%;
    margin-top: 5%;
    right: 0;
    position: absolute;
}

.Rate div {
    justify-content: space-between;
    display: flex;
    padding: 2px;

}

.tax {

    color: #090;
    font-size: 11px;
    font-weight: 700;
}

.Section_Total {
    margin-top: 5rem;
    ; 
} 
.containerTotal {

    /* border: 1px solid #090; */
    box-shadow: 0 0 0 1px #090, 0 5px 30px rgba(0, 153, 0, .3);
    border-radius: 5px;
    
}

.containerTotal div {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
}






/* ****************************************** new   ************************* */

.customerInfoSection {
    margin-top: 30px;
}

.customerInfo {
    background-color: #f8f8f8;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.infoRow {
    display: flex;
    justify-content: space-between;
    align-items: center; /* Align items vertically */
    margin-bottom: 10px;
}

.infoLabel {
    font-weight: bold;
    color: #333;
    flex-basis: 30%; /* Adjust label width */
}

.infoValue {
    flex-grow: 1;
}

.paymentStatus {
    display: flex;
    align-items: center;
    margin-top: 15px; /* Increase top margin */
}

.statusLabel {
    font-weight: bold;
    color: #333;
    flex-basis: 30%; /* Adjust label width */
}

.statusIndicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 10px;
}

.statusText {
    font-weight: bold;
    color: #333;
}

.statusIndicator.paid {
    background-color: #4CAF50; /* Green */
}

.statusIndicator.not-paid {
    background-color: #FFC107; /* Yellow */
}



     </style>