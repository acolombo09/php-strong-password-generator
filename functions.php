<?php

function getSliderValue() {
  // Check del modulo quando il modulo è stato inviato
  //w3school
  if (isset($_SESSION["sliderValue"])) {
    return $_SESSION["sliderValue"];
  } else {
    return null;
  }
};

function generateRandomPassword($passLenght) {
  $charsAllowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
  $password = substr(str_shuffle($charsAllowed), 0, $passLenght);
  return $password;
}

function buttonRedirect() {
  header('Location: ./private_area.php');
}

?>