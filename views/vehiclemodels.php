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
                                        Select
                                    </button>
                                <?php } else { ?>
                                    <a class="bookButton" href=" /login"> Select</a>
                                <?php } ?>

                            </div>
                        </div>
                        <?php
                    }
                } else {

                    ?>
                    <H1>NO CARS AVAILABLE </H1>
                    <!-- <?php echo $data['tarif']; ?> <span> €/day </span> -->
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
            /* margin: 0 auto; */

            #vehicleForm {
                width: 80%;
                overflow: hidden;

                max-width: 45%;
                margin-left: 20px;

            }

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



             /* button[type="submit"] {
                float: left;
                width: calc(30% - 10px);
                background-color: #4CAF50;
                color: white;
                padding: 14px 14px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                box-sizing: border-box;
            } */


            /* button[type="submit"]:hover {
                background-color: #45a049;
            } */

            /* #Dropdown {

                display: flex;
                justify-content: left;
                align-items: start;
                align-self: start;
                align-content: flex-start;
            } */




 
/* 
            .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
} */

.List_vehicule_Disponible {
    width: 90% ;
    padding: 0px 70px 0px 70px;
    margin: 20px;
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.List_vehicule_Disponible:hover {
    transform: translateY(-5px);
}

.List_vehicule_Disponible img {
    width: 100%;
    height: 230px;
 
    border-radius: 20px 20px 0 0;
    transition: transform 0.3s ease;
}

.List_vehicule_Disponible:hover img {
    transform: scale(1.1);
}

.List_vehicule_Disponible .car-details {
    padding: 20px;
}

.List_vehicule_Disponible h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333333;
}

.List_vehicule_Disponible p {
    margin-bottom: 8px;
    color: #777777;
}

.List_vehicule_Disponible .tarif_vehicule {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: #000;
}

.List_vehicule_Disponible button,
.List_vehicule_Disponible a {
    display: inline-block;
    padding: 12px 24px;
     background-color: #ff4d30;  
    box-shadow: 0 10px 15px 0 rgba(255, 83, 48, .35);
    color: #ffffff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.List_vehicule_Disponible button:hover,
.List_vehicule_Disponible a:hover {
    /* background-color: #0056b3; */
    box-shadow: 1px 10px 15px 0 rgba(255, 83, 48, 1.35);
    /* padding: 10px; */
    transform: scale(1);


}

@media screen and (max-width: 768px) {
    .List_vehicule_Disponible {
        width: calc(100% - 40px);
    }
}

@media screen and (max-width: 620px) {
    .List_vehicule_Disponible {
        width: calc(100% - 40px);
    display: flex;
    flex-direction: column;
}


.List_vehicule_Disponible div:nth-child(2) {
    width: 100%;
}

.List_vehicule_Disponible div:nth-child(3) {
    
    width: 100%;
    /* align-items: center; */
}
.bookButton{
    align-self: center;
    margin-bottom:1rem;
}
 
.List_vehicule_Disponible div:nth-child(2) { 
    width: 100%;

}
.List_vehicule_Disponible div:nth-child(1) { 
width: 100%;
}
 

#vehicleType
{
    width: 100%;
}
}



        </style>


</html>