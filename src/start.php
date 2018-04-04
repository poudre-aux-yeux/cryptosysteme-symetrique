<?php
function register($class) {
  $directories = array("classes");
  var_dump($directories);
  foreach ($directories as $directory) {
    $file = $directories . '/' . $class . '.class.php';

    if (is_file($filename)) {
      include $filename;
    }
  }
}

spl_autoload_register("register");

include_once("cesar.php");
include_once("encoding.php");
?>
