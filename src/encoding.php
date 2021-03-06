<?php
  include_once("classes/Encoding.class.php");
  function ttob() {
    echo "Encoding1 - ttob : texte => binaire\n";
    echo json_encode(Encoding::text_to_binary("AMI")) . "\n\n";
  }

  function btot() {
    echo "Encoding2 - btot : binaire => texte\n";
    echo Encoding::binary_to_text(Encoding::text_to_binary("AMI")) . "\n\n";
  }

  function shfl() {
    echo "Encoding3 - shfl : every day I'm shuffling (01001101)\n";
    $shuffled = Encoding::shuffle("01001101");
    echo $shuffled. "\n";
    echo "And un-shuffling\n";
    echo Encoding::unshuffle($shuffled) . "\n\n";
  }

  function sub() {
    echo "Encoding4 - sub : substitution (01001101)\n";
    $substituted = Encoding::substitute("0100") . Encoding::substitute("1101");
    echo $substituted. "\n";
    echo "Et dé-substitution\n";
    $splitted = str_split($substituted, 4);
    echo Encoding::unsubstitute($splitted[0]) . Encoding::unsubstitute($splitted[1]) . "\n\n";
  }

  function crypto() {
    $key = "0110";
    echo "Encoding5 - crypto : cryptage complet d'une chaîne (AMI)\n";
    echo Encoding::crypto(Encoding::text_to_binary("AMI"), $key) . "\n\n";
  }

  function uncrypto() {
    $key = "0110";
    echo "Encoding6 - uncrypto : décryptage complet d'une chaîne (AMI)\n";
    $encrypted = Encoding::crypto(Encoding::text_to_binary("AMI"), $key);
    echo Encoding::binary_to_text(Encoding::uncrypto($encrypted, $key)) . "\n\n";
  }

  function feistel() {
    $key = "0110";
    echo "Encoding7 - feistel : cryptage complet d'une chaîne (AMI) x fois\n";
    echo Encoding::feistel("AMI", $key, 12) . "\n\n";
  }

  function unfeistel() {
    $key = "0110";
    echo "Encoding8 - unfeistel : décryptage complet d'une chaîne (AMI)\n";
    $encrypted = Encoding::feistel("AMI", $key, 12);
    echo Encoding::unfeistel($encrypted, $key, 12) . "\n\n";
  }

  ttob();
  btot();
  shfl();
  sub();
  crypto();
  uncrypto();
  feistel();
  unfeistel();
?>