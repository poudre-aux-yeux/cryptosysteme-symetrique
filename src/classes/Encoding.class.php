<?php
  class Encoding {
    private function lettre_hexa($lettre) {
      $array = unpack("H*", utf8_encode($lettre));
      return $array[1];
    }

    private function hexa_lettre($bin) {
      $hex = base_convert($bin, 2, 16);
      return pack("H*", $hex);
    }

    public static function text_to_binary($mot) {
      $arr = str_split(utf8_encode($mot));
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = str_pad(base_convert(Encoding::lettre_hexa($lettre), 16, 2), 8, 0, STR_PAD_LEFT);
      }
      $concat = join("", $result);
      return $concat;
    }

    public static function binary_to_text($code_chiffre) {
      $arr = str_split($code_chiffre, 8);
      $text = '';
      foreach ($arr as $chiffre) {
        $text = $text . Encoding::hexa_lettre($chiffre);
      }
      return utf8_encode($text);
    }
  }
?>