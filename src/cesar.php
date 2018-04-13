<?php
include_once("classes/Cesar.class.php");

function cesar1() {
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
}

cesar1();
cesar2();
cesar3();
cesar4();
?>