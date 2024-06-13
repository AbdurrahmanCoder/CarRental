<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Testimonial Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front/css/admin.css">
    <link rel="stylesheet" href="front/css/home.css">
    <script src="front\js\Testinomial.js" async>
    </script>

    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        main {
            display: flex;
            margin: 20px;
        }

        .DashboardSideBar {
            width: 20%;
 
            border-radius: 10px;
        }

        .TestimonialDiv {
            width: 75%;
            margin-left: 5%;
        }

        .Contents {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 70%;
        }

        .container {
            max-width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            position: relative;
        }

        th {
            background-color: #f4f6f9;
            font-weight: 500;
        }

        td {
            background-color: #fff;
        }

        input[type="checkbox"] {
            transform: scale(1.5);
            margin-left: 10px;
        }

        button {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            background-color:   rgba(255, 83, 48, 0.75);

            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            width: 100%;
        }

        button:hover {
            background-color: #0051cc;
        }

        #TestimonialsLink {
            background-color: #006aff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            display: block;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
        }

        .checkbox-cell {
            text-align: right;
            padding-right: 10px;
        }
    </style>
</head>
<body>
<main>
    <div class="DashboardSideBar">
        <?php include_once("header.php"); ?>
    </div>
    <div class="TestimonialDiv">
        <div class="Contents">
            <div class="container mt-5">
                <form method="post" action="">
                    <table>
                        <thead>
                            <tr>
                                <th>Testimonial</th>
                                <th>Approve</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($testimonials as $testimonial): ?>
                                <tr>
                                    <td><?= htmlspecialchars($testimonial['comment']); ?></td>
                                    <td class="checkbox-cell">
                                        <!-- <input type="checkbox" name="testimonial[]" value="<?= $testimonial['id']; ?>" <?= $testimonial['isapproved'] === 1  ? 'checked' : ''; ?>> -->
                                        <button data-id="<?php echo $testimonial['id']; ?>" class="DelButtonClicked">DELETE
                                        </button>
                                    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- <p><?php echo $testimonialsApprove  ?> </p> -->
                    <div style="text-align: left;">
                        <button id="SaveChanges" type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main> 
</body>

<script>
document.getElementById("SaveChanges").onclick = function() {
    location.reload();
};

</script>

</html>
