 
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
    <script src="front\js\admin.js" async>
    </script>

  </head>

  <body>

    <div class="container">
      <div class="links">
        <a href="<?= BASE_URL ?>/admin?id=Dashboard" class="nav-link">Dashboard</a>
        <a href="<?= BASE_URL ?>/admin?id=addCar" class="nav-link">addCar</a>
        <a href="<?= BASE_URL ?>/admin?id=deleteCar" class="nav-link">deleteCar</a>
        <a href="<?= BASE_URL ?>/admin?id=orderlist" class="nav-link">Order List</a>
      </div>

      <div class="Content">

        <div class="container-form">
          <h2>Formulaire de Voiture</h2>
          <form id="myForm" enctype="multipart/form-data">
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
        </div>
      </div>




    </div>






  </body>




  </html>
  <?php
}
