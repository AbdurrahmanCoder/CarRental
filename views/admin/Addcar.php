
<?php
  foreach ($typeDeVoiture as $type) { 
    echo $type['id'];
    echo $type['type']; 
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="front\css\admin.css">
  <link rel="stylesheet" href="front\css\admin.css">
  <link rel="stylesheet" href="front\css\home.css">

  <script src="front\js\admin.js" async>
  </script>

</head>

<body>

  <div class="container">
  <?php 
 include_once ("header.php") 
 ?> 



    <div class="Content">

      <div class="container-form">
        <h2>Formulaire de Voiture</h2>
        <form id="myForm" enctype="multipart/form-data">

          <div class="mb-3">

            <label for="marque" class="form-label">Type de Voiture </label>

            <select id="carType" name="carType" style="margin:20px">

            <?php foreach ($typeDeVoiture as $type) { ?>
        <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
    <?php } ?>


            </select>
            <!-- <input type="text" class="form-control" id="marque" name="marque" required> -->

          </div>

          <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque" required>
          </div>
          <div class="mb-3">
            <label for="kilometrage" class="form-label">Kilométrage</label>
            <input type="number" class="form-control" id="kilometrage" name="kilometrage" required>
          </div>

          <div class="mb-3">
            <label for="tarif" class="form-label">Tarif</label>
            <input type="number" class="form-control" id="tarif" name="tarif" required>
          </div>

          <div class="mb-3">
            <label for="images" class="form-label">Photo</label>
            <label for="images" class="drop-container">
              <span class="drop-title">Déposez les fichiers ici</span>
              ou
              <input type="file" name="image_file" id="images" accept="image/*" required>
            </label>
          </div>
          <button type="submit" id="submitForm">Enregistrer</button>
        </form>

        <div class="sucess" id="success">

          <p>Data inserted Succesfully</p>

        </div>



      </div>



    </div>




  </div>


  <style>
    .sucess {

      margin-top: 30px;
      justify-content: center;
      /* background-color: red; */
      display: flex;
      opacity: 0;
    }


    .sucess>p {
      background-color: green;
      color: white;
      padding: 10px;
      border-radius: 5px;
      transition: opacity 1s ease;

    }

    /* #AddCarLink {
                background-color: red;
            }

             */
  </style>




</body>

</html>