<!-- 
nome repo: php-hotel
Descrizione
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET 
permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel 
per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto 
di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente 
(es. ottenere una lista con hotel che dispongono di parcheggio e che 
hanno un voto di tre stelle o superiore).
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->

<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// $inputwords = $_POST["inputwords"] ?? null;
// $censored = $_POST["censored"] ?? null;
//   //daModificare,conCosa, stringa soggetto cioè quella sulla quale eseguire l'operazione richiesta
// $result = str_replace($censored, '<span class="text-danger">***</span>', $inputwords);

$filterVote = $_GET['vote'] ?? null;
$filterParking = $_GET['parking'] ?? null;

// consiglio di florian usare spesso il var_dump
var_dump($filterParking);
var_dump($filterVote);

$filteredHotels = [];
// se non ci sono filtri, inserisco tutti gli hotel nell'array filtrato
if($filterParking === null && $filterVote === null){
  $filteredHotels = $hotels;
}else {
  foreach($hotels as $hotel) {
    if ($hotel['parking'] >= $filterParking){
      $filteredHotels = $hotels;
    }
  }

  // // soluzione multifiltro
  // foreach($hotels as $hotel) {
  //   $mustAdd = true;
  //   // cambiare il valore di must add in base ai filtri
  //   // ad ogni ciclo ho i dati di un hotel
  //   // e devo decidere se pushare questi dati nell'array filtrato
  //   if(isset($filterVote) && isset($filterPark)){
  //     $mustadd = ($hotel['vote'] >= $filterVote && $hotel['parking'] == $filterParking);
  //   }else if (isset($filterVote)) {
  //     $mustAdd = ($hotel['vote'] >= $filterVote);
  //   }else if (isset($filterParking)){
  //     $mustAdd = ($hotel['parking'] >= $filterParking);
  //   }

  //   if ($mustAdd) {
  //     $filteredHotels[] = $hotel;
  //   }

  // }
}



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
  <title>PHP HOTELS</title>
</head>
<body class="bg-dark">
  <div class="container my-5 py-4 bg-body-tertiary">
    <div class="row justify-content-center">
      <div class="col-6 d-flex flex-column justify-content-center mx-auto">
        <div class="col d-flex flex-column justify-content-center mx-auto">
          <img class="my-3 mx-auto" src="./imgs/vuejs-logo.png" alt="" width="90" height="75">
        </div>
        <div class="col my-2">
          <div class="w-25">
            <select class="form-select">
              <option selected>Parking</option>
              <option value="1">Yes</option>
              <option value="2">No</option>
            </select>
          </div>
        </div>
        <div class="col my-2">
          <div class="w-100 mx-auto">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
              </label>
            </div>
          </div>
        </div>

        <!-- tramite echo si stampano gli elementi  -->
        <!-- creo lista in html -->
        <!-- rimuovo gli elementi che non servono -->
        <!-- inserisco il php nell'html -->
        <!-- ciclo foreach su array hotels -->
        <!-- riporto tutto in tabella -->
        <div class="col my-3">
          <div class="w-100 mx-auto">
            <table class="table table-hover">
              <thead>
                <tr>
                  <!-- volendo si poteva usare la funzione php "array_keys($hotels[0]);"
                      così che potevo stampare tutte le chiavi dell'array ed utilizzarlo
                      per stampare dinamicamente le keys nelle intestazioni della table
                  -->
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Parking</th>
                  <th scope="col">Vote</th>
                  <th scope="col">Distance to center</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php foreach ($filteredHotels as $key => $hotel) { ?>
                  <tr>
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <!-- per accedere alla chiave, devo usare le parentesi quadre -->
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <!-- se la chiave 'parking' nell'array $hotel è vera o falsa 
                    e restituisce 'Yes' se è vera e 'No' se è falsa. -->
                    <td><?php echo ($hotel['parking'] ? 'Yes' : 'No'); ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <!-- mai usare il + per concatenare stringhe, solo il . va utilizzato -->
                    <td><?php echo $hotel['distance_to_center'] . " km"; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
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