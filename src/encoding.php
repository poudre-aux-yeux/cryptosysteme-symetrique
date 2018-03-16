<?php
  include_once("classes/Encoding.class.php");

  function encoding1() {
    echo json_encode(Encoding::chaine_utf8("ami")) . "\n";
  }

  function encoding2() {
    echo Encoding::chiffre_utf8(Encoding::chaine_utf8("ami")) . "\n";
  }

  encoding1();
  encoding2();
?>