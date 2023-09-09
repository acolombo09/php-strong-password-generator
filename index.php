<!-- 
nome repo: php-strong-password-generator
Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare 
il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione 
utilizzerà questo dato per generare una password casuale 
(composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php
Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica 
in un file functions.php che includeremo poi nella pagina principale
Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect a
d una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
Milestone 4 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. 
Possono essere scelti singolarmente (es. solo numeri) oppure possono essere 
combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
-->

<?php


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
  <title>PHP | STRONG PASSWORD GENERATOR</title>
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
          <!-- Form per inviare il valore del range slider -->
            <form method="GET" action="index.php">
              <div class="my-3">
                <label for="rangeSlider" class="form-label">Seleziona un valore:</label>
                <input type="range" class="form-range" id="rangeSlider" name="slider" min="2" max="12" value="2">
              </div>
              <button type="submit" class="btn btn-success mb-2">Genera Password</button>
            </form>
            <div class="w-100 mx-auto">
              <p class="fw-bold">Password casuale generata:</p>
            </div>

            <?php
            
            include __DIR__ .  "/functions.php";

            $sliderValue = getSliderValue();
            
            if ($sliderValue >= 1 && $sliderValue <= 12) {
              $password = generateRandomPassword($sliderValue);

              echo '<p class="text-primary fw-bold display-6">' . $password . '</p>';
            } elseif($sliderValue !== null) {
              echo "Errore: La lunghezza della password deve essere compresa tra 1 e 12.";
            };
            
            
            ?>
          </div>
        </div>
        <div class="col my-3">
          <div class="w-100 mx-auto">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Lettere minuscole (abc)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Lettere maiuscole (ABC)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Numeri (123)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Simboli speciali (!#$)
              </label>
            </div>
          </div>
        </div>

        <div class="col my-3">
          <div class="w-100 mx-auto">
            <p class="mt-3 text-body-secondary">© 2023</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- My JS file -->
  <script src="js/main.js"></script>
  <!-- Bootstrap JS file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>