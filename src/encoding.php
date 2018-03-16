<?php
  include_once("classes/Encoding.class.php");

  function encoding1() {
    echo json_encode(Encoding::chaine_utf8("ami"));
  }

  encoding1();
?>