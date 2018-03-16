<?php
  class Encoding {
    private function lettre_chiffre($lettre) {
      return ord(utf8_encode($lettre));
    }

    public static function chaine_utf8($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = Encoding::lettre_chiffre($lettre);
      }
      return $result;
    }
  }
?>