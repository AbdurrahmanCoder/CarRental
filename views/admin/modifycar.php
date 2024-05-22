<?php


if (!isAdmin()) {
    header("Location: login.php");
    exit();
} else {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="front\css\admin.css">
        <link rel="stylesheet" href="front\css\home.css">
    </head>
    <script src="front\js\adminUpdate.js" async>
    </script>

    <body>

    <main>

<div class="DashboardSideBar">
        <?php include_once ("header.php"); ?>
    </div>

    <div class="DeletecarDiv">

        <div class="Content">
            <div class="container mt-5">

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>photo</th>
                            <th>marque</th>
                            <th>kilometrage</th>
                            <th>tarif</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $carData) { ?>
                        <tr>
                            <td class="carId"><?php echo $carData['id']; ?></td>
                            <td>
                                <img width="120px" class="carImage" height="112px" src="../../front/imgRental/<?php echo $carData['photo']; ?>" alt="">
                            </td>
                            <td class="editable" data-id="<?php echo $carData['id']; ?>" data-field="marque"><?php echo $carData['marque']; ?></td>
                            <td class="editable kilometrage" data-id="<?php echo $carData['id']; ?>" data-field="kilometrage"><?php echo $carData['kilometrage']; ?></td>
                            <td class="editable tarif" data-id="<?php echo $carData['id']; ?>" data-field="tarif"><?php echo $carData['tarif']; ?></td>
                            <td>
                                <button class="buttonClicked">Update</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="car-details">
                    <div class="car-image">
                        <img id="carImagemodel" src="" alt="Car Image">
                    </div>
                    <div class="car-info">
                        <div><strong>ID:</strong> <span id="carIdmodel"></span></div>
                        <div><strong>Tarif:</strong> <input type="text" id="tarifModel" name="tarif"></div>
                        <div><strong>Kilometrage:</strong> <input type="text" id="kilometragemodel" name="kilometrage"></div>
                    </div>
                </div>
                <button id="updateBtn">Update</button>
            </div>
        </div>

    </div>
</main>

 

        </body>

        <style>


/* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 500px; /* Maximum width */
    position: relative; /* Relative positioning for close button */
}

/* Close Button */
.close {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 20px;
    font-weight: bold;
    color: #aaa;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Car Image */
.car-image img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
    margin-bottom: 10px;
}

/* Car Details */
.car-details {
    display: flex;
}

.car-info {
    margin-left: 20px;
}

/* Update Button */
#updateBtn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    margin-top: 10px;
}

#updateBtn:hover {
    background-color: #45a049;
}



            .table th,
            tr {
                padding: 22px;
                margin-top: 11px;
            }


            main{ 
    display: flex;
      /* gap: 10%; */
    }
 

    
#modifyCar
{
  /* width: 100%; */
  background-color: #006aff;
}  


    .DashboardSideBar {
    /* background-color: red; */
    width: 15%;
  
    } 

    

    .DeletecarDiv {
        width: 70%;
        margin-left: 2%; 
        /* display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
        height: 240px; */
    }
            







  .table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
}

.table th {
    background-color: #f2f2f2;
    color: #333;
}

.table td {
    background-color: #fff;
    color: #333;
    border-bottom: 1px solid #ddd;
}

.table tbody tr:hover {
    background-color: #f2f2f2;
}

.table img {
    max-width: 100%;
    height: auto;
}

.buttonClicked {
    padding: 8px 16px;
    background-color: #ff6347;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.buttonClicked:hover {
    background-color: #d44a2d;
}

/* Adjustments for responsiveness */
@media (max-width: 768px) {
    .table th,
    .table td {
        padding: 8px;
    }
}



        </style>

        </html>
        <?php
                            }

