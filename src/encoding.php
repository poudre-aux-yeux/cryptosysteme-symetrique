<?php
  include_once("classes/Encoding.class.php");

  function encoding1() {
    echo "encoding1 : texte => binaire\n";
    echo json_encode(Encoding::text_to_binary("AMI")) . "\n\n";
  }

  function encoding2() {
    echo "encoding2 : binaire => texte\n";
    echo Encoding::binary_to_text(Encoding::text_to_binary("AMI")) . "\n\n";
  }

  function encoding3() {
    echo "encoding3 : every day I'm shuffling (01001101)\n";
    $shuffled = Encoding::shuffle("01001101");
    echo $shuffled. "\n";
    echo "and un-shuffling\n";
    echo Encoding::unshuffle($shuffled) . "\n\n";
  }

  function encoding4() {
    echo "encoding4 : cryptage complet d'une chaîne (AMI)\n";
    echo Encoding::crypto("AMI") . "\n\n";
  }

  function encoding5() {
    echo "encoding5 : décryptage complet d'une chaîne (AMI)\n";
    $encrypted = Encoding::crypto("AMI");
    echo Encoding::uncrypto($encrypted);
  }

  encoding1();
  encoding2();
  encoding3();
  encoding4();
  encoding5();
?>