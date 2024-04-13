<!DOCTYPE html>
  <html lang="en">
  
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="front\css\admin.css">
    <link rel="stylesheet" href="front\css\home.css"> 
    </head>

    <body >


<?php 
       if (isset($_GET['selectedId'])) {
       if ($_GET['selectedId']) {
       
         include_once("header.php") ;
         ?>

 
<div class="container "  >
  
<h1>dededed</h1>

 




<?php 
foreach ($SelectedIdData as $order) {
 
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
                        <div>
               
                        <?php 

            //   $order['OrderStatus'] = 1;

            $statusClass = ($order['OrderStatus'] === 1) ? 'confirmed' : 'pending';
            $statusText = ($order['OrderStatus'] === 1) ? 'Confirmed' : 'Pending';
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
    }
?>










</div>


<?php
 } 
else
{
    ?>    

 
    <div class="container"  >
     
        <?php include_once("header.php") ?>
  
    <div class="Content">

    
    <div class="container mt-5">
    
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

    </div>
    </div>






  </body> 

  </html>
  <?php
}}
 

?>



 