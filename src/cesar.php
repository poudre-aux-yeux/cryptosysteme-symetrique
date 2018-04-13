<?php
include_once("classes/Cesar.class.php");

function cesar1() {
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
}

cesar1();
cesar2();
cesar3();
cesar4();
?>