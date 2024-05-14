<?php

function UserLoggedIn()
{
    if (isset($_SESSION['pseudoData'])) {

        return $_SESSION['pseudoData'];
    }
}

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

        <?php if (UserLoggedIn()) {
            ?>

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

                                <?php echo isset($_SESSION['Location']) ? $_SESSION['Location'] : "select location"; ?>


                                <p>
                                    <?php echo isset($_SESSION['PickUp']) ? $_SESSION['PickUp'] : "select pickup  location"; ?>
                                </p>
                                <p>
                                    <?php echo isset($_SESSION['PickUpTime']) ? $_SESSION['PickUpTime'] : "select PickUpTime  location"; ?>


                                </p>
                            </div>

                            <div class="return">
                                <p>return</p>
                                <?php echo isset($_SESSION['Location']) ? $_SESSION['Location'] : "select Drop location "; ?>

                                <p>
                                    <?php echo isset($_SESSION['DropOf']) ? $_SESSION['DropOf'] : "select DropOf location "; ?>

                                </p>
                                <p>
                                    <?php echo isset($_SESSION['DropOfTime']) ? $_SESSION['DropOfTime'] : "select DropOfTime location "; ?>
                                </p>
                            </div>



                        </div>
                        <?php if (!isset($_SESSION['DropOfTime'])) {

                            ?>

                            <button> Insert form DATA</button>
                            <?php
                        }
                        ?>

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


        <?php
        }
        ?>
    <div>


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

    <div class="container " id="Dropdown">
            <form id="vehicleForm" method="POST" action="">
                <!-- Dropdown for selecting vehicle type -->
                <select name="vehicleType" id="vehicleType">
                    <option value="all" <?php echo ($selectedType == 'all') ? ' ' : ''; ?>>ALL</option>

                    <?php
                    foreach ($VehiculeTypes as $values) {
                        $selected = ($selectedType == $values['id']) ? 'selected' : '';
                        ?>
                        <!-- <option value="<?php echo $values['id'] ?>"><?php echo $values['type'] ?> </option> -->
                        <option value="<?php echo $values['id']; ?>" <?php echo $selected; ?>><?php echo $values['type']; ?>
                        </option>

                    <?php } ?>

                </select>
             </form>
        </div>
    </div>

            <div class="container">
                <?php
                if (!empty($results)) {
                  
                  
                    
                    foreach ($results as $data) { ?>
                        <div class="List_vehicule_Disponible">
                            
                            <div>
                                <img width="200px" height="300px" src=" ../front/imgRental/<?php echo $data['photo'] ?>" alt="">
                                
                                
                                 

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

                                    <button class="bookButton  bookButtonSelect" data-car-id="<?php echo $data['voiture_id']; ?>"
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
                } else {

                    ?>
                    <H1>NO CARS AVAILABLE </H1>

                    <?php

                }
                ?>

            </div>
        </div>


        <!-- <script async>
        document.getElementById('vehicleType').addEventListener('change',  ()=> {
            document.getElementById('vehicleForm').submit();
        });
    </script>  -->



        <script>

            var selectElement = document.getElementById('vehicleType');

            selectElement.addEventListener('change', function () {

                document.getElementById('vehicleForm').submit();
            });

        </script>


        <script src="front\js\carselect.js" async>

        </script>



        <style>
            /* Form container */
            #vehicleForm {
                /* margin: 0 auto; */
                width: 80%;
                overflow: hidden;

                max-width: 45%;
                margin-left: 20px;

            }

            /* Dropdown styling */
            #vehicleType {
                float: left;
                width: calc(70% - 10px);
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-right: 10px;
                box-sizing: border-box;
            }

            /* Button styling */
            button[type="submit"] {
                float: left;
                width: calc(30% - 10px);
                background-color: #4CAF50;
                color: white;
                padding: 14px 14px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                box-sizing: border-box;
            }


            button[type="submit"]:hover {
                background-color: #45a049;
            }

            #Dropdown {

                display: flex;
                justify-content: left;
                align-items: start;
                align-self: start;
                align-content: flex-start;
            }





                  /* to check */
 
/* .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
} */
 

.List_vehicule_Disponible {
    width: 300px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.List_vehicule_Disponible:hover {
    transform: translateY(-5px);
}

.List_vehicule_Disponible img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
}

.List_vehicule_Disponible h2 {
    font-size: 1.5rem;
    margin: 10px 0;
    color: #333333;
}

.List_vehicule_Disponible p {
    margin-bottom: 5px;
    color: #777777;
}

.List_vehicule_Disponible .tarif_vehicule {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #007bff;
}

.List_vehicule_Disponible button,
.List_vehicule_Disponible a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.List_vehicule_Disponible button:hover,
.List_vehicule_Disponible a:hover {
    background-color: #0056b3;
}

        </style>


</html>