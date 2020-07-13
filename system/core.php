<?php
function __autoload($classname) {
  if (strhas($classname, "Model")) {
    $filename = str_replace("Model", "", $classname);
    $filename = strtolower($filename);
    require_once(getcwd()."/mvc/model/$filename.php");
    return;
  }

  if (strhas($classname, "Controller")) {
    $filename = str_replace("Controller", "", $classname);
    $filename = strtolower($filename);
    require_once(getcwd()."/mvc/controller/$filename.php");
    return;
  }
}