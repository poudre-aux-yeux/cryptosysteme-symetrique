<?php
  class Cesar {
    private function lettre_chiffre($lettre) {
      return ord($lettre) - ord('A');
    }

    private function chiffre_lettre($chiffre) {
      return chr($chiffre + ord('A'));
    }

    public static function code_mot_chiffre($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = Cesar::lettre_chiffre($lettre);
      }
      return $result;
    }

    public static function code_chiffre_mot($code_chiffre) {
      $text = '';
      foreach ($code_chiffre as $chiffre) {
        $text = $text . Cesar::chiffre_lettre($chiffre);
      }
      return $text;
    }

    public static function crypto($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = (Cesar::lettre_chiffre($lettre) * 2 + 3) % 26;
      }
      return $result;
    }

    public static function uncrypto($code_crypto) {
      $text = '';
      foreach ($code_crypto as $chiffre) {
        $intermediaire = $chiffre - 3;
        if ($intermediaire < 0) {
          $intermediaire += 26;
        }
        $text = $text . Cesar::chiffre_lettre($intermediaire / 2);
      }
      return $text;
    }
  }
?>
