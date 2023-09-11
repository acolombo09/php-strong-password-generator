<?php

  session_start();

  include __DIR__ . "/functions.php";

  $sliderValue = $_SESSION["sliderValue"] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- BOOTSTRAP CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- FONTAWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- VUE CDN -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <!-- LUXON CDN -->
  <script src="https://cdn.jsdelivr.net/npm/luxon@3.3.0/build/global/luxon.min.js"></script>
  <!-- AXIOS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- My css link -->
  <link rel="stylesheet" href="css/style.css">
  <title>STRONG PASSWORD GENERATOR | PRIVATE AREA</title>
</head>
<body class="bg-dark bg-opacity-75">
  <div class="container my-5 py-4 bg-body-tertiary shadow-lg">
    <div class="row justify-content-center">
      <div class="col-6 d-flex flex-column justify-content-center mx-auto">
        <div class="col d-flex flex-column justify-content-center mx-auto">
          <img class="my-3 mx-auto" src="./imgs/vuejs-logo.png" alt="" width="90" height="75">
        </div>
        <div class="col my-3 bg-success bg-opacity-25">
          <div class="w-50 mx-auto d-flex flex-column justify-content-center align-items-center text-center">
            <div class="w-100 mx-auto mt-3">
            <p class="fw-bold">Valore selezionato:</p>
              <?php
                if (isset($_SESSION["sliderValue"])) {
                  echo '<p class="text-primary fw-bold display-6">' . $_SESSION["sliderValue"] . '</p>';
                }
              ?>
            </div>
            <div class="w-100 mx-auto">
              <p class="fw-bold">Password casuale generata:</p>
              <?php
                if (isset($sliderValue) && $sliderValue >= 1 && $sliderValue <= 12) {
                  $password = generateRandomPassword($sliderValue);
                  echo '<p class="text-primary fw-bold display-6">' . $password . '</p>';
                } else {
                  echo '<p class="text-danger">Errore: La lunghezza della password deve essere compresa tra 1 e 12.</p>';
                  exit; // Esci in caso di errore.
                }
                ?>
            </div>
            
          </div>
          <?php
            include __DIR__ . "/footer.php";
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  
  ?>

  <!-- My JS file -->
  <script src="js/main.js"></script>
  <!-- Bootstrap JS file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  
  <?php
  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();
  ?>
</body>
</html>