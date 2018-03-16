<?php
include_once("classes/Cesar.class.php");

function cesar1() {
  echo json_encode(Cesar::code_mot_chiffre('AMI')) . "\n";
}

function cesar2() {
  echo Cesar::code_chiffre_mot(Cesar::code_mot_chiffre('AMI')) . "\n";
}

function cesar3() {
  echo json_encode(Cesar::crypto('AMI')) . "\n";
}

function cesar4() {
  echo Cesar::uncrypto(Cesar::crypto('AMI')) . "\n";  
}

cesar1();
cesar2();
cesar3();
cesar4();
?>