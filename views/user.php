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
            /* Orange */
            color: #fff;
        }

        .pending {
            background-color: #3498db;
            /* Blue */
            color: #fff;
        }

        .selectedtag {
            background-color: red;
            color: green;
        }

        main {
            display: flex;
        }

        #dashboardLink {
            background-color: #006aff;
        }

        .DashboardSideBar {
            width: 15%;
            background-color: black;
            /* height: 100%; */

        }

        .NewOldOrder {
            width: 70%;
            margin-left: 2%;
        }

        .DashboardSideBar a {
            font-size: large;
            color: #838383;
        }

        .flex {
            display: flex;
            height: 50px;
        }

        .comment-form {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .comment-form textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .comment-form button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #28a745;
            color: #fff;
        }

        .no-orders {
            text-align: center;
            padding: 50px;
            font-size: 24px;
            color: #888;

            width: 80vw;
        }
    </style>
</head>

<body>
    <main>
        <!-- <div class="DashboardSideBar">
                <a id="NewOrder" class="nav-link">new order</a>
                <a id="OldOrder" class="nav-link">old order</a>
            </div> -->

        <div class="DashboardSideBar">
            <a id="NewOrder" class="nav-link">
                <i class="fas fa-plus-circle"></i>
                new order
            </a>
            <a id="OldOrder" class="nav-link">
                <i class="fas fa-history"></i>
                old order
            </a>
        </div>

        <div class="NewOldOrder">
            <?php if (empty($UserOrder)) { ?>
                <div class="no-orders">No orders yet</div>
            <?php } else { ?>
                <?php foreach ($UserOrder as $order) { ?>
                    <section class="Section_Review">
                        <div class="container containerReview">
                            <div class="vehicleDiv">
                                <div class="vehicleDiv_descrip">
                                    <div class="vehicleImage">
                                        <h4>vehicle</h4>
                                        <img src="../front/imgRental/<?php echo $order['photo']; ?>" alt="" width="200px">
                                        <h4><?php echo $order['marque']; ?></h4>
                                    </div>
                                    <h3>Pick up</h3>
                                    <div class="vehicleImage">
                                        <h5>pick up</h5>
                                        <h3><?php echo $order['PickUpDate']; ?></h3>
                                        <p><?php echo $order['City']; ?></p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="Rate">
                                    <div>
                                        <p><b>Basic rate for days</b></p>
                                        <p>Included</p>
                                    </div>
                                    <div>
                                        <p>Tarif</p>
                                        <p><?php echo $order['tarif']; ?> € / jour</p>
                                    </div>
                                    <div>
                                        <p>total Days</p>
                                        <p><?php // calculate and echo the total days ?></p>
                                    </div>
                                    <div>
                                        <p>total paid</p>
                                        <p><?php echo $order['TotalCost']; ?></p>
                                    </div>
                                    <div>
                                        <p>FLEETSC</p>
                                        <p>Included</p>
                                    </div>
                                    <div>
                                        <p>Environmental contribution</p>
                                        <p>Included</p>
                                    </div>
                                    <div>
                                        <p>Railway Station Surcharge</p>
                                        <p>Included</p>
                                    </div>
                                    <div class="flex">
                                        <div>
                                            <?php
                                            $statusClass = ($order['OrderStatus'] === 1) ? 'confirmed' : 'pending';
                                            $statusText = ($order['OrderStatus'] === 1) ? 'Confirmed' : 'Pending';
                                            ?>
                                            <button
                                                class="button <?php echo $statusClass; ?>"><?php echo $statusText; ?></button>
                                        </div>
                                        <div>
                                            <a href="../<?php echo $order['invoice'] ?>" download class="invoice-btn">
                                                <button class="button">Invoice</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>

                <?php if (isset($visibile) && $order['OrderStatus'] === 1 && $visibile === "show") { ?>
                    <div class="comment-form">
                        <form method="post">
                            <textarea name="comment" placeholder="Leave your comment here..." required></textarea>
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <button type="submit">Submit Comment</button>
                        </form>
                    </div>

                    <?php } ?>
                    <?php } ?>
<!--                     
                <?php if (isset($success) && $success) { ?>
    <p>Message saved cool</p>
    
    <?php } ?> -->

    <?php if (isset($_GET['message']) && $_GET['message'] === 'sent') { ?>
    <p>Message saved cool</p>
<?php } ?>



    <p>this is a spiderman </p>
                </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectors = document.querySelectorAll('.DashboardSideBar > a');
            selectors.forEach(selector => {
                selector.addEventListener('click', function (e) {
                    e.preventDefault();
                    selectors.forEach(sel => {
                        sel.style.color = "";
                    });
                    this.style.color = "white";
                    let orderId = this.id;
                    if (orderId === "NewOrder") {
                        window.location.href = "/user?id=newOrder";
                    } else if (orderId === "OldOrder") {
                        window.location.href = "/user?id=oldOrder";
                    }
                });
            });
            let currentPath = window.location.pathname;
            if (currentPath.includes("newOrder")) {
                document.getElementById("NewOrder").style.color = "white";
            } else if (currentPath.includes("oldOrder")) {
                document.getElementById("OldOrder").style.color = "white";
            }
        });
    </script>
</body>

</html>