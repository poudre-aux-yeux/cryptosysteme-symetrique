<?php
  class Encoding {
    private static $permutation = array(5,6,0,3,4,2,7,1);
    private static $substitution = [
      "0000" => "0100",
      "0001" => "0111",
      "0010" => "1010",
      "0011" => "0001",
      "0100" => "0000",
      "0101" => "1000",
      "0110" => "0010",
      "0111" => "0011",
      "1000" => "0101",
      "1001" => "0110",
      "1010" => "1110",
      "1011" => "1101",
      "1100" => "1011",
      "1101" => "1111",
      "1110" => "1100",
      "1111" => "1001"
    ];    

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

      foreach (self::$permutation as $key => $value) {
        $shuffled[$value] = $arr[$key];
      }
      ksort($shuffled);
      return implode("", $shuffled);
    }

    public function unshuffle($bin) {
      $arr = str_split($bin);
      $unshuffled = array();

      foreach (self::$permutation as $key => $value) {
        $unshuffled[$key] = $arr[$value];
      }

      return join("", $unshuffled);
    }

    public function xou($bin, $key) {
      $splitted_bin = str_split($bin);
      $splitted_key = str_split($key);
      $xouified = array();
      foreach ($splitted_bin as $key => $value) {
        $xo = $value == "1" xor $splitted_key[$key] == "1";
        $xouified[] = $xo ? "1" : "0";
      }
      return join("", $xouified);
    }

    public function substitute($bin) {
      return self::$substitution[$bin];
    }

    public function unsubstitute($bin) {
      return array_search($bin, self::$substitution);
    }

    public static function text_to_binary($word) {
      $arr = str_split(utf8_encode($word));
      $result = array();
      foreach ($arr as $lettre) {
        $result[] = str_pad(base_convert(self::lettre_hexa($lettre), 16, 2), 8, 0, STR_PAD_LEFT);
      }
      return join("", $result);
    }

    public static function binary_to_text($code_chiffre) {
      $letters = str_split($code_chiffre, 8);
      $text = '';
      foreach ($letters as $chiffre) {
        $text = $text . self::hexa_lettre($chiffre);
      }
      return utf8_encode($text);
    }

    public static function crypto($word, $key) {
      $bin = self::text_to_binary($word);
      $splitted = str_split($bin, 8);
      $shuffled = array();
      foreach ($splitted as $bloc) {
        $shuffled[] = self::shuffle($bloc);
      }
      $splitted = str_split(join("", $shuffled), 4);
      $substituted = array();
      foreach ($splitted as $bloc) {
        $substituted[] = self::substitute($bloc);
      }
      $splitted = str_split(join("", $substituted), 8);
      $encoded = array();
      foreach ($splitted as $bloc) {
        $encoded[] = self::xou($bloc, $key);
      }
      return join("", $encoded);
    }

    public static function uncrypto($code, $key) {
      $splitted = str_split($code, 4);
      $decoded = array();
      foreach ($splitted as $bloc) {
        $decoded[] = self::xou($bloc, $key);
      }
      $splitted = str_split(join("", $decoded), 4);
      $unsubstituted = array();
      foreach ($splitted as $bloc) {
        $unsubstituted[] = self::unsubstitute($bloc);
      }
      $splitted = str_split(join("", $unsubstituted), 8);
      $unshuffled = array();
      foreach ($splitted as $bloc) {
        $unshuffled[] = self::unshuffle($bloc);
      }
      return self::binary_to_text(join("", $unshuffled));
    }
  }
?>