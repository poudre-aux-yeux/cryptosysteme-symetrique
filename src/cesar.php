<?php
include_once("classes/Cesar.class.php");

function cesar1() {
<<<<<<< HEAD
  echo "Cesar1 : césarification d'un mot (AMI)\n";
  echo json_encode(Cesar::code_mot_chiffre('AMI')) . "\n_\n";
}

function cesar2() {
  echo "Cesar2 : dé-césarification d'un mot césarifié (AMI)\n";
  echo Cesar::code_chiffre_mot(Cesar::code_mot_chiffre('AMI')) . "\n_\n";
}

function cesar3() {
  echo "Cesar3 : cryptage d'un mot (AMI)\n";
  echo json_encode(Cesar::crypto('AMI')) . "\n_\n";
}

function cesar4() {
  echo "Cesar4 : décryptage d'un mot (AMI)\n";
  echo Cesar::uncrypto(Cesar::crypto('AMI')) . "\n_\n";  
=======
  echo "cesar1 : césarification d'un mot (AMI)\n";
  echo json_encode(Cesar::code_mot_chiffre('AMI')) . "\n\n";
}

function cesar2() {
  echo "cesar2 : dé-césarification d'un mot césarifié (AMI)\n";
  echo Cesar::code_chiffre_mot(Cesar::code_mot_chiffre('AMI')) . "\n\n";
}

function cesar3() {
  echo "cesar3 : cryptage d'un mot (AMI)\n";
  echo json_encode(Cesar::crypto('AMI')) . "\n\n";
}

function cesar4() {
  echo "cesar4 : décryptage d'un mot (AMI)\n";
  echo Cesar::uncrypto(Cesar::crypto('AMI')) . "\n\n";  
>>>>>>> 605c6f63a178c34cd61c47dcc27b9d2c3af61276
}

cesar1();
cesar2();
cesar3();
cesar4();
?>