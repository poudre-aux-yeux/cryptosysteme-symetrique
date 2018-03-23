<?php
  class Encoding {
    private function lettre_chiffre($lettre) {
      $array = unpack("H*", utf8_encode($lettre));
      return $array[1];
    }

    private function chiffre_lettre($bin) {      
      // return unpack($bin)[0];
      return pack("H*", $bin);
    }

    public static function chaine_utf8($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = hex2bin(Encoding::lettre_chiffre($lettre));
      }
      var_dump($result);
      return $result;
    }
/*
    public static function chiffre_utf8($code_chiffre) {
      $text = '';
      foreach ($code_chiffre as $chiffre) {
        $text = $text . Encoding::chiffre_lettre($chiffre);
      }
      return utf8_encode($text);
    }*/
  }
?>