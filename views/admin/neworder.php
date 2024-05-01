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

    <div class="container">
        <?php
        include_once ("header.php") ?>
        <div class="Content">
            <div class="container mt-5">
                <?php
                if (isset($_GET['selectedId'])) {
                    ?>


                    <article class="MainArticle">
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
                                                class="button <?php echo $statusClass; ?>"> <?php echo $statusClass; ?>
                                            </button>
                                            <p><?php echo gettype($SelectedIdData['OrderStatus']) ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>



                        <section>


                            <p>
                                <?php echo $SelectedIdData['nom'] ?>
                            </p>


                            <p>
                                <?php echo $SelectedIdData['prenom'] ?>
                            </p>


                            <p>
                                <?php echo $SelectedIdData['email'] ?>
                            </p>

                            <div>
                                <p>payment status </p>

                                <?php $statusPaid = ($SelectedIdData['PaymentStatus'] === 1) ? 'paid' : 'not-paid'; ?>

                                <p class="payment-status <?php echo $statusPaid ?>"></p>
                                <p><?php echo $statusPaid ?></p>

                            </div>


                            <p>
                                <?php echo $SelectedIdData['email'] ?>
                            </p>



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
        </div>






    </body>

    </html>
    <?php


                }


                ?>



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
        margin: 10rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

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
    .Section_Review {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .vehicleDiv {
        display: flex;
        justify-content: space-between;
    }

    .vehicleDiv_descrip {
        flex: 1;
        margin-right: 20px;
    }

    .vehicleImage {
        margin-bottom: 20px;
    }

    .vehicleImage img {
        width: 200px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .Rate {
        flex: 1;
    }

    .button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .confirmed {
        background-color: green;
    }

    .pending {
        background-color: orange;
    }

    /* Styling for Section */
    section {
        margin-top: 20px;
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;
    }

    section p {
        margin-bottom: 10px;
    }

    .payment-status {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 5px;
    }

    .payment-status.paid {
        background-color: green;
    }

    .payment-status.not-paid {
        background-color: red;
    }



    .MainArticle {
        display: flex;
        flex-direction: column;
        background-color: red;
        justify-content: center;
        align-items: center;
    }
</style>