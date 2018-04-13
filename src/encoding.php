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

  encoding1();
  encoding2();
?>