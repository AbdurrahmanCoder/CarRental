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

        <div class="container">
            <?php

            include_once ("header.php") ?>

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
            </div>

        </body>

        <style>
            .table th,
            tr {
                padding: 22px;
                margin-top: 11px;
            }



        
        </style>

        </html>
        <?php
                            }
}