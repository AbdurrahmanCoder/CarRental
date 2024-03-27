<?php

session_start();
function UserLoggedIn()
{
    if (isset ($_SESSION['pseudoData'])) {

        return $_SESSION['pseudoData'];
    }
}
print_r($sessionData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="front\css\carselect.css">
    <link rel="stylesheet" href="front\css\home.css">
</head>

<body>

    <div class="header">
        <nav>

            <div class="container ">

            </div>
        </nav>


        <div class="container  ">

            <div class="mainContainer">

                <div class="order">
                    <div class="order_First_child">
                        <span class="identifier"> 1</span>
                        <h3 class="order_h3">RENTAL LOCATION </h3>
                    </div>
                    <div class="OrderDivsContainer">


                        <div class="pickUp">
                            <p>pick up</p>
                            <?php echo $_SESSION['Location'] ?>
                            <p>
                                <?php echo $_SESSION['PickUp'] ?>
                            </p>
                            <p>
                                <?php echo $_SESSION['PickUpTime'] ?>
                            </p>
                        </div>

                        <div class="return">
                            <p>return</p>
                            <?php echo $_SESSION['Location'] ?>
                            <p>
                                <?php echo $_SESSION['DropOf'] ?>
                            </p>
                            <p>
                                <?php echo $_SESSION['DropOfTime'] ?>
                            </p>
                        </div>
                    </div>


                </div>



                <div class="vehicule">
                    <div class="order_First_child">
                        <span class="identifier idenColorChange"> 2</span>
                        <h3>VEHICULE</h3>

                    </div>
                    <div class="carSelected">


                        <p>you have not selected the car </p>


                    </div>

                </div>

            </div>




        </div>
    </div>
    </div>



    </div>

    <!-- ///checkout div -->

    

    <div class="checkout_main">
        <div class="checkout_Div">
            <div class="checkout">
                <div class="container tocheck">
                    <form action="/checkout" method="post">
                        <!-- Move the button inside the form -->
                        <input type="hidden" class="SelectedCarID" name="SelectedCarID">
                        <input type="submit" class="redBlock Form_book_btn checkout_btn"
                            value="Go to review & checkout">
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="Vehicule_List">

        <div class="VehiculeModels">
            <div class="container">
                <?php
                foreach ($results as $data) { ?>
                    <div class="List_vehicule_Disponible">

                        <div>
                            <img width="200px" height="300px" src="views\admin\front\<?php echo $data['photo'] ?>" alt="">


                            <!-- <img width="200px" height="300px"  src="views\admin\front\imgRentala_20240107_192939.png" alt=""> -->


                        </div>
                        <div>
                            <h2>
                                <?php echo $data['marque']; ?>
                            </h2>
                            <p><i class="fa-solid fa-check"></i>Free first charge</p>
                            <p><i class="fa-solid fa-check"></i>Basic protection included</p>
                            <p><i class="fa-solid fa-check"></i>Free cancellation up to 48h before pick up</p>
                        </div>


                        <div>
                            <!-- <p>FROM</p> -->
                            <p class="tarif_vehicule">
                                <?php echo $data['tarif']; ?> <span> €/day </span>
                            </p>

                            </p>
                            <?php if (UserLoggedIn()) { ?>
                                <!-- <a class="bookButton"
                            href="?CarId=<?php echo $data['id']; ?>&CarMarque=<?php echo $data['marque']; ?>&CarTarif=<?php echo $data['tarif']; ?>&CarImg=<?php echo $data['photo']; ?>">
                            Book Ride</a>  -->
                                <button class="bookButton  bookButtonSelect" data-car-id="<?php echo $data['id']; ?>"
                                    data-car-marque="<?php echo $data['marque']; ?>"
                                    data-car-tarif="<?php echo $data['tarif']; ?>" data-car-img="<?php echo $data['photo']; ?>">
                                    Book Ride
                                </button>
                            <?php } else { ?>
                                <a class="bookButton" href=" /login"> Book Ride</a>
                            <?php } ?>

                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>



        <script src="front\js\carselect.js" async>
        </script>

</html>