<?php
  class Encoding {
    private function lettre_hexa($lettre) {
      $array = unpack("H*", utf8_encode($lettre));
      return $array[1];
    }

    private function hexa_lettre($bin) {
      return pack("H*", $bin);
    }

    public static function chaine_utf8($mot) {
      $arr = str_split($mot);
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = str_pad(base_convert(Encoding::lettre_hexa($lettre), 16, 2), 8, 0, STR_PAD_LEFT);
      }
      return $result;
    }

    public static function chiffre_utf8($code_chiffre) {
      $text = '';
      foreach ($code_chiffre as $chiffre) {
        $text = $text . Encoding::hexa_lettre($chiffre);
      }
      return utf8_encode($text);
    }
  }
?>