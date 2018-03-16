<?php
  class Encoding {
    private function lettre_chiffre($lettre) {
      return ord(utf8_encode($lettre));
    }

    private function chiffre_lettre($chiffre) {      
      return chr($chiffre);
    }

    public static function chaine_utf8($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = Encoding::lettre_chiffre($lettre);
      }
      return $result;
    }

    public static function chiffre_utf8($code_chiffre) {
      $text = '';
      foreach ($code_chiffre as $chiffre) {
        $text = $text . Encoding::chiffre_lettre($chiffre);
      }
      return utf8_encode($text);
    }
  }
?>