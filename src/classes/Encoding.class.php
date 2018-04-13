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

    public function shuffle($bin) {
      $arr = str_split($bin);
      $shuffled = array();

      $shuffled[] = $arr[5]; // 0
      $shuffled[] = $arr[6]; // 1
      $shuffled[] = $arr[0]; // 2
      $shuffled[] = $arr[3]; // 3
      $shuffled[] = $arr[4]; // 4
      $shuffled[] = $arr[2]; // 5
      $shuffled[] = $arr[7]; // 6
      $shuffled[] = $arr[1]; // 7

      return join("", $shuffled);
    }

    public function unshuffle($bin) {
      $arr = str_split($bin);
      $shuffled = array();

      $shuffled[] = $arr[2]; // 0
      $shuffled[] = $arr[7]; // 1
      $shuffled[] = $arr[5]; // 2
      $shuffled[] = $arr[3]; // 3
      $shuffled[] = $arr[4]; // 4
      $shuffled[] = $arr[0]; // 5
      $shuffled[] = $arr[1]; // 6
      $shuffled[] = $arr[6]; // 7

      return join("", $shuffled);
    }

    public static function text_to_binary($mot) {
      $arr = str_split(utf8_encode($mot));
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = str_pad(base_convert(Encoding::lettre_hexa($lettre), 16, 2), 8, 0, STR_PAD_LEFT);
      }
      return join("", $result);
    }

    public static function binary_to_text($code_chiffre) {
      $letters = str_split($code_chiffre, 8);
      $text = '';
      foreach ($letters as $chiffre) {
        $text = $text . Encoding::hexa_lettre($chiffre);
      }
      return utf8_encode($text);
    }

    public static function crypto($mot) {
      $bin = Encoding::text_to_binary($mot);
      $splitted = str_split($bin, 8);
      $result = array();
      foreach ($splitted as $letter) {
        $result[] = Encoding::shuffle($letter);
      }
      return join("", $result);
    }

    public static function uncrypto($code) {
      $letters = str_split($code, 8);
      $unshuffled = array();
      foreach ($letters as $letter) {
        $unshuffled[] = Encoding::unshuffle($letter);
      }
      return Encoding::binary_to_text(join("", $unshuffled));
    }
  }
?>