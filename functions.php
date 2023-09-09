<?php

function getSliderValue() {
  // Check del modulo quando il modulo è stato inviato
  //w3school
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["slider"])) {
    $sliderValue = $_GET["slider"];
    echo "<p>Valore selezionato: $sliderValue</p>";
    return $sliderValue;
  }
  return null;
};

function generateRandomPassword($passLenght) {
  $charsAllowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
  return $password = substr(str_shuffle($charsAllowed), 0, $passLenght);
}

?>