<?php
  class Encoding {
    private function lettre_bin($lettre) {
      return decbin(unpack("H*", utf8_encode($lettre)));
    }

    private function chiffre_bin($bin) {      
      return pack($bin)[0];
    }

    public static function chaine_utf8($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = Encoding::lettre_bin($lettre);
      }
      var_dump($result);
      return $result;
    }

    public static function chiffre_utf8($code_chiffre) {
      $text = '';
      foreach ($code_chiffre as $chiffre) {
        $text = $text . Encoding::chiffre_bin($chiffre);
      }
      return utf8_encode($text);
    }
  }
?>