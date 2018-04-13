<?php
  include_once("classes/Encoding.class.php");
  function ttob() {
    echo "ttob : texte => binaire\n";
    echo json_encode(Encoding::text_to_binary("AMI")) . "\n\n";
  }

  function btot() {
    echo "btot : binaire => texte\n";
    echo Encoding::binary_to_text(Encoding::text_to_binary("AMI")) . "\n\n";
  }

  function shfl() {
    echo "shfl : every day I'm shuffling (01001101)\n";
    $shuffled = Encoding::shuffle("01001101");
    echo $shuffled. "\n";
    echo "and un-shuffling\n";
    echo Encoding::unshuffle($shuffled) . "\n\n";
  }

  function sub() {
    echo "sub : substitution (01001101)\n";
    $substituted = Encoding::substitute("0100") . Encoding::substitute("1101");
    echo $substituted. "\n";
    echo "et dé-substitution\n";
    $splitted = str_split($substituted, 4);
    echo Encoding::unsubstitute($splitted[0]) . Encoding::unsubstitute($splitted[1]) . "\n\n";
  }

  function crypto() {
    $key = "01001110";
    echo "crypto : cryptage complet d'une chaîne (AMI)\n";
    echo Encoding::crypto("AMI", $key) . "\n\n";
  }

  function uncrypto() {
    $key = "01001110";
    echo "uncrypto : décryptage complet d'une chaîne (AMI)\n";
    $encrypted = Encoding::crypto("AMI", $key);
    echo Encoding::uncrypto($encrypted, $key);
  }

  ttob();
  btot();
  shfl();
  sub();
  crypto();
  uncrypto();
?>