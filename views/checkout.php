<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="front\css\checkout.css">
    <link rel="stylesheet" href="front\css\home.css">

</head>

<body>
    <?php
    if (isset($_SESSION['processed_data'])) {
        $carids = $_SESSION['processed_data']['carids'];
        $marque = $_SESSION['processed_data']['marque'];
        $tarif = $_SESSION['processed_data']['tarif'];
        $img = $_SESSION['processed_data']['img'];

        // unset($_SESSION['processed_data']);
    } else {
        echo "<p>No data available.</p>";
    }
    if (isset($_SESSION["user"])) {
        $date1 = new DateTime($_SESSION['user']['PickUp']);
        $date2 = new DateTime($_SESSION['user']['DropOf']);
        $interval = $date1->diff($date2);
        $days = $interval->format('%a');
        $daysChange = $days == 0 ? 1 : $days;
        $total = $daysChange * $tarif; 
        $_SESSION['total'] = $total;
        $_SESSION['days'] = $days;
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
  
    <?php
    if (isset($_SESSION['user'])) {
        $userFromSession = $_SESSION['user'];
        $location = $userFromSession['Location'];
        $pickUp = $userFromSession['PickUp'];
        $pickUpTime = $userFromSession['PickUpTime'];
        $dropOf = $userFromSession['DropOf'];
        $dropOfTime = $userFromSession['DropOfTime'];
    } else {
        // echo "User data not found in session.";
    }

 ?>
        <div class="reviewMain">

            <div class="container ">
                <div class="review">
                    <h1>Review and proceed to booking </h1>

                    <div class="total">
                        <p>TOTAL </p>
                        <h3>€
                            <?php echo $TotalTarif ?>
                        </h3>
                    </div>

                </div> 
            </div>
        </div>

        <section class="Section_Review">

            <div class="container containerReview">
                <!-- <h2>review</h2>  -->

                <div class="vehicleDiv">

                    <div class="vehicleDiv_descrip">
                   <?php  foreach ($results as $order) { ?>

                    <div class="vehicleImage">
                        <h4>vehicle</h4>
                        <img src=" ../front/imgRental/<?php echo $order['photo'] ?>" alt="" width="200px">
                        <h4>
                            <?php echo $order['marque'] ?>
                        </h4>
                    </div>
                    
                <?php } ?>

                        <h3>Pick up & return </h3>

                        <div class="vehicleImage">
                            <h5>pick up</h5>
                            <h3>
                                <?php echo $_SESSION['Location']; ?>
                            </h3>
                            <p>
                                <?php echo $_SESSION['PickUp'] ?>
                                <?php echo $_SESSION['PickUpTime'] ?>
                            </p>
                            <hr>
                            <h5>return</h5>
                            <h3>
                                <?php echo $_SESSION['Location'] ?>
                            </h3>
                            <p>
                                <?php echo $_SESSION['DropOf'] ?>
                                <?php  echo $_SESSION['DropOfTime'] ?>
                            </p>
                        </div>
                    </div>

                    <div class="Rate"> 
                        <div>
                            <p> <B>Basic rate for
                                    <?php echo $dateInfo['days']; ?> days
                                </B></p>
                            <p>Included </p>
                        </div>


                        <div>
                            <p>Mileage 4625 km </p>
                            <p>Included</p>

                        </div>
                        <div>
                            <p>Licenses &amp; Fees </p>
                            <p>Included</p>
                        </div>
                        <div>
                            <p>High Season Surcharge </p>
                            <p>Included</p>
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
                            <p>VAT <span class="tax"> See full T&amp;Cs </span> </p>
                            <p>Included</p>

                        </div>
 
                    </div>

                </div>
            </div>
        </section>
        <section class="Section_Total">

            <div class="container containerTotal">
                <div>

                    <h1>TOTAL <span>
                            To pay online</span> </h1>
                    <h3>€
                        <?php echo $TotalTarif; ?>
                    </h3>
                </div>
            </div>
        </section>
 

        <section class="Section_Total">
            <div class="container  ContainerFooter">
                <form action="" method="GET">
                    <!-- Add any other form fields or data you need to submit -->
                    <input type="hidden" name="payed" value="true">
                    <button type="submit" class="pay redBlock Form_book_btn">PAY</button>
                </form>
            </div>
        </section>

    

 