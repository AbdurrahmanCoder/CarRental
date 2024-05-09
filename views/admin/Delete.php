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
    <script src="front\js\AdminDelete.js" async>
    </script>

    <body>

        <main>

        <div class="DashboardSideBar">

            
            <!-- <div class="container"> -->
                <?php
            include_once ("header.php") ?>
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
                            <?php
                            foreach ($results as $carData) { ?>
                                <tr>
                                    <td>
                                        <?php echo $carData['id']; ?>
                                    </td>

                                    <td>

                                        <img width="120px" height="112px"
                                            src="../../front/imgRental/<?php echo $carData['photo']; ?>" alt="">
                                    </td>
                                    <td>
                                        <?php echo $carData['marque']; ?>
                                    </td>

                                    <td>
                                        <?php echo $carData['kilometrage']; ?>

                                    </td>
                                    <td>
                                        <?php echo $carData['tarif']; ?>
                                    </td>


                                    <td>
                                        <button data-id="<?php echo $carData['id']; ?>" class="buttonClicked">DELETE </button>
                                    </td>


                    </div>

                </div>
            <!-- </div> -->
        </div>
            
        </main>
        </body>

        <style>
            .table th,
            tr {
                padding: 22px;
                margin-top: 11px;
            }


            main{ 
    display: flex;
      /* gap: 10%; */
    }
    


    .DashboardSideBar {
    /* background-color: red; */
    width: 15%;
    background-color: red;
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
}

